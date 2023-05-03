<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request,Post $posts)
    {
        //no se coloca EL POST POR QUE SE HIZO la relacion en el modelo de post
       
       return back();
    }
    public function destroy(Request $request,Post $posts){
        
        
    }
}
