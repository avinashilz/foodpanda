<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
     use SoftDeletes;
     
     
     public function restaurants()
    {
        return $this->belongsTo('App\Restaurant');
//        Same
//        return $this->hasMany(Item::class);
    } 
    public function categories()
    {
        return $this->belongsTo('App\Category');
//        Same
//        return $this->hasMany(Item::class);
    } 
}
