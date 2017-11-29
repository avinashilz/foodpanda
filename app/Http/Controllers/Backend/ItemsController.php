<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Category;

class ItemsController extends Controller
{
    public function index()
    {
        $categories = Category::select('categories')->get();
//        foreach($categories as $category){
//            dump($category->categories);
////            dump($category->toArray());
//        }
        return view('backend.additemform', compact('categories')); 
    }
    public function additem(Request $request)
    {
//        dd($request->toArray());
        $this->validate(request(), [
            'name' => 'required',
            'price' => 'required',
        ]);
        
        
        
        return redirect()->route('admin.dashboard');
    }
}
