<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ResturantsController extends Controller
{
    public function index()
    {
        return view('backend.addresturant');
    }
    public function addresuarant(Request $request)
    {
//        dd($request->toArray());
        $this->validate(request(), [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'contact_person' => 'required'
        ]);
        
        
        
        return redirect()->route('admin.dashboard');
    }
}
