<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ResturantsController extends Controller
{
    public function index()
    {
        return view('backend.addresuarant');
    }
    public function addresuarant()
    {
        return back();
    }
}
