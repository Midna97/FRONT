@extends('layouts.base')

@section('title', 'Iniciar Sesión')

@section('content')
    <h1>Iniciar Sesión</h1>
    <form action="{{ route('login.submit') }}" method="POST">
        @csrf
        <div>
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Iniciar Sesión</button>
    </form>
@endsection