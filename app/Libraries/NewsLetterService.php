<?php

namespace App\Libraries;

use App\Models\Post\Post;
use App\Models\Post\PostHasSubscribers;
use App\Models\Subscriber\Subscriber;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class NewsLetterService
{
    /**
    * Newsletter Service
    *
    * @param Post $post
    * @return array
    */

    public static function getNotSentEmils(Post $post )
    {
        $alreadySent    = PostHasSubscribers::where('post_id', $post)->get()->pluck('subscriber_id')->toArray();
        $query          = Subscriber::query();
        if($alreadySent){
            $query->whereNotIn('id', $alreadySent);
        }

        $subscribers = $query->where('platform_id', $post->platform_id)->get();
        return $subscribers;
    }
}
