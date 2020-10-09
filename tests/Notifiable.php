<?php

namespace Eureka\SMS\Tests;

use Illuminate\Notifications\Notifiable as NotificationsNotifiable;

class Notifiable 
{
    use NotificationsNotifiable;

    public function routeNotificationForEurekasms()
    {
        return '';
    }
}