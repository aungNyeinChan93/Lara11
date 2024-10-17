<?php

namespace App\Listeners;

use App\Events\userScribeEvent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class userScribeListener
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
        Mail::raw("Thanks for your subscribe".$event->user->name,function($mess) use($event){
            $mess->to($event->user->email);
            $mess->subject("Thanks for subscribe");
        });
    }
}
