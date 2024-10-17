<?php

namespace App\Listeners;

use App\Mail\PostDeletedMail;
use App\Events\PostDeleteEvent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostDeleteListener
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
    public function handle(PostDeleteEvent $event): void
    {
        Mail::to($event->user->email)->send(new PostDeletedMail($event->post,$event->post->user));
    }
}
