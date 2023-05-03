<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function __invoke()
   {
       if(auth()->user())
       {
        $ids= auth()->user()->following->pluck('id')->toArray();
            $post= Post::whereIn('user_id',$ids)->latest()->paginate(20);
            return view('home',[
                'posts'=>$post
            ]);
        }else
        {
          return  redirect(route('login'));
        }
   }
}
