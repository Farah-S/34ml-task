<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\NotificationEvent;
use App\Notifications\AppNotification;

class NotificationEventListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(NotificationEvent $event)
{
    $user = $event->user; 
    Notification::send($user, new AppNotificationp($event->message));
}
}
