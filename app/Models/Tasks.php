<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    // Table Tasks
    protected $table = "tasks";

    // Get belongs Project
    public function projects()
    {
        return $this->belongsTo('App\Models\Projects', 'project_id', 'id');
    }

    // Get belongs Member
    public function members()
    {
        return $this->belongsTo('App\Models\Members', 'member_id', 'id');
    }
}
