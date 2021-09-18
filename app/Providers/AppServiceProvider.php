<?php
namespace App\Providers;
use App\Configuration;
use Illuminate\Support\ServiceProvider;
use App\Observers\ConfigurationObserver;
class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
    }
    public function boot()
    {
        Configuration::observe(ConfigurationObserver::class);
    }
}
