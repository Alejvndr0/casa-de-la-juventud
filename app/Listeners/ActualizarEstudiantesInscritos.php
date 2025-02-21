<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use App\Events\InscripcionCreada;

class ActualizarEstudiantesInscritos
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(InscripcionCreada $event): void
    {
        $claseId = $event->claseId;
    $estudiantesInscritos = DB::table('inscripciones')
        ->where('id_clase', $claseId)
        ->count();

    // Actualiza el campo 'estudiantes_inscritos' en la tabla 'clases'
    DB::table('clases')
        ->where('id', $claseId)
        ->update(['estudiantes_inscritos' => $estudiantesInscritos]);
    }
}
