<?php

namespace App\Jobs;

use App\Mail\PostEMail;
use App\Models\Post\Post;
use App\Models\Post\PostHasSubscribers;
use App\Models\Subscriber\Subscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendMailToSubscriber implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    public $post;
    public $emails;

    public function __construct($post, $emails)
    {
        $this->post = $post;
        $this->emails = $emails;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $email = new PostEMail($this->post);

        if($this->emails){
            Mail::to($this->emails)->send($email);
        }
    }
}
