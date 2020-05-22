<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Project;

class Task extends Model
{
    protected $fillable = [
        'title', 'description', 'member_id', 'project_id', 'status', 'begin_at', 'finish_at'
    ];
    public function tasks()
    {
        return $this->belongsTo(Project::Class);
    }
}
