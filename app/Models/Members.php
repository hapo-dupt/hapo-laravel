<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    // Table Members
    protected $table = "members";

    // Get project by Members
    public function projects()
    {
        return $this->hasManyThrough('App\Models\Projects', 'App\Models\Member_Project', '');
    }

    // Get Tasks
    public function tasks()
    {
        return $this->hasMany('App\Models\Tasks', 'member_id', 'id');
    }

    // Get Projects assigned members
    public function members()
    {
        return $this->hasManyThrough(
            'App\Models\Projects',
            'App\Models\Member_Project',
            'member_id',
            'id',
            'id'
        );
    }
}
