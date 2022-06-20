<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Helper\cart;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            $cart = new Cart();
            $totalQty = $cart->totalQty();
            $totalPrice = $cart->totalPrice();
            $view->with([
                'totalQty'=> $totalQty,
                'totalPrice'=>$totalPrice
            ]);
        });

        Paginator::useBootstrap();
    }
}
