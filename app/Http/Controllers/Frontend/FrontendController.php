<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Category;
use App\Models\Item;

/**
 * Class FrontendController.
 */
class FrontendController extends Controller {

    /**
     * @return \Illuminate\View\View
     */
    public function index() {
//        
        return view('frontend.index');
    }

    public function restaurantSearch() {
//        $this->validate(request(), [
//            'restaurantName' => 'required',
//        ]);

        $search = request('restaurantName');

        $restaurants = Restaurant::where('name', 'like', '%' . $search . '%')->get();

        if (isset($restaurants)) {

            return $restaurants->toJson();
        }
    }

    public function restaurantsearchbygeolocation($radius = 15) {
        $this->validate(request(), [
            'latlong' => 'required',
        ]);

        $longitude = request('longitude');
        $latitude = request('latitude');

//        dd($latitude);

        $haversine = "(6371 * acos(cos(radians($latitude)) * cos(radians(latitude)) * cos(radians(longitude) - radians($longitude)) + sin(radians($latitude)) * sin(radians(latitude))))";
        $restaurants = $query = Restaurant::select('id', 'name', 'address', 'phone', 'contact_person', 'latitude', 'longitude')
                        ->selectRaw("{$haversine} AS distance")
                        ->whereRaw("{$haversine} < ?", [$radius])->get();


        return view('frontend.user.search', compact('restaurants'));
    }

    public function restaurantShow(int $restroid) {

        $categories = Category::whereHas('items', function ($query) use($restroid) {
                    $query->where('resturants_id', $restroid);
                })->with(['items' => function($query) use($restroid) {
                        $query->where('resturants_id', $restroid);
                    }])->get();
//                    dd($categories->toArray());

        
        return view('frontend.user.show', compact('categories', 'restroid'));
    }
    
    public function additem(int $itemid) {
//        dd($itemid);
        $item = Item::where('id', $itemid)->select('id', 'name', 'price')->first();
        $price = $item->price;
        $qty = 2;
        $totalprice = $price*$qty;
//        dd($totalprice);
        $itemadded = [];
        $itemadded['id'] = $item->id;
        $itemadded['name'] = $item->name;
        $itemadded['quantity'] = $qty;
        $itemadded['totalprice'] = $totalprice;
//        dd($itemadded);
        
        if (empty(session('additem'))) {
            session()->put('additem', [$itemadded]);
//            dump('1');
//            dd(session('additem'));
        } else {
            session()->push('additem', $itemadded);
//            dump('2');
        }
        
//            dump(session('additem'));
//            session()->forget('additem');
            dd(session('additem'));

        return back();
    }

    /**
     * @return \Illuminate\View\View
     */
    public function macros() {
        return view('frontend.macros');
    }

}
