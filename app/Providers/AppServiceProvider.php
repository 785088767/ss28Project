<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Home\GoodsType;
use DB;

class AppServiceProvider extends ServiceProvider
{


    // 首页导航栏分类
    public function getCatesBypid($pid){
        $s=GoodsType::where([['display','=','0'],["pid",'=',$pid],])->get();
            //遍历
            $data=[];
            foreach($s as $key=>$value){
            $value->dev=$this->getCatesBypid($value->id);
            $data[]=$value;
        }
        return $data;
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer('HomePublic.Public',function ($view){
            $gg = DB::table('admin_article')->get();
            $data=$this->getCatesBypid(0);
            $a = DB::table('admin_link')->where('status','0')->get();
            $view->with(['navi'=>$data,'a'=>$a,'g'=>$gg]);
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
