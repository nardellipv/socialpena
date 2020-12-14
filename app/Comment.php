<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'comment', 'user_id', 'post_id',
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Post()
    {
        return $this->belongsTo(Post::class);
    }
}
