<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'about', 'facebook', 'twitter', 'instagram', 'province_id', 'user_id'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Province()
    {
        return $this->belongsTo(Province::class);
    }

    public function Region()
    {
        return $this->belongsTo(Region::class);
    }
}
