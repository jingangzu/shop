<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        //共享变量
        $link=Friend_link::where('status','1')->take(6)->get();
        view()->share('link',$link);

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
