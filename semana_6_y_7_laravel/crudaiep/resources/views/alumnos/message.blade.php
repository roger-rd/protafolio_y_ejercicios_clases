@extends('layout/template')
@section('title', 'Alumnos Registrado | AIEP')
@section('contenido')

<main>

    <div class='container py-4'>
        <h2> {{$msg}} </h2>
        <a href="{{url('alumnos')}}" class="btn btn-primary btn-sm">Regresar </a>
    </div>

</main>