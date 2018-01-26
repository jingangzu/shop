<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Model\Cate;
use App\Model\Friend_link;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //分类
        $cate = new Cate();
        $cates = $cate->getCate();
        //友情链接
        $link=Friend_link::where('status','1')->take(6)->get();
        view()->share('link',$link);
        view()->share('cates',$cates);

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
