<?php

namespace App\Listeners;

use App\Events\PostUpdateEvent;
use App\Mail\PostUpdatedMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostUpdateListener
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
    public function handle(PostUpdateEvent $event): void
    {
        Mail::to($event->user->email)->send(new PostUpdatedMail($event->post,$event->user));
    }
}
