<?php

namespace Way2Web\Notification;

/**
 * NotificationServiceProvider class
 *
 * @package notification
 * @author Gertjan Roke <groke@intothesource.com>
 */

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class NotificationServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/views', 'notification');

        /* Place all the files to the correct path */
        $this->publishes([
            __DIR__ . '/views'  => base_path('resources/views/vendor/notification'),
            __DIR__ . '/public' => base_path('public'),
        ]);
    }

    public function register()
    {
        $this->registerNotification();
    }

    private function registerNotification()
    {
        $this->app->bind(
            'Way2Web\Notification\SessionStore',
            'Way2Web\Notification\LaravelSessionStore'
        );

        $this->app->singleton('notifyMessage', function () {
            return $this->app->make('Way2Web\Notification\NotificationFlash');
        });
    }

}