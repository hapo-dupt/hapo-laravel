<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public function members()
    {
        return $this->hasOne('App\Models\Project', 'member_id', 'id');
    }

    public function tasks()
    {
        return $this->hasMany('App\Models\Task', 'member_id', 'id');
    }
}
