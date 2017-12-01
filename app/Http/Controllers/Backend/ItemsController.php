<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Category;
use App\Models\Item;

class ItemsController extends Controller {

    public function index(Request $request) {
        if (!empty($request->all())) {

            $restaurantselected = Restaurant::where('id', $request->all())->first();
        }
        $categories = Category::pluck('categories', 'id');
        $restaurant = Restaurant::pluck('name', 'id');

        return view('backend.additemform', compact('categories', 'restaurant', 'restaurantselected'));
    }

    public function additem(Request $request, Restaurant $restaurantselected) {

        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
        ]);

        $item = new Item;
        $item->name = $request->name;
        $item->price = $request->price;
        $item->resturants_id = $request->restaurant;
        $item->category_id = $request->categories;

        $item->save();

        return redirect()->route('admin.restaurants.index');
    }

    public function edit(int $id) {
        
        $item =  Item::where('id', $id)->first();
//        dd($item->toArray());

        return view('backend.edititem', compact('item'));
    }

    public function update() {

        return back();
    }

}
