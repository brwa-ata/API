<?php

namespace App\Exceptions;

use App\Traits\ApiResponser;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Foundation\Testing\HttpException;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;

class Handler extends ExceptionHandler
{
    use ApiResponser;

    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Session\TokenMismatchException::class,
        \Illuminate\Validation\ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof ValidationException)
        {
            return $this->convertValidationExceptionToResponse($exception , $request);
        }

        if ($exception instanceof ModelNotFoundException)
        {
            $modelName = strtolower(class_basename($exception->getModel())) ;
            return $this->errorResponse("Does not exist any {$modelName} with the specified identificator" , 404);
        }

        if ($exception instanceof AuthenticationException)
        {
            return $this->unauthenticated($request , $exception );
        }

        if ($exception instanceof AuthorizationException)
        {
            return $this->errorResponse($exception->getMessage() , 403);
        }

        if ($exception instanceof NotFoundHttpException)
        {
            return $this->errorResponse('The specified URL can not be found' , 404);
        }

        if ($exception instanceof MethodNotAllowedHttpException)
        {
            return $this->errorResponse('The specified method for the request is not valid' , 405);
        }

        if ($exception instanceof HttpException)
        {
            return $this->errorResponse($exception->getMessage() , $exception->getStatusCode());
        }

        if ($exception instanceof QueryExecuted)
        {
           $errorCode = $exception->errorInfo[1];
           if ($errorCode == 1451)
           {
               return $this->errorResponse('Can not remove this resource permanently . It is related with any other resource , 409');
           }
        }

        if ($exception instanceof TokenMismatchException)
        {
            return redirect()->back()->withInput($request->input());
        }

        if (config('app.debug'))
        {
            return parent::render($request, $exception);
        }
        return $this->errorResponse('Unexpected Exception. Try later ' , 500);

    }

    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($this->isFrontEnd($request))
        {
            return redirect()->guest('login');
        }

        return $this->errorResponse('Unauthenticated' , 401);
    }


    /**
     * Create a response object from the given validation exception.
     *
     * @param  \Illuminate\Validation\ValidationException  $e
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function convertValidationExceptionToResponse(ValidationException $e, $request)
    {
        $errors = $e->validator->errors()->getMessages();

        if ($this->isFrontEnd($request))
        {
            return $request->ajax()  ?
                response()->json($errors, 422)  :
                redirect()->back()
                    ->withInput( $request->input() )
                    ->withErrors($errors);
        }

        return $this->errorResponse($errors , 422);
    }


    /**
     * @param $request
     * @return bool
     */
    private function isFrontEnd($request)
    {
        return $request->acceptsHtml() && collect( $request->route()->middleware() )->contains('web');
    }



}
