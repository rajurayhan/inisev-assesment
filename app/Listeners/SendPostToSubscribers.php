<?php

namespace App\Listeners;

use App\Events\PostCreated;
use App\Jobs\SendMailToSubscriber;
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

        $alreadySent = PostHasSubscribers::where('post_id', $post)->get()->pluck('subscriber_id')->toArray();
        $query = Subscriber::query();
        if($alreadySent){
            $query->whereNotIn('id', $alreadySent);
        }

        $subscribers = $query->where('platform_id', $post->platform_id)->get();
        Log::info($subscribers);

        $emails = $subscribers->pluck('email')->toArray();

        $emailJob = new SendMailToSubscriber($post, $emails);
        dispatch($emailJob);

        $data = [];
        foreach($subscribers as $subscriber){
            // PostHasSubscribers::create([
            //     'post_id' => $post->id,
            //     'subscriber_id' => $subscriber->id
            // ]);
            array_push($data,[
                'post_id' => $post->id,
                'subscriber_id' => $subscriber->id
            ]);
        }

        Log::info($data);

        PostHasSubscribers::insert($data);


    }
}
