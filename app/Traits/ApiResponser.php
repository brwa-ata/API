<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

trait ApiResponser
{
    /**
     * @param $data
     * @param $code
     * @return \Illuminate\Http\JsonResponse
     */
    private  function successResponse($data , $code)
    {
        return response()->json($data , $code);
    }


    /**
     * @param $message
     * @param $code
     * @return \Illuminate\Http\JsonResponse
     */
    protected function errorResponse($message , $code)
    {
        return response()->json(['error' => $message, 'code' => $code]  , $code);
    }


    /**
     * @param Collection $collection
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    protected function showAll(Collection $collection , $code =200)
    {
        if ($collection->isEmpty()){
            return $this->successResponse(['data' => $collection  ] , $code);
        }

        $transformer = $collection->first()->transformer;
        $collection = $this->sortData($collection, $transformer);
        $collection = $this->transformData($collection , $transformer);

        return $this->successResponse($collection , $code);
    }


    /**
     * @param Model $model
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    protected function showOne(Model $model , $code = 200)
    {
        $transformer = $model->first()->transformer;
        $model = $this->transformData($model , $transformer);

        return $this->successResponse( $model , $code);
    }


    /**
     * @param $message
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    protected function showMessage($message , $code = 200)
    {
        return $this->successResponse(['data' => $message] , $code);
    }


    /**
     * @param Collection $collection
     * @param $transformer
     * @return Collection
     */
    public function sortData(Collection $collection , $transformer)
    {
        if (request()->has('sort_by')){
            $attribute = $transformer::originalAttribute(request()->sort_by);
            $collection = $collection->sortBy->{$attribute}; // am sortBy xoy la asla functiona bas lam versionay larvel atwanyn bam shewayash bakary benyn;
        }
        return $collection;
    }


    /**
     * @param $data
     * @param $transformer
     * @return array
     */
    protected function transformData($data, $transformer)
    {
        $transformation = fractal($data , new $transformer);

        return $transformation->toArray();

    }

}