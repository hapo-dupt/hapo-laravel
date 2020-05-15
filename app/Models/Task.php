<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Project;

class Task extends Model
{
    public function tasks()
    {
        return $this->belongsTo(Project::Class);
    }
}
