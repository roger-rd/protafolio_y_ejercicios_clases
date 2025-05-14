@extends('layout/template')
@section('title','Editar de Alumnos | AIEP')
@section('contenido')


<main>

    <div class="container py-4">
        <h2> Editar Alumnos </h2>
        @if($errors->any())
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        
        @endif
        <form action="{{url('alumnos/'.$alumnos->id)}}" method="post">
        @method("PUT")    
        @csrf
            <div class="mb-3 row">
                <label for="run" class="col-sm-2 col-form-label">Run</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="run" id="run"
                    value="{{$alumnos->run}}" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="nombre" id="nombre"
                    value="{{$alumnos->nombre }}" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="fono" class="col-sm-2 col-form-label">Fono</label>
                <div class="col-sm-5">
                    <input type="numeric" class="form-control" name="fono" id="fono"
                    value="{{$alumnos->fono}}" required>
                </div>
            </div>

            <button type="submit" class="btn btn-success">Actualizar</button>
            <a href="{{url('alumnos')}}" class="btn btn-secondary"> Inicio </a>
        </form>
</main>