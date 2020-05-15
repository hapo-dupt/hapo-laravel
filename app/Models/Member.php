<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Project;

class Member extends Model
{
    public function members()
    {
        return $this->hasOne(Project::Class);
    }

    public function tasks()
    {
        return $this->hasMany('App\Models\Task', 'member_id', 'id');
    }
}
