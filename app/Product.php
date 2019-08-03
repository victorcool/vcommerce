<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Table name
    protected $tablename = 'products';
    // primary key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;
}
