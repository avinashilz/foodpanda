<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function index()
    {
        return view('backend.additemform');
    }
    public function additem(Request $request)
    {
//        dd($request->toArray());
        $this->validate(request(), [
//            'name' => 'required',
//            'address' => 'required',
//            'phone' => 'required',
//            'contact_person' => 'required'
        ]);
        
        
        
        return redirect()->route('admin.dashboard');
    }
}
