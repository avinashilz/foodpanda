<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Fileentry;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;


class FileController extends Controller
{
    public function get(Request $request, $filename) {
//        dd($request->ajax());
        $entry = Fileentry::where('filename', '=', $filename)->firstOrFail();
		$file = Storage::disk('local')->get($entry->filename);
		return response($file, 200)->header('Content-Type', $entry->mime);
    }
}
