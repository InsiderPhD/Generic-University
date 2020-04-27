<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UniClass extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
    public function teacher()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
