<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Restaurant extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function categories()
    {
        return $this->hasMany('App\Models\Category');
//        Same
//        return $this->hasMany(Category::class);
    }
    
    public function items()
    {
        return $this->hasMany('App\Models\Item');
//        Same
//        return $this->hasMany(Item::class);
    }
    
    public function orders() {
        return $this->hasMany('App\Models\Order');
    }
    
}
