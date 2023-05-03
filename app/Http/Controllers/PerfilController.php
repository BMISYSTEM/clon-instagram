<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        return view('perfil.index',[
        
        ]);
    }
    public Function store(Request $request)
    {
        $request->request->add(['username'=>Str::slug($request->username)]);

        $this->validate($request,[
            'username'=>['required','min:3','unique:users,username,'.auth()->user()->id,'max:30']

        ]);
        if ($request->imagen) {
            $image = $request->file('imagen');
            $nombreImagen= Str::uuid().".". $image->extension();
            $imagenSever = Image::make($image);
            $imagenSever->fit(1000,1000);
            $imagenPaTH = public_path('perfiles').'/'.$nombreImagen;
            $imagenSever->save($imagenPaTH);
            
        }
        //guasrdar cambios
        $usuarios = User::find(auth()->user()->id);
        $usuarios->username = $request->username;
        $usuarios->imagen = $nombreImagen ?? auth()->user()->imagen ?? '';

        $usuarios->save();

        //redireccion
        return redirect()->route('post.index',$usuarios->username);
    }
}
