<?php

namespace Eureka\SMS;

use Illuminate\Notifications\Notification;

class EurekaSmsChannel
{
    /**
     * send message
     *
     * @param [type] $notifiable
     * @param Notification $notification
     * @return void
     */
    public function send($notifiable , Notification $notification)
    {
        $message = $notification->toEurekaSms($notifiable);
        $eurekaNotification = resolve(EurekaSmsNotification::class);
        $eurekaNotification->sendMessage($message['phone'], $message['content']);
    }
}