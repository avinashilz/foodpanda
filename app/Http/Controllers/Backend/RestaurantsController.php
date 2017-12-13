<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Category;
use App\Models\Item;
use App\Models\Fileentry;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

class RestaurantsController extends Controller {

    public function index() {

        $restaurant = Restaurant::select('id', 'name', 'address', 'phone', 'contact_person', 'fileentry_id')->with('fileentry')->get();
//        dd($restaurant->toArray());
        return view('backend.restaurants', compact('restaurant'));
    }

    public function create() {

        return view('backend.addrestaurant');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'contact_person' => 'required',
            'phone' => 'required',
            'delivery_radius' => 'required'
        ]);

        $restaurant = new Restaurant;
        $restaurant->name = $request->name;
        $restaurant->address = $request->address;
        $restaurant->contact_person = $request->contact_person;
        $restaurant->phone = $request->phone;
        $restaurant->longitude = $request->longitude;
        $restaurant->latitude = $request->latitude;
        $restaurant->delivery_radius = $request->delivery_radius;
        $restaurant->featured_resturant = $request->radio;


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            Storage::disk('local')->put($file->getFileName() . '.' . $extension, File::get($file));
            $entry = new Fileentry();
            $entry->mime = $file->getClientMimeType();
            $entry->original_filename = $file->getClientOriginalName();
            $entry->filename = $file->getFilename() . '.' . $extension;

            $entry->save();

            $entryid = $entry->id;
            $restaurant->fileentry_id = $entryid;
        }

        $restaurant->save();

        return redirect()->route('admin.additemform', ['id' => $restaurant]);
    }

    public function show(int $restroid) {

        $categories = Category::whereHas('items', function ($query) use($restroid) {
                    $query->where('resturants_id', $restroid);
                })->with(['items' => function($query) use($restroid) {
                        $query->where('resturants_id', $restroid);
                    }])->get();

        return view('backend.showitems', compact('categories', 'restroid'));
    }

    public function edit(int $id) {

        $restaurant = Restaurant::where('id', $id)->first();

        return view('backend.editrestaurant', compact('restaurant'));
    }

    public function update(Request $request, int $id) {

        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'contact_person' => 'required',
            'phone' => 'required',
            'delivery_radius' => 'required',
        ]);

        $update = Restaurant::find($id);

        $update->name = $request->name;
        $update->address = $request->address;
        $update->contact_person = $request->contact_person;
        $update->phone = $request->phone;
        $update->delivery_radius = $request->delivery_radius;
        $update->featured_resturant = $request->radio;
        if ($request->hasFile('image')) {
            $media = $request->file('image');
            $name = date('d-m-y-h-i-s-') . preg_replace('/\s+/', '-', trim($media->getClientOriginalName()));
            $destinationPath = public_path('/uploads');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }
            $request->file('image')->move($destinationPath, $name);
            $update->image = $name;
        }
        $update->save();


        return redirect()->route('admin.restaurants.index');
    }

    public function destroy(int $id) {

        Restaurant::where('id', $id)->delete();

        return back();
    }

}
