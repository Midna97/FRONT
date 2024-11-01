@extends('layouts.base')

@section('title', 'Página Principal')

@section('content')


@if ($idcategory == 1)
    <h1>Pagina de alimentos </h1>

@elseif ($idcategory == 2)
    <h1>Pagina de bebidas</h1>

@else
    <h1>Pagina de postres</h1>
    @endif


@endsection
