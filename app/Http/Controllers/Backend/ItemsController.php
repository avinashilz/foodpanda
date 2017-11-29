<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Category;
use App\Models\Item;


class ItemsController extends Controller
{
    public function index()
    {
        $categories = Category::pluck('categories', 'id');
//        dd($categories);
//        foreach($categories as $category){
//            dump($category);
//        }
        $restaurant = Restaurant::pluck('name', 'id');
//        foreach($restaurant as $r) {
//            dump($r->name);
//        }
        return view('backend.additemform', compact('categories', 'restaurant')); 
    }
    public function additem(Request $request)
    {
//        dd($request->toArray());
        $this->validate(request(), [
            'name' => 'required',
            'price' => 'required',
        ]);
        
        $item = new Item;
        $item->name = request('name');
        $item->price = request('price');
        $item->resturants_id = request('restaurant');
        $item->category_id = request('categories');
        
        $item->save();
        
        
        return redirect()->route('admin.dashboard');
    }
}
