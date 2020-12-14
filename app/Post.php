<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'text', 'picture', 'view', 'like', 'dislike', 'user_id'
    ];

    public function Comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
