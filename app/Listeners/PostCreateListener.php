<?php

namespace App\Listeners;

use App\Mail\PostCreatedMail;
use App\Events\PostCreateEvent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostCreateListener
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
    public function handle(PostCreateEvent $event): void
    {
        Mail::to($event->user->email)->send(new PostCreatedMail($event->post,$event->post->user));
    }
}
