<?php

namespace App\Models\Post;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostHasSubscribers extends Model
{
    protected $fillable = [
        'post_id', 'subscriber_id'
    ];
    use HasFactory;
}
