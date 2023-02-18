<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\Facades\Schema;

use View;
use Auth;
use Form;
use App\Models\Cart;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Paginator::useBootstrap();

        view::composer('*',function(){
            if(Auth::check()): //if the user is logged in
                $count = Cart::where('user_id',Auth::user()->id)->where('status','in_cart')->count();

                view::share('count',$count);
            endif;
        });
    }
}
