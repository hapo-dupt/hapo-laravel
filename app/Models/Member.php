<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class Member extends Authenticatable
{
    protected $guard = 'member';
    public $role_admin = 1;
    public $role_member = 0;
    public $status_active = 1;
    public $status_close = 0;
    public $gender_male = 0;
    public $gender_female = 1;

    public function projects()
    {
        return $this->belongsToMany(Project::Class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::Class);
    }

    public function info()
    {
        return Auth::guard('member')->user();
    }
}
