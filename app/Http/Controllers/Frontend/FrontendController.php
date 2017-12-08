<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
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
    
    public function restaurantsearchbygeolocation($radius = 10, $longitude = 76.69, $latitude = 30.70) {
//        $this->validate(request(), [
//            'longtitude' => 'required',
//            'latitude' => 'required',
//        ]);

        $haversine = "(6371 * acos(cos(radians($latitude)) * cos(radians(latitude)) * cos(radians(longitude) - radians($longitude)) + sin(radians($latitude)) * sin(radians(latitude))))";
        $results = $query = Restaurant::select('id', 'name', 'address', 'phone', 'contact_person', 'latitude', 'longitude')
                        ->selectRaw("{$haversine} AS distance")
                        ->whereRaw("{$haversine} < ?", [$radius])->get();
        dd($results->toArray());
    }

    /**
     * @return \Illuminate\View\View
     */
    public function macros()
    {
        return view('frontend.macros');
    }
}
