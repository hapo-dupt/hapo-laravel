<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Member;
use App\Models\Task;

class Project extends Model
{

    public function members()
    {
        return $this->belongsToMany(Member::Class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::Class);
    }

    public function customers()
    {
        return $this->belongsTo(Customer::Class);
    }
}
