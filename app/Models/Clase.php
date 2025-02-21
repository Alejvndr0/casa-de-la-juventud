<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function profesor(){
        return $this -> belongsTo(Profesor::class,'id_profesor');
    }

 
    public function inscripciones(){
        return $this -> hasMany(Inscripcion::class, 'id_clase');
    }
    
}
