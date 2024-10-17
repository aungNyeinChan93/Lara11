<?php

namespace App\Listeners;

use App\Events\userScribeEvent;
use App\Models\UserSubscribe;
use Illuminate\Support\Facades\DB;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateSubscribeListener
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
    public function handle(userScribeEvent $event): void
    {
        //
        UserSubscribe::create([
            "name" => $event->user->name,
            "email" => $event->user->email,
        ]);
    }
}
