<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Home\GoodsType;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer('HomePublic.Public',function ($view){
            $data = GoodsType::where('display','0')->get();
            $view->with('navi',$data);
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
