<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function store(Request $request, User $user,Post $posts){
        //valida el formulario y devuelve el error
        $this->validate($request,[
            'comentario' => 'required|min:10|max:60'
        ]);
        //inserta con relacion en la base de datos utilizando las relaciones
        Comentario::create([
            'user_id' => auth()->user()->id,
            'post_id' => $posts->id,
            'comentario' => $request->comentario,
        ]);
        //redirecciona a la misma pagina con informacion
        return back()->with('mensaje','comentario realizado correctamente');
    }
}
