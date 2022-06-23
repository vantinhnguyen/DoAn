<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Helper\cart;
use App\Models\Order;
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
            if (isset(Auth::user()->name)) {
                $userName = Auth::user()->name;
            }else{
                $userName ="";
            }
            $cart = new Cart();
            $totalQty = $cart->totalQty();
            $totalPrice = $cart->totalPrice();
            $cart = $cart->content();
            $orderStatus1 = Order::where('status',1)->get();
            $orderStatus2 = Order::where('status',2)->get();
            $view->with([
                'totalQty'=> $totalQty,
                'totalPrice'=>$totalPrice,
                'cart'=>$cart,
                'userName'=>$userName,
                'orderStatus1'=>$orderStatus1,
                'orderStatus2'=>$orderStatus2
            ]);
        });

        Paginator::useBootstrap();
    }
}
