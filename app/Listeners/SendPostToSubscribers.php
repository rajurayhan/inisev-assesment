<?php

namespace App\Listeners;

use App\Events\PostCreated;
use App\Jobs\SendMailToSubscriber;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendPostToSubscribers
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
     * @param  PostCreated  $event
     * @return void
     */
    public function handle(PostCreated $event)
    {
        $post = $event->post;
        $emailJob = new SendMailToSubscriber($post);
        dispatch($emailJob);
        Log::info($post);
    }
}
