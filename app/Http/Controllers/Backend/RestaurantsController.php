<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class RestaurantsController extends Controller
{
    public function index()
    {
        return view('backend.addrestaurant');
    }
    public function addrestaurant(Request $request)
    {
//        dd($request->toArray());
        $this->validate(request(), [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'contact_person' => 'required'
        ]);
        
        $restaurant = new Restaurant;
        $restaurant->name = request('name');
        $restaurant->address = request('address');
        $restaurant->phone = request('phone');
        $restaurant->contact_person = request('contact_person');
//        $resturant->name = request('name');
//        $resturant->name = request('name');
        
        
        
        return redirect()->route('admin.dashboard');
    }
}
