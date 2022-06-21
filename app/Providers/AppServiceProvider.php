<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Helper\cart;
use Auth;
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
            $userName = Auth::user()->name;
            $cart = new Cart();
            $totalQty = $cart->totalQty();
            $totalPrice = $cart->totalPrice();
            $cart = $cart->content();
            $view->with([
                'totalQty'=> $totalQty,
                'totalPrice'=>$totalPrice,
                'cart'=>$cart,
                'userName'=>$userName
            ]);
        });

        Paginator::useBootstrap();
    }
}
