<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Rennokki\Befriended\Traits\CanBeLiked;
use Rennokki\Befriended\Contracts\Likeable;

class Tweet extends Model implements Likeable
{
    use CanBeLiked;

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
