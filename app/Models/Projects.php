<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    // Table Projects
    protected $table = "projects";

    // Get belongs Customer
    public function customers()
    {
        return $this->belongsTo('App\Models\Customers', 'customer_id', 'id');
    }

    //  Get Tasks from Project
    public function tasks()
    {
        return $this->hasMany('App\Models\Tasks', 'project_id', 'id');
    }

    // Get Members assigned projects
    public function projects()
    {
        return $this->hasManyThrough(
            'App\Models\Members',
            'App\Models\Member_Project',
            'project_id',
            'id',
            'id'
        );
    }
}
