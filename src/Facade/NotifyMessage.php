<?php

namespace Way2Web\Notification\Facade;

use Illuminate\Support\Facades\Facade;

class NotifyMessage extends Facade
{
    /**
     * Get the binding in the IoC container.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'notifyMessage';
    }
}
