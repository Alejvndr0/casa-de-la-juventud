<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscripcion;
use App\Models\Clase;
use App\Models\Estudiante;
use App\Http\Requests\InscripcionesRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\URL;
use Barryvdh\DomPDF\Facade\Pdf;

class InscripcionesController extends Controller
{
    

    

    public function exportarPDF()
    {
        // Forzar URLs HTTPS
        URL::forceScheme('https');
    
        // Obtener inscripciones con el nombre de la clase
        $inscripciones = Inscripcion::with('clase:id,nombre')
            ->select('nombre', 'apellido', 'email', 'id_clase', 'fecha_inscripcion')
            ->get();
    
        // Cargar la vista para el PDF
        $pdf = PDF::setOptions(['isRemoteEnabled' => true])->loadView('listado', compact('inscripciones'));
    
        return $pdf->download('inscritos.pdf');
    }



    public function index()
    {
        $inscripciones = Inscripcion::all();
        return view('inscripciones.index', compact('inscripciones'));
    }

    public function create()
    {
        
        $clases = Clase::all();
        return view('inscripciones.create', compact( 'clases'));
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
            ->route('inscripciones.index')
            ->with('success', 'Inscripción registrada exitosamente.');
    }

    public function show($id)
    {
        $inscripcion = Inscripcion::findOrFail($id);
        return view('inscripciones.show', compact('inscripcion'));
    }

    public function edit(Inscripcion $inscripcion)
    {

        $clases = Clase::all();
        return view('inscripciones.edit', compact('inscripcion','clases'));
    }

    public function update(Request $request, Inscripcion $inscripcion)
    {
        $inscripcion->update($request->all());
        return redirect()->route('inscripciones.index')
                         ->with('success', 'Inscripción actualizada');
    }

    public function destroy($id)
    {
        $inscripcion = Inscripcion::findOrFail($id);
        $inscripcion->delete();

        return redirect()
            ->route('inscripciones.index')
            ->with('success', 'Inscripción eliminada');
    }
}
