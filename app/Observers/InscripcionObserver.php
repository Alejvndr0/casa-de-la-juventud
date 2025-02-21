<?php

namespace App\Observers;

use App\Models\Inscripcion;
use Carbon\Carbon;

class InscripcionObserver
{
    public function creating(Inscripcion $inscripcion)
    {
        $inscripcion->fecha_expiracion = Carbon::now()->addMonth();
    }
}
