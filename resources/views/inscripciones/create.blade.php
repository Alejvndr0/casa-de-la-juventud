@extends('layouts.crud')

@section('content')
    <h1>Registrar Inscripción</h1>

    <form method="POST" action="{{ route('inscripciones.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="apellido">Apellidos</label>
            <input type="text" name="apellido" id="apellido" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="fecha_nac">Fecha de nacimiento:</label>
            <input type="date" name="fecha_nac" id="fecha_nac" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="direccion">Dirección</label>
            <input type="text" name="direccion" id="direccion" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="pdf">Fotocopia de carnet (PDF)</label>
            <input type="file" name="pdf" id="pdf" class="form-control" accept="application/pdf" required>
        </div>

        <div class="form-group">
            <label for="fecha_inscripcion">Fecha de Inscripción:</label>
            <input type="date" name="fecha_inscripcion" id="fecha_inscripcion" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="id_clase">Clase:</label>
            <select name="id_clase" id="id_clase" class="form-control" required>
                @foreach ($clases as $clase)
                    <option value="{{ $clase->id }}">{{ $clase->nombre }}</option>
                @endforeach
            </select>
        </div>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <button type="submit" class="btn btn-primary">Registrar Inscripción</button>
        
    </form>
@endsection
