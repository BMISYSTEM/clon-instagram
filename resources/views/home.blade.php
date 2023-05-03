@extends('layout.app')

@section('titulo')
    inicio

@endsection
@section('contenido')
   <x-listar-post :posts="$posts"/>

@endsection