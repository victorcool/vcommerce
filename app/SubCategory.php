<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    // Table name
    protected $tablename = 'subcategories';
    // primary key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public function categories(){
        return $this->belongsTo('App\Category');
    }
   

    
    
}
