@extends('layout.app')


@section('titulo')
    Crea una nueva publicacion
@endsection
@section('contenido')

@push('style')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush


<div class="md:flex md:items-center ">

    <div class="md:w-1/2 px-10">
        <form action="{{route('image.store')}}" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
            @csrf
        </form>
    </div>
    <div class="md:w-1/2 px-10  bg-white p-10 rounded-lg shadow-xl mt-10 md:mt-0">
        <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-5">
                <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">
                    Titulo 
                </label>
                <input 
                    type="text"
                    id="titulo"
                    name="titulo"
                    placeholder="titulo de la publicacion"
                    class="border p-3 w-full rounded-lg
                    @error('titulo')
                        border-red-500 

                    @enderror"
                    value="{{old('titulo')}}"
                />
                @error('titulo')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{$message}}
                    </p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold">
                    Descripcion 
                </label>
                <textarea 
                    type="text"
                    id="descripcion"
                    name="descripcion"
                    placeholder="descripcion de la publicacion"
                    class="border p-3 w-full rounded-lg
                    @error('descripcion')
                        border-red-500 

                    @enderror"
                    
                >{{old('descripcion')}}</textarea>
                @error('descripcion')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{$message}}
                    </p>
                @enderror
            </div>
            <div class="mb-5">
                <input 
                    type="hidden" 
                    name="imagen"
                >
                @error('imagen')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                    {{$message}}
                </p>
            @enderror
            </div>
            <input 
            type="submit"
            value="Crear Publicacion"
            class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase
                    font-bold w-full p-3 text-white rounded-lg"
        />
        </form>
    </div>


</div>


@endsection