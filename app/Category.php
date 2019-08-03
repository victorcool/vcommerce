<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Table name
    protected $tablename = 'categories';
    // primary key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public function subcategories(){
    return $this->hasMany('App\SubCategory');
     }

}