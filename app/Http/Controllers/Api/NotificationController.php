<?php

namespace App\Http\Controllers\Api;

use App\Notifications\AppNotification;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function markAsRead()
    {
        $notifications=auth()->user()
        ->unreadNotifications;
        
        foreach ($notifications as $n) {
            $n->markAsRead();
        }

        return redirect()->back();
    }
}
