@extends('layout.app')

@section('titulo')

@endsection


@section('contenido')

<div class="md:flex md:justify-center gap-10 md:items-center">
    <div class="md:w-4/12 ">
        <img src="{{asset('img/casa en la playa.jpg')}}" alt="">
    </div>
    <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
        <form action="{{route('login')}}" method="POST">
            @csrf
            @if (session('mensaje'))
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                    {{session('mensaje')}}
                </p>
            @endif
            <div class="mb-5">
                <label for="" class="mb-2 block uppercase text-gray-500 font-bold">
                    Email 
                </label>
                <input 
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Tu correo"
                    class="border p-3 w-full rounded-lg
                    @error('email')
                        border-red-500 

                    @enderror"
                    value="{{old('name')}}"
                />
                @error('name')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{$message}}
                    </p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="" class="mb-2 block uppercase text-gray-500 font-bold">
                    Password 
                </label>
                <input 
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Tu uauario"
                    class="border p-3 w-full rounded-lg
                    @error('password')
                        border-red-500 

                    @enderror"
                    value="{{old('password')}}"
                />
            </div>
            <div class="mb-5">
                <input type="checkbox" name="remember" ><label class="text-gray-500 font-bold">Mantener la sesion</label>
            </div>
            <input 
                    type="submit"
                    value="Iniciar seccion"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase
                            font-bold w-full p-3 text-white rounded-lg"
                />
        </form>
    </div>
@endsection