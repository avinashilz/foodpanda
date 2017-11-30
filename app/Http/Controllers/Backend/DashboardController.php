<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
//        $restaurant = Restaurant::select('id','name','address', 'phone', 'contact_person', 'image')->get();
////        dd($restaurant->toArray());
////        foreach ($restaurant as $r) {
////            dd($r->id);
////        }
        
        return view('backend.dashboard');
    }
}
