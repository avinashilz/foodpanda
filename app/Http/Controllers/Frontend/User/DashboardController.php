<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller {

    public function index() {

        $restaurant = Restaurant::select('id', 'name', 'address', 'phone', 'contact_person', 'image')->get();

        return view('frontend.user.dashboard', compact('restaurant'));
    }

    public function search() {
        ;
        $this->validate(request(), [
            'restaurantName' => 'required',
        ]);

        $search = request('restaurantName');

        $restaurants = Restaurant::where('name', 'like', '%' . $search . '%')->get();

        if (isset($restaurants)) {

            if ($restaurants->count() == 1) {

                $restro = $restaurants->first();

                return redirect()->route('frontend.user.show', ['id' => $restro->id]);
            } else {

                return view('frontend.user.search', compact('restaurants'));
            }
        }
    }

    public function show(int $restroid) {
        $categories = Category::with(['items' => function($query) use($restroid) {
                        $query->where('resturants_id', $restroid);
                    }])->get();

//        dd($categories->toArray());

        $categories = Category::whereHas('items', function($query) use($restroid) {
                    $query->where('resturants_id', $restroid);
                })->with(['items' => function($query) use($restroid) {
                        $query->where('resturants_id', $restroid);
                    }])->get();

        $categories = Category::whereHas('items', function ($query) use($restroid) {
                    $query->where('resturants_id', $restroid);
                })->with(['items' => function($query) use($restroid) {
                        $query->where('resturants_id', $restroid);
                    }])->get();
        return view('frontend.user.show', compact('categories', 'restroid'));
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

        $mp = Order::where('user_id', $userid)->select('id', 'restaurant_id', \DB::raw('count(*) as total'))->groupBy('restaurant_id')->orderBy('total', 'desc')->with('restaurant')->first();
        dump($mp->toArray());
        dump($mp->restaurant->name);
    }
    
    public function most_popular_Chines_item_in_2_months() {
        $categoryId = 11;
//        $userid = auth()->user()->id;
//        dd($userid);
        $chines = Category::where('id', $categoryId)->whereHas('items', function($query) use($categoryId) {
            $query->whereHas('orderitems');
        })->with(['items' => function($query){
            $query->whereHas('orderitems')->with(['orderitems' => function($query) {
            
                $query->select('item_id', 'quantity', \DB::raw('count(*) as total'));
            }]);
        }])->get();
        dd($chines->toArray());
    }
    
    
    
    public function most_frequent_user_in_2_months() {
        
        $mpu = Order::whereBetween('created_at', ['2017-10-05', '2017-12-05'])->select('id', 'user_id', \DB::raw('count(*) as total'))->groupBy('user_id')->orderBy('total', 'desc')->with('user')->first();
        dd($mpu->toArray());
        
    }
    
    public function most_popular_Chines_restaurants() {
        $chinesrestaurants = Category::where('id', '11' )->wherehas('items')->with('items')->get();
        dd($chinesrestaurants->toArray());
    }

}
