<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class RegisterController extends Controller
{
    //
    public function crear()
     {
        return view('auth.registre');
    }
    public function store(Request $request)
    {
        $request->request->add(['username'=>Str::slug($request->username)]);
        //validacion de formulario
        $this->validate($request,[
            'name'=>'required|max:30|min:5',
            'username'=>'required|min:3|unique:users|max:30',
            'email'=>'required|max:60',
            'password'=>'required|confirmed|min:6',
        ]);
        // dd($request->password);
        //metodo de crear un nuevo usuario flashando la contrase;a
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'username' => $request->username,
        ]);
        //redirecion del usuario
        auth()->attempt([
            'email' => $request->email,
            'password'=> $request->password
        ]);
        return redirect()->route('post.index');
    }
}
