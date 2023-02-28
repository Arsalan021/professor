<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\HomeSection;
use App\Models\FooterSection;

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
        // $home  = HomeSection::where('status','1')->first();
        // view()->share('home',$home);
         $footer  = FooterSection::where('status','1')->first();
        view()->share('footer',$footer);
    }
}
