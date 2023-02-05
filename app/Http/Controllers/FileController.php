<?php

namespace App\Http\Controllers;

use App\Models\File;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class FileController extends Controller
{
    public function index()
    {
        $files = File::get();
        return view('file.index', compact('files'));
    }

    public function create()
    {
        return view('file.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'new_img' => 'required',
        ]);
        $files = explode(" ", $request->new_img);
        foreach ($files as $file) {
            File::create([
                'image' => $file,
            ]);
        }
        return $this->message($file, 'file.index', 'Image upload successfully', 'image upload error');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required',
        ]);
        if ($request->hasfile('image')) {
            $images = array();
            foreach ($request->file('image') as $file) {
                $image_name = rand(1000, 9999999) . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('images/'), $image_name);
                //$file->move(public_path('images/new/'), $image_name);
                $url = 'images/' . $image_name;
                $images[] = $url;
            }
            $img = implode(" ", $images);
        }
        return response()->json(['img' => $img]);
    }
}
