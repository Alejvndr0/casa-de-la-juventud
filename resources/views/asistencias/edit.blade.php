@extends('layouts.crud')

@section('content')
    <h1>Editar Asistencia</h1>

    <form method="POST" action="{{ route('asistencias.update', $asistencia->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="fecha_asistencia">Fecha de Asistencia:</label>
            <input type="date" name="fecha_asistencia" id="fecha_asistencia" class="form-control" value="{{ $asistencia->fecha_asistencia }}" required>
        </div>

        <div class="form-group">
            <label for="estado_asistencia">Estado de Asistencia:</label>
            <select name="estado_asistencia" id="estado_asistencia" class="form-control" required>
                <option value="Presente" {{ $asistencia->estado_asistencia === 'Presente' ? 'selected' : '' }}>Presente</option>
                <option value="Ausente" {{ $asistencia->estado_asistencia === 'Ausente' ? 'selected' : '' }}>Ausente</option>
            </select>
        </div>

        <div class="form-group">
            <label for="id_estudiante">Estudiante:</label>
            <select name="id_estudiante" id="id_estudiante" class="form-control" required>
                @foreach($estudiantes as $estudiante)
                    <option value="{{ $estudiante->id }}" {{ $asistencia->id_estudiante === $estudiante->id ? 'selected' : '' }}>{{ $estudiante->nombre }} {{ $estudiante->apellido }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="id_clase">Clase:</label>
            <select name="id_clase" id="id_clase" class="form-control" required>
                @foreach($clases as $clase)
                    <option value="{{ $clase->id }}" {{ $asistencia->id_clase === $clase->id ? 'selected' : '' }}>{{ $clase->nombre }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Asistencia</button>
    </form>
@endsection