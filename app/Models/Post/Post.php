<?php

namespace App\Models\Post;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'platform_id',
        'title',
        'description',
        'status'
    ];

    public function subscribers(){
        return $this->hasMany('App\Models\Post\PostHasSubscribers', 'post_id');
    }
}
