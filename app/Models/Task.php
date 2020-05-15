<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function tasks()
    {
        return $this->belongsTo('App\Models\Project', 'id', 'project_id');
    }
}
