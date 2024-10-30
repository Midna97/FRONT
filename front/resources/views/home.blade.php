<!-- resources/views/home.blade.php -->

@extends('layouts.base')

@section('title', 'Página Principal')

@section('content')


@if ($tipo == 'Administrador')
    <h1>Bienvenido a tu Dashboard </h1>
    
@else
    <h1>Bienvenido</h1>
    @endif
    <p>Ventana Principal.</p>
    @include('partials.card') <!-- Incluir una vista parcial, por ejemplo -->

    @include('partials.card')
    @include('partials.card')
    <div id="menu">
    
    </div>
    <script src="{{asset('js/home.js')}}">

    </script>
@endsection

