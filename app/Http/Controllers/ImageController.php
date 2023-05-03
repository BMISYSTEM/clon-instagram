<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        $image = $request->file('file');
        $nombreImagen= Str::uuid().".". $image->extension();
        $imagenSever = Image::make($image);
        $imagenSever->fit(1000,1000);
        $imagenPaTH = public_path('uploads').'/'.$nombreImagen;
        $imagenSever->save($imagenPaTH);
        return response()->json(['imagen' => $nombreImagen]);
    }

}
