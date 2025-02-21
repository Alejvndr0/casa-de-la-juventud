@extends('layouts.crud')

@section('content')
    <h1>Registrar Asistencia</h1>

    <form method="POST" action="{{ route('asistencias.store') }}">
        @csrf

        <div class="form-group">
            <label for="fecha_asistencia">Fecha de Asistencia:</label>
            <input type="date" name="fecha_asistencia" id="fecha_asistencia" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="estado_asistencia">Estado de Asistencia:</label>
            <select name="estado_asistencia" id="estado_asistencia" class="form-control" required>
                <option value="Presente">Presente</option>
                <option value="Ausente">Ausente</option>
            </select>
        </div>

        <div class="form-group">
            <label for="id_estudiante">Estudiante:</label>
            <select name="id_estudiante" id="id_estudiante" class="form-control" required>
                @foreach($estudiantes as $estudiante)
                    <option value="{{ $estudiante->id }}">{{ $estudiante->nombre }} {{ $estudiante->apellido }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="id_clase">Clase:</label>
            <select name="id_clase" id="id_clase" class="form-control" required>
                @foreach($clases as $clase)
                    <option value="{{ $clase->id }}">{{ $clase->nombre }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Registrar Asistencia</button>
    </form>
@endsection