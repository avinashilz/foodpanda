<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
     use SoftDeletes;
     
     
     public function restaurant()
    {
        return $this->belongsTo('App\Models\Restaurant');
//        Same
//        return $this->hasMany(Item::class);
    } 
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
//        Same
//        return $this->hasMany(Item::class);
    } 
    
     public function orderItems() {
        return $this->hasMany('App\Models\OrderItem');
    }
}