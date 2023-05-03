@extends('layout.app')
@section('titulo')
Registrate en devstagram
@endsection
@section('contenido')
    <div class="md:flex md:justify-center gap-10 md:items-center">
        <div class="md:w-4/12 ">
            <img src="{{asset('img/casa en la playa.jpg')}}" alt="">
        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{route('register')}}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="" class="mb-2 block uppercase text-gray-500 font-bold">
                        Nombre 
                    </label>
                    <input 
                        type="text"
                        id="name"
                        name="name"
                        placeholder="tu nombre"
                        class="border p-3 w-full rounded-lg
                        @error('name')
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
                        User 
                    </label>
                    <input 
                        type="text"
                        id="user"
                        name="username"
                        placeholder="tu usuario"
                        class="border p-3 w-full rounded-lg
                        @error('name')
                            border-red-500 

                        @enderror"
                        value="{{old('username')}}"
                    />
                    @error('username')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{$message}}
                        </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="" class="mb-2 block uppercase text-gray-500 font-bold">
                        Email 
                    </label>
                    <input 
                        type="email"
                        id="email"
                        name="email"
                        placeholder="tu correo electronico"
                        class="border p-3 w-full rounded-lg
                        @error('name')
                            border-red-500 

                        @enderror"
                        value="{{old('email')}}"
                    />
                    @error('email')
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
                        placeholder="tu password"
                        class="border p-3 w-full rounded-lg
                        @error('name')
                            border-red-500 

                        @enderror"
                        value="{{old('password')}}"
                    />
                    @error('password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{$message}}
                        </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">
                        Repetir Password 
                    </label>
                    <input 
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        placeholder="tu password"
                        class="border p-3 w-full rounded-lg"
                    />
                </div>

                <input 
                    type="submit"
                    value="Crear cuenta"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase
                            font-bold w-full p-3 text-white rounded-lg"
                />
            </form>

        </div>
    </div>
@endsection