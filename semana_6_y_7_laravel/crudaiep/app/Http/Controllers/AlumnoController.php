<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //return view('alumnos.index');
        $alumnos=Alumno::all();
        return view('alumnos.index',['alumnos'=>$alumnos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('alumnos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'run'=>'required|max:12',
            'nombre'=>'required|max:30',
            'fono'=>'required'
            ]);
            $alumno = new Alumno();
            $alumno->run =$request->input('run');
            $alumno->nombre =$request->input('nombre');
            $alumno->fono =$request->input('fono');
            $alumno->save();
            

            return view('alumnos.message', ['msg'=> "Registro Guardado"]);    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $alumnos=Alumno::find("$id");
        return view('alumnos.edit',['alumnos'=>$alumnos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([

            'run'=>'required|max:12',
            'nombre'=>'required|max:30',
            'fono'=>'required'
            ]);
            
            $alumno = Alumno::find($id);
            $alumno->run =$request->input('run');
            $alumno->nombre =$request->input('nombre');
            $alumno->fono =$request->input('fono');
            $alumno->save();
            return view('alumnos.message', ['msg'=> "Registro Actualizado"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $alumno=Alumno::find($id);
        $alumno->delete();
        return redirect("alumnos");
    }
}
