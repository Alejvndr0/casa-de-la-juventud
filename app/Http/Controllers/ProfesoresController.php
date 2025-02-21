<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profesor;
use App\Http\Requests\ProfesoresRequest;

class ProfesoresController extends Controller
{
    public function index()
    {
        $profesores = Profesor::all();
        return view('profesores.index', compact('profesores'));
    }
    public function create()
    {
        return view('profesores.create');
    }
    public function store(ProfesoresRequest $request)
    {
        Profesor::create($request->all());
        return redirect()->route('profesores.index')->with('success', 'Profesor creado exitosamente');
    }
    public function show($id)
    {
        
    }
    public function edit($id)
    {
        $profesor = Profesor::find($id);
        return view('profesores.edit', compact('profesor'));
    }
    public function update(ProfesoresRequest $request, $id)
    {
        $profesor = Profesor::find($id);
        $profesor->update($request->all());
        return redirect()->route('profesores.index')->with('success', 'Profesor actualizado exitosamente');
    }
    public function destroy($id)
    {
        
        $profesor = Profesor::find($id);
        
        $profesor->delete();
        
        return redirect()->route('profesores.index')->with('success', 'Profesor eliminado exitosamente');
    }
}