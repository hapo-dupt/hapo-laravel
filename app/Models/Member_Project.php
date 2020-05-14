<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member_Project extends Model
{
    // Table Member_Project
    protected $table = "member_project";

    // Get member
    public function members()
    {
        return $this->belongsTo('App\Models\Members', 'id', 'member_id');
    }

    // Get Project
    public function projects()
    {
        return $this->belongsTo('App\Models\Projects', 'id', 'project_id');
    }
}
