<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;

class RestaurantsController extends Controller {

    public function index() {

        $restaurant = Restaurant::select('id', 'name', 'address', 'phone', 'contact_person', 'image')->get();
//        dd($restaurant->toArray());
//        foreach ($restaurant as $r) {
//            dd($r->id);
//        }

        return view('backend.dashboard', compact('restaurant'));
    }

    public function create() {

        return view('backend.addrestaurant');
    }

    public function store(Request $request) {
        $this->validate(request(), [
            'name' => 'required',
            'address' => 'required',
            'contact_person' => 'required',
            'phone' => 'required',
            'delivery_radius' => 'required',
//          
        ]);

//        dd($request->toArray());
        $restaurant = new Restaurant;
        $restaurant->name = request('name');
        $restaurant->address = request('address');
        $restaurant->contact_person = request('contact_person');
        $restaurant->phone = request('phone');
        $restaurant->longitude = request('longitude');
//        dd($restaurant->longitude);
        $restaurant->latitude = request('latitude');
        $restaurant->delivery_radius = request('delivery_radius');
        $restaurant->featured_resturant = request('radio');


        if ($request->hasFile('image')) {
            $media = $request->file('image');
            $name = date('d-m-y-h-i-s-') . preg_replace('/\s+/', '-', trim($media->getClientOriginalName()));
            $destinationPath = public_path('/uploads');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }
            $request->file('image')->move($destinationPath, $name);
            $restaurant->image = $name;
        }

        $restaurant->save();

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

        return redirect()->route('admin.additemform');
    }

    public function show() {

        //
    }

    public function edit(int $id) {
        
//        dd($id);
        
        $restaurant =  Restaurant::where('id', $id)->first();
         dd($restaurant->toArray());
        

        return view('backend.editrestaurant', compact('restaurant'));
    }

    public function update(Request $request) {
        dd('1');
        $this->validate(request(), [
            'name' => 'required',
            'address' => 'required',
            'contact_person' => 'required',
            'phone' => 'required',
            'delivery_radius' => 'required',
//          
        ]);
        
        dd('2');
        $restaurant = new Restaurant;
        $restaurant->name = request('name');
        $restaurant->address = request('address');
        $restaurant->contact_person = request('contact_person');
        $restaurant->phone = request('phone');
        $restaurant->longitude = request('longitude');
//        dd($restaurant->longitude);
        $restaurant->latitude = request('latitude');
        $restaurant->delivery_radius = request('delivery_radius');
        $restaurant->featured_resturant = request('radio');
        
        
        dd('3');
        if ($request->hasFile('image')) {
            $media = $request->file('image');
            $name = date('d-m-y-h-i-s-') . preg_replace('/\s+/', '-', trim($media->getClientOriginalName()));
            $destinationPath = public_path('/uploads');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }
            $request->file('image')->move($destinationPath, $name);
            $restaurant->image = $name;
        }
        
        dd('4');
        $restaurant->save();
        dd('5');
        return back();
    }

    public function destroy(int $id) {
        
        Restaurant::where('id', $id)->delete();

        return back();
    }

}
