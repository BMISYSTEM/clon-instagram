@extends('layout.app')

@section('titulo')
    Tu cuenta
@endsection

@section('contenido')
    <section>

        <div class="flex justify-center">
            <div class="w-full md:w-8/12 lg:w-6/12 md:flex ">
            
                <div class="md:w-8/12 lg:w-6/12 px5 px-2">
                    @if ($user->imagen)
                        <img src="{{asset('perfiles')."/".$user->imagen}}" alt="imagendeusuario"/>
                    @else
                        <img src="{{asset('img/USER2.png')}}" alt="imagendeusuario"/>
                    @endif
                </div>
                <div class="md:w-8/12 lg:w-6/12 px5 flex flex-col items-center md:justify-center py-10 md:items-start md:py-10">
                    <div class="flex items-center gap-2">
                        <p>{{ $user->username}}</p>
                         @auth
                             @if ($user->id === auth()->user()->id)
                                <a href="{{route('perfil.index')}}" class="text-gray-500 hover:text-gray-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                      </svg>
                                </a>
                                
                            @else
                             @endif
                         @endauth
                    </div>
                     <p class="text-gray-800 text-sm mb-3 font-bold mt-5">
                       {{$user->following->count()}}
                        <span class="font-norma">Seguidores</span>
                     </p>
                     <p class="text-gray-800 text-sm mb-3 font-bold">
                        {{$user->followers->count()}}
                        <span class="font-norma">Siguiendo</span>
                     </p>
                     <p class="text-gray-800 text-sm mb-3 font-bold">
                        {{$user->posts->count()}}
                        <span class="font-norma">Post</span>
                     </p>
                     @auth
                        @if ($user->id === auth()->user()->id)
                        
                        @else
                            @if ($user->seguidores(auth()->user()))
                                <form action="{{route('user.unfollow',$user)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input 
                                        type="submit"
                                        class="bg-red-600 text-white uppercase rounded-lg px-3 py-1 text-sm font-bold cursor-pointer"
                                        value="Dejar de seguir">
                                </form>
                            @else
                                <form action="{{route('user.follow',$user)}}" method="POST">
                                    @csrf
                                    <input 
                                        type="submit"
                                        class="bg-blue-600 text-white uppercase rounded-lg px-3 py-1 text-sm font-bold cursor-pointer"
                                        value="Seguir">
                                </form>
                            @endif
                        @endif
                     @endauth
                </div> 
            </div>
        </div>
    </section>
    <section class="container mx-auto mt-10">
        <h2 class="text-4xl text-center font-black my-10">Publicaciones</h2>
            <x-listar-post :posts="$post"/>
    </section>
@endsection