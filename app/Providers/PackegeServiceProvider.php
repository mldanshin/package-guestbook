<?php

namespace Danshin\Guestbook\Providers;

//use App;

use Illuminate\Support\ServiceProvider;
use Danshin\Guestbook\Console\Commands\Cut as CutCommand;
use Danshin\Guestbook\Console\Commands\Clear as ClearCommand;

class PackegeServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([__DIR__ . '/../../config/danshin-guestbook.php' => config_path('danshin-guestbook.php')]);
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'danshin/guestbook');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'danshin/guestbook');

        if ($this->app->runningInConsole()) {
            $this->commands([
                CutCommand::class,
                ClearCommand::class
            ]);
        }
    }
}
