<?php

namespace App\Console\Commands;

use App\Jobs\SendMailToSubscriber;
use App\Libraries\NewsLetterService;
use App\Models\Post\Post;
use App\Models\Post\PostHasSubscribers;
use Illuminate\Console\Command;

class SendNewsLaterEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'news:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Post Sent to Subscribers';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $posts = Post::get();
        foreach ($posts as $key => $post) {
            $subscribers    = NewsLetterService::getNotSentEmils($post);
            $emails         = array_column ($subscribers->toArray(), 'email');

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
        $this->info($this->description);
    }
}
