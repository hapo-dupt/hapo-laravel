<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function projects()
    {
        return $this->belongsToMany('App\Models\Member', 'id', 'project_id');
    }

    public function tasks()
    {
        return $this->hasMany('App\Models\Task', 'project_id', 'id');
    }
}
