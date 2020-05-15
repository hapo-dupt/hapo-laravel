<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function customers()
    {
        return $this->hasMany('App\Models\Project', 'customer_id', 'id');
    }
}
