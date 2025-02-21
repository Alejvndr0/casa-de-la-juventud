<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\observers\InscripcionObserver;
use Carbon\Carbon;

class Inscripcion extends Model
{
    use HasFactory;
    protected $table = 'inscripciones';
    protected $guarded =[];
    protected $primaryKey = 'id';

    
    public function clase(){
        return $this ->belongsto(Clase::class,'id_clase');

    }

    public function fechaActual()
    {
        return Carbon::now();
    }

    public function estaInactiva()
    {
        $fechaActual = $this->fechaActual();
        $fechaExpiracion = $this->fecha_expiracion;

        return $fechaActual > $fechaExpiracion;
    }

    public function diasRestantes()
{
    $fechaExpiracionCarbon = Carbon::parse($this->fecha_expiracion);
    $fechaActual = $this->fechaActual();

    return $fechaExpiracionCarbon->diffInDays($fechaActual);
}
protected static $observer = InscripcionObserver::class;
}
