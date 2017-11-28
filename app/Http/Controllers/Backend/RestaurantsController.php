<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;

class RestaurantsController extends Controller {

    public function index() {
        return view('backend.addrestaurant');
    }

    public function addrestaurant(Request $request) {
        $this->validate(request(), [
            'name' => 'required',
            'address' => 'required',
            'contact_person' => 'required',
            'phone' => 'required',
            'delivery_radius' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
        ]);

        dd($request->toArray());
        $restaurant = new Restaurant;
        $restaurant->name = request('name');
        $restaurant->address = request('address');
        $restaurant->contact_person = request('contact_person');
        $restaurant->phone = request('phone');
        $resturant->longitude = request('longitude');
        $resturant->latitude = request('latitude');
        $resturant->delivery_radius = request('delivery_radius');
        $resturant->featured_resturant = 1;

        $resturant->save();

//        $address = $restaurant->address; // Address
////        dd($address);
//// Get JSON results from this request
//        $geo = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?api=AIzaSyDG2rf8aW-8GYBa74W0OLYN5p2Ztw8GhrY&address=' . urlencode($address) . '&sensor=false');
//        $geo = json_decode($geo, true); // Convert the JSON to an array
//        dd($geo);
//        if ($geo['status'] == 'OK') {
//            $latitude = $geo['results'][0]['geometry']['location']['lat']; // Latitude
//            $longitude = $geo['results'][0]['geometry']['location']['lng']; // Longitude
//            dd($latitude);
//        }
        dd('No longitude');
        return redirect()->route('admin.additemform');
    }

}
