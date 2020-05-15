<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Project;

class Customer extends Model
{
    public function projects()
    {
        return $this->hasMany(Project::Class);
    }
}
