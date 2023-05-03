@extends('layout.app')

@section('titulo')
    Editar perfil de: {{auth()->user()->username}}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form action="{{route('perfil.store')}}" method="POST" enctype="multipart/form-data" class="mt-10 md:mt-0">
                @csrf
                <div class="mb-5">
                    <label for="" class="mb-2 block uppercase text-gray-500 font-bold">
                        User-name 
                    </label>
                    <input 
                        type="text"
                        id="username"
                        name="username"
                        placeholder="tu username"
                        class="border p-3 w-full rounded-lg
                        @error('username')
                            border-red-500 

                        @enderror"
                        value="{{auth()->user()->username}}"
                    />
                    @error('username')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{$message}}
                        </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="" class="mb-2 block uppercase text-gray-500 font-bold">
                        imagen de perfil
                    </label>
                    <input 
                        type="File"
                        id="imagen"
                        name="imagen"
                        accept=".jpg,. jpeg,.png"
                        class="border p-3 w-full rounded-lg
                       
                        value="{{auth()->user()->username}}"
                    />
               
                </div>
                <input 
                type="submit"
                value="guardar cambios"
                class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase
                        font-bold w-full p-3 text-white rounded-lg"
            />
            </form>
        </div>
    </div>
@endsection