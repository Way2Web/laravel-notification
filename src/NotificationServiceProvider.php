<?php

namespace IntoTheSource\Notification;

/**
 * 
 * @author Gertjan Roke <gjroke@intothesource.com>
 */

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

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
            __DIR__ . '/views' => base_path('resources/views/vendor/notification'),
            __DIR__ . '/config' => config_path(),
            __DIR__ . '/public' => base_path('public'),
        ]);
    }

	public function register()
	{
		$this->registerNotification();
		config([
				'config/notification.php',
		]);
	}

	private function registerNotification()
	{
        $this->app->bind(
            'IntoTheSource\Notification\SessionStore',
            'IntoTheSource\Notification\LaravelSessionStore'
        );
        
        $this->app->bindShared('notification', function () {
            return $this->app->make('IntoTheSource\Notification\NotificationFlash');
        });
	}

}