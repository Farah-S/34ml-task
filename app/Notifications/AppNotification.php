<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\DatabaseMessage;

class AppNotification extends Notification
{
    use Queueable;
    public $message;
    public function __construct($m)
    {
        $this->message=$m;
    }

    public function via($notifiable)
    {
        return ['database']; // Use the database channel
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => $this->message,
            // 'link' => '/profile',
        ];
    }
}
