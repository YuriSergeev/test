<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User', 'user_achievement', 'achievement_id', 'user_id');
    }
}
