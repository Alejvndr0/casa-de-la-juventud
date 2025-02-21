<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscripcion;
use App\Models\Clase;
use App\Http\Requests\InscripcionesRequest;
use Carbon\Carbon;
class IsncripController extends Controller
{
    public function create()
    {
        
        $clases = Clase::all();
        return view('inscrip.create', compact( 'clases'));
    }
    

    public function store(InscripcionesRequest $request)
    {
        // Calcular la edad a partir de la fecha de nacimiento
        $age = Carbon::parse($request->fecha_nac)->age;
        
        // Validar que la edad esté entre 16 y 28 años
        if ($age < 16 || $age > 28) {
            return redirect()->back()->withErrors('La edad debe estar entre 16 y 28 años para inscribirse.');
        }

        // Verificar que el estudiante no esté inscrito en más de dos clases
        $existingRegistrations = Inscripcion::where('email', $request->email)->count();
        if ($existingRegistrations >= 2) {
            return redirect()->back()->withErrors('Ya estás inscrito en el máximo de dos clases.');
        }

        // Subir el archivo PDF y almacenar la ruta
        $pdfPath = $request->file('pdf')->store('id_copies', 'public');

        // Crear la inscripción
        $inscripcion = Inscripcion::create([
            'fecha_inscripcion' => $request->fecha_inscripcion,
            'fecha_expiracion' => Carbon::now()->addMonth(),
            'fecha_nac' => $request->fecha_nac,
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'direccion' => $request->direccion,
            'email' => $request->email,
            'pdf' => $pdfPath,
            'id_clase' => $request->id_clase,
        ]);

        return redirect()
            ->route('welcome')
            ->with('success', 'Inscripción registrada exitosamente.');
    }

}
