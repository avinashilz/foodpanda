<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
                        ->whereRaw("{$haversine} < ?", [$radius])->with('items.category')->get();
//dd($restaurants->toArray());

        return view('frontend.user.search', compact('restaurants'));
    }

    public function restaurantShow(int $restroid) {
        $restaurantdetail = Restaurant::where('id', $restroid)->select('id','name', 'fileentry_id')->with('fileentry')->first();
//        dd($restaurantname->toArray());
        $categories = Category::whereHas('items', function ($query) use($restroid) {
                    $query->where('resturants_id', $restroid);
                })->with(['items' => function($query) use($restroid) {
                        $query->where('resturants_id', $restroid);
                    }])->get();
//                    dd($categories->toArray());


        return view('frontend.user.show', compact('categories', 'restroid', 'restaurantdetail'));
    }

    public function additem(int $itemid, Request $request) {
//        dd($itemid);
        $qty = $request->qty;
//        dd($qty);
        $item = Item::where('id', $itemid)->select('id', 'name', 'price')->first();
        $price = $item->price;
        $totalprice = $price * $qty;
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
        $detail = [];
        $detail = session('additem');

        $totalprice = 0;
        foreach ($detail as $d) {
            $price = $d['totalprice'];
            $totalprice += $price;
//                $totalprice[] = $price;
        }
//        dd($totalprice);


//        return view('frontend.cart', compact('detail', 'totalprice'));
        return response()->json(['detail'=>$detail, 'totalprice' => $totalprice],200);

//            dump(session('additem'));
//            session()->forget('additem');
//            dd(session('additem'));

//        return back();
    }

    public function showSelectedItem() {

        
    }

    /**
     * @return \Illuminate\View\View
     */
    public function macros() {
        return view('frontend.macros');
    }

}
