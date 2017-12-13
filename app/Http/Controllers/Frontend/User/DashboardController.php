<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Item;
use App\Models\Access\User\User;
use Carbon\carbon;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller {

    public function index() {

        $restaurant = Restaurant::select('id', 'name', 'address', 'phone', 'contact_person', 'image')->get();

        return view('frontend.user.dashboard', compact('restaurant'));
    }

    public function search() {
        $this->validate(request(), [
            'restaurantName' => 'required',
        ]);

        $search = request('restaurantName');

        $restaurants = Restaurant::where('name', 'like', '%' . $search . '%')->get();

        if (isset($restaurants)) {


            return $restaurants->toJson();
        }
    }

    public function searchbygeolocation($radius = 15) {
        $this->validate(request(), [
            'latlong' => 'required',
        ]);

        $longitude = request('longitude');
        $latitude = request('latitude');

        $haversine = "(6371 * acos(cos(radians($latitude)) * cos(radians(latitude)) * cos(radians(longitude) - radians($longitude)) + sin(radians($latitude)) * sin(radians(latitude))))";
        $restaurants = $query = Restaurant::select('id', 'name', 'address', 'phone', 'contact_person', 'latitude', 'longitude')
                        ->selectRaw("{$haversine} AS distance")
                        ->whereRaw("{$haversine} < ?", [$radius])->with('items.category')->get();
       
        return view('frontend.user.search', compact('restaurants'));
    }

    public function show(int $restroid) {
        $restaurantname =  Restaurant::where('id', $restroid)->select('name')->first();

        $categories = Category::whereHas('items', function ($query) use($restroid) {
                    $query->where('resturants_id', $restroid);
                })->with(['items' => function($query) use($restroid) {
                        $query->where('resturants_id', $restroid);
                    }])->get();
//                    dd($categories);
       
        
        return view('frontend.user.show', compact('categories', 'restroid', 'restaurantname'));
    }
    
    public function checkout() {
//        dd('1');
        
        
        return redirect()->route('frontend.auth.logout');
    }

    public function logged_in_user_all_order() {
        $userid = auth()->user()->id;

//        \DB::enableQueryLog();
        $allOrders = Order::where('user_id', $userid)->with(['restaurant', 'orderitems.item'])->get();
//        dump(\DB::getQueryLog());
        dd($allOrders->toArray());
    }

    public function logged_in_user_order_of_specific_restaurant() {
        $userid = auth()->user()->id;
        $specificrestaurantid = 38;
        $allOrders = Order::where('user_id', $userid)->where('restaurant_id', $specificrestaurantid)->with(['restaurant', 'orderItems.item'])->get();
        dd($allOrders->toArray());
    }

    public function most_popular_restaurant() {
        $mp = Order::select('id', 'restaurant_id', \DB::raw('count(*) as total'))->groupBy('restaurant_id')->orderBy('total', 'desc')->with('restaurant')->first();
        dump($mp->toArray());
        dump($mp->restaurant->name);
    }

    public function most_popular_restaurant_of_logged_user() {
        $userid = auth()->user()->id;

        $mp = Order::where('user_id', $userid)->select('id', 'restaurant_id', \DB::raw('count(*) as total'))->groupBy('restaurant_id')->orderBy('total', 'desc')->with('restaurant')->get();
        dd($mp->toArray());
        dump($mp->restaurant->name);
    }

    public function most_popular_Chines_item_in_2_months() {
        $categoryId = 11;
//        $userid = auth()->user()->id;
//        dd($userid);
//        $chines = Category::where('id', $categoryId)->whereHas('items', function($query) use($categoryId) {
//            $query->whereHas('orderitems');
//        })->with(['items' => function($query){
//            $query->whereHas('orderitems')->with(['orderitems' => function($query) {
//                $query->select('item_id', 'quantity', \DB::raw('count(*) as total'))->groupBy('item_id');
//            }]);
//        }])->get();
//        dd($chines->toArray());
//        $item = Item::where('category_id', $categoryId)
//                        ->whereHas('orderItems')
//                        ->with(['orderitems' => function($query) {
//                                $query->select('item_id', 'quantity', \DB::raw('count(*) as total'))
//                                ->groupBy('item_id');
//                            }])->get();
//        dump($item->toArray());

        $item = OrderItem::whereHas('item', function ($query) use($categoryId) {
                    $query->where('category_id', $categoryId);
                })->with('item')->select('id', 'item_id', \DB::raw('count(*) as total'))->groupBy('item_id')->orderBy('total', 'desc')->first();
        dd($item->item->name);
    }

    public function most_frequent_user_in_2_months() {
        $currentdate = carbon::now();
        $backdate = carbon::now()->subDays(60);
        $mpu = Order::whereBetween('created_at', [$backdate, $currentdate])->select('id', 'user_id', \DB::raw('count(*) as total'))->groupBy('user_id')->orderBy('total', 'desc')->with('user')->first();
        dd($mpu->toArray());
    }

    public function most_popular_Chines_restaurants() {
        $categoryId = 11;
        $item = OrderItem::whereHas('item', function ($query) use($categoryId) {
                    $query->where('category_id', $categoryId);
                })->with('item.restaurant')->select('id', 'item_id', \DB::raw('count(*) as total'))->groupBy('item_id')->orderBy('total', 'desc')->take(1)->get();
        dd($item->toArray());
    }

    public function user() {
        $users = User::all()->keyBy('age');
        dump($users->toArray());
        $a = 1;
        foreach ($users as $key => $user) {
            if ($a % 3 == 0) {
                $users->forget($key);
            }
            $a++;
        }
        dd($users->toArray());
    }

}
