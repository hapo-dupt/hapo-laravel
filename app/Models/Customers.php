<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    // Table Customers
    protected $table = "customers";

    // Get projects
    public function projects()
    {
        return $this->hasMany('App\Models\Projects', 'customer_id', 'id');
    }
}
