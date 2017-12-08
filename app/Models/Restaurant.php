<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Restaurant extends Model {

    use SoftDeletes;

    protected $guarded = [];

    public function categories() {
        return $this->hasMany('App\Models\Category');
//        Same
//        return $this->hasMany(Category::class);
    }

    public function items() {
        return $this->hasMany('App\Models\Item');
//        Same
//        return $this->hasMany(Item::class);
    }

    public function orders() {
        return $this->hasMany('App\Models\Order');
    }

    public function fileentry() {
        return $this->belongsTo('App\Models\Fileentry', 'fileentry_id');
    }

    public static function getByDistance($latitude, $longitude, $distance) {
//        $results = DB::select(DB::raw('SELECT id, ( 6371 * acos( cos( radians(' . $latitude . ') ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(' . $longitude . ') ) + sin( radians(' . $latitude . ') ) * sin( radians(latitude) ) ) ) AS distance FROM restaurants HAVING distance < ' . $distance . ' ORDER BY distance'));
          $results = DB::select(DB::raw('SELECT id, ( 6371 * acos( cos( radians(' . $latitude . ') ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(' . $longitude . ') ) + sin( radians(' . $latitude . ') ) * sin( radians( latitude ) ) ) ) AS distance FROM restaurants HAVING distance < ' . $distance . ' ORDER BY distance LIMIT 0 , 20;'));

        return $results;
    }

}
