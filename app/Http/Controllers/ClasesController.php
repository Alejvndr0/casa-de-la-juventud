<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clase;
use App\Models\Profesor;
use App\Http\Requests\ClasesRequest;
use Illuminate\Support\Facades\DB;

class ClasesController extends Controller
{
    public function index()
    {
        
        $clases = Clase::all();
        $inscripcionesCount = [];

    // Obtén el recuento de inscripciones para cada clase
    foreach ($clases as $clase) {
        $inscripcionesCount[$clase->id] = DB::table('inscripciones')->where('id_clase', $clase->id)->count();
    }

    return view('clases.index', compact('clases', 'inscripcionesCount'));
    }

    public function create()
    {   

        $profesores= Profesor::all();
        return view('clases.create', compact( 'profesores'));
    }

    public function store(ClasesRequest $request)
    {
        Clase::create($request->all());
        return redirect()->route('clases.index')->with('clase creado exitosamente');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Clase $clase)
    {
        
        $profesores= Profesor::all();
        return view('clases.edit' , compact('clase','profesores'));
    }

    public function update(ClasesRequest $request, Clase $clase) 
    {
        $clase->update($request->all());
        return redirect()->route('clases.index')
            ->with('success', 'Estilo actualizado exitosamente.');
    }

    public function destroy(Clase $clase)
{
    try {
        $clase->delete();
        return redirect()->route('clases.index')
            ->with('success', 'Clase eliminada exitosamente.');
    } catch (\Illuminate\Database\QueryException $e) {
        if ($e->errorInfo[1] == 1451) {
            return redirect()->route('clases.index')
                ->with('error', 'No se puede eliminar la clase porque tiene inscripciones o asistencias.');
        }
        // Manejar otros errores si es necesario
    }
}

}