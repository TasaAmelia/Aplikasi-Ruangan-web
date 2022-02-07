<?php

namespace App\Listeners;

use App\Events\RentNotificationProcessed;
use App\Models\User;
use App\Notifications\RentNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class SendRentNotifications
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  RentNotificationProcessed  $event
     * @return void
     */
    public function handle($event)
    {
        $admin = User::where('usertype', 'Admin')->get();
        Notification::send($admin, new RentNotification($event->user));
    }
}
