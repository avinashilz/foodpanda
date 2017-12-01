<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    public function restaurants()
    {
        return $this->belongsTo('App\Restaurant');
//        Same
//        return $this->hasMany(Item::class);
    } 
    
    public function items()
    {
        return $this->hasMany('App\Item');
//        Same
//        return $this->hasMany(Item::class);
    } 
}
