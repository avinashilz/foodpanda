<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Category;
/**
 * Class FrontendController.
 */
class FrontendController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.index');
    }
    
    
    public function restaurantSearch() {
        $this->validate(request(), [
            'restaurantName' => 'required',
        ]);

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
        $results = $query = Restaurant::select('id', 'name', 'address', 'phone', 'contact_person', 'latitude', 'longitude')
                        ->selectRaw("{$haversine} AS distance")
                        ->whereRaw("{$haversine} < ?", [$radius])->get();
        $results = $results->toArray();
        dd($results);
        return view('', compact('results'));
    }
    
    public function restaurantShow(int $restroid) {

        $categories = Category::whereHas('items', function ($query) use($restroid) {
                    $query->where('resturants_id', $restroid);
                })->with(['items' => function($query) use($restroid) {
                        $query->where('resturants_id', $restroid);
                    }])->get();
        return view('frontend.user.show', compact('categories', 'restroid'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function macros()
    {
        return view('frontend.macros');
    }
}
