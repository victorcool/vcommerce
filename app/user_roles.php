<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_roles extends Model
{
    
    // Table name
    protected $tablename = 'user_roles';
    // primary key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;
}
