<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use App\Models\Task;

class Member extends Model
{
    public function projects()
    {
        return $this->belongsToMany(Project::Class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::Class);
    }
}
