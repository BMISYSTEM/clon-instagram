<?php

namespace App\Http\Controllers;

use auth;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class postcontroller extends Controller
{
    public function __construct()
    {
        //autentica
        $this->middleware('auth')->except(['show','index']);
    }
    public function index(User $user)
    {
        $post = Post::Where('user_id', $user->id)->paginate(6);;
        return view('dashboard',[
            'user' => $user,
            'post' => $post
        ]);
    }
    //muestra la vista
    public function create()
    {
        return view('post.create');
    }
    //inserta la vista
    public function store(Request $request)
    {
        $this->validate($request,[
            'titulo' => 'required|max:100',
            'descripcion' => 'required',
            'imagen' => 'required',
        ]);
        // Post::create([
        //     'titulo' => $request->titulo,
        //     'descripcion' => $request->descripcion,
        //     'imagen' => $request->imagen,
        //     'user_id' => auth()->user()->id,
        // ]);
        $request->user()->posts()->create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'user_id' => auth()->user()->id,
        ]);
        return redirect()->route('post.index',auth()->user()->username);
    }
    public function show(User $user, Post $posts)
    {
        return view('post.show',[
            'user' => $user,
            'post' => $posts
        ]);

    }
    //eliminando publicaciones
    public function destroy(Post $posts)
    {
      $this->authorize('delete',$posts);
      $posts->delete();
      //eliminar imagen del servidor
      $imagen_path = public_path('uploads/'.$posts->imagen);
    if (File::exists($imagen_path)) {
        unlink($imagen_path);
    }
      return redirect()->route('post.index',auth()->user()->username);
    }
}

 