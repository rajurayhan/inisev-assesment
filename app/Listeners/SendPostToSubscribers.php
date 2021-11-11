<?php

namespace App\Listeners;

use App\Events\PostCreated;
use App\Jobs\SendMailToSubscriber;
use App\Libraries\NewsLetterService;
use App\Models\Post\PostHasSubscribers;
use App\Models\Subscriber\Subscriber;
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

        $subscribers    = NewsLetterService::getNotSentEmils($post);
        $emails         = array_column ($subscribers->toArray(), 'email');
        \Log::info($emails);

        $emailJob = new SendMailToSubscriber($post, $emails);
        dispatch($emailJob);

        $data = [];
        foreach($subscribers as $subscriber){
            array_push($data,[
                'post_id' => $post->id,
                'subscriber_id' => $subscriber->id
            ]);
        }

        PostHasSubscribers::insert($data);
    }
}
