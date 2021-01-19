<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'interest', 'user_id'
    ];
}
