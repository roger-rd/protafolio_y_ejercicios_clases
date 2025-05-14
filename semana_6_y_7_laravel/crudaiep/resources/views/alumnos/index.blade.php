@extends('layout/template')
@section('title','Alumnos | AIEP')
@section('contenido')

<main>

    <div class="container py-4">
        <h2> Listado de Alumnos </h2>
        <a href="{{url('alumnos/create')}}" class="btn btn-primary btn-sm"> Nuevo Registro </a>
        <table class="table table-hover">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Run</th>
                    <th>Nombre</th>
                    <th>Fono</th>
                </tr>
            </thead>
            <tbody>
                @foreach($alumnos as $alumno)
                <tr>
                    <td>{{$alumno->id}}</td>
                    <td>{{$alumno->run}}</td>
                    <td>{{$alumno->nombre}}</td>
                    <td>{{$alumno->fono}}</td>
                    <td>
                        <a href="{{url('alumnos/'.$alumno->id.'/edit')}}"
                            class="btn btn-warning btn-sm">Actualizar</a>
                    </td>
                    <td>
                        <form action="{{url('alumnos/'.$alumno->id)}}" method="post">
                            @method("DELETE")
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>


    </div>

</main>