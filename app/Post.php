<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Table name
    protected $tablename = 'posts';
    // primary key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;
}
