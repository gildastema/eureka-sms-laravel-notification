<?php

namespace Eureka\SMS\Tests;

use Eureka\SMS\EurekaSmsChannel;
use Orchestra\Testbench\TestCase;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;
use Eureka\SMS\EurekaSmsNotificationFacade;

class EurekaNotificationChannelTest extends TestCase
{
    /** @test */
    public function notification_send(){
        $notification = new TestNotification;
        $notifiable = new TestNotifiable;
        $channel =new  EurekaSmsChannel();
        EurekaSmsNotificationFacade::shouldReceive('sendMessage')
            ->andReturn(true);
        $channel->send($notifiable, $notification);
    }
}

class TestNotification extends Notification
{
    public function toEurekasms($notifiable)
    {
        return [
            'content'   => 'star war ',
            'phone'     => '6911131446'
        ];
    }
}

class TestNotifiable {
    use Notifiable;

    public function routeNotificationForEurekasms($notification)
    {
        return true;
    }
}