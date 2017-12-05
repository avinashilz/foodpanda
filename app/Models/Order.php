<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
     public function restaurant() {
        return $this->belongsTo('App\Models\Restaurant');
    }
    
     public function orderItems() {
        return $this->hasMany('App\Models\OrderItem');
    }
     public function user() {
        return $this->belongsTO('App\Models\Access\User\User');
    }
}
