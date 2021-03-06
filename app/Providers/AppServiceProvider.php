<?php

namespace App\Providers;

use App\Mail\UserCreated;
use App\Mail\UserMailChanged;
use App\Product;
use App\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        /* UPDATED EVENT */
        Product::updated(function ($product){
            if ($product->quantity == 0 && $product->isAvailable()){
                $product->status = Product::UNAVAILABLE_PRODUCT;

                $product->save();
            }
        });


        /* CREATED EVENT */
        User::created
        (   function ($user)
                {
                    // lanaw kawanay (   to()   ) gar tanha ( $user ) bnwsyn awa laravel xoy har  emailakay waragre
                    // lanaw kawanay (   send()   ) objectek bo user mail drwst akayn w aw nrxay ayneryn achea contructory aw classawa ka lawe rwnkrdnaway zyatr nwsrawa
                    // retry() BO AWAYA GAR HAR KESHAYAK RWBAT USER BTWANE retry BKATAWA
                    // KA 3 param WARAGRE
                    // 1  DABNA ZHMARAY DWBARA BWNAWA
                    // 2 AW ACTIONAY KA ATAWE DWBARA BETAWA
                    // 3 DWAY CHAN mellySecond  DWBARA BETAWA
                    retry(5,
                                function () use ($user)
                                {
                                    Mail::to($user->email)->send(new UserCreated($user));
                                }, 100
                            );
                    }
        );



        /*AMA BO AWAY GAR USER EMAILY TAZA KRDAWA DWBARA VERIFICATION BO EMAILA TAZAKAY BKRE*/
        User::updated(function ($user){
            /*SARATA PEWYSTA DLLNYA BYNAWA LAWAY KA EMAILAKAY GORDRAWA*/
            if ($user->isDirty('email')){
                Mail::to($user)->send(new UserMailChanged($user));
            }
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
