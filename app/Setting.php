<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    // Table name
    protected $tablename = 'settings';
    // primary key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;
}
