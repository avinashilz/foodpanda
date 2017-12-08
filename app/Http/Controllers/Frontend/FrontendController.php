<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

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

    /**
     * @return \Illuminate\View\View
     */
    public function macros()
    {
        return view('frontend.macros');
    }
}
