<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    public function restaurants()
    {
        return $this->belongsTo('App\Models\Restaurant');
//        Same
//        return $this->hasMany(Item::class);
    } 
    
    public function items()
    {
        return $this->hasMany('App\Models\Item');
//        Same
//        return $this->hasMany(Item::class);
    } 
}
