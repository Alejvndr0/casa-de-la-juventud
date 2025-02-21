@extends('layouts.crud')

@section('content')
    <div class="container">
        <h1>Detalles de Inscripción</h1>

        <h2>ID: {{ $inscripcion->id }}</h2>
        <p><strong>Fecha de Inscripción:</strong> {{ $inscripcion->fecha_inscripcion }}</p>
        <p><strong>Estado:</strong> {{ $inscripcion->estaInactiva() ? 'Inactiva' : 'Activa' }}</p>
        <p><strong>Estudiante:</strong> {{ $inscripcion->nombre }} {{ $inscripcion->apellido }}</p>
        <p><strong>Clase:</strong> {{ $inscripcion->clase->nombre ?? 'No asignada' }}</p>
        <p><strong>Días restantes:</strong> {{ $inscripcion->diasRestantes() }} días restantes</p>

        <h3>Archivo PDF</h3>
        <a href="{{ asset('storage/' . $inscripcion->pdf) }}" target="_blank">Ver PDF</a>

        <a href="{{ route('inscripciones.index') }}" class="btn btn-primary mt-3">Volver a la lista</a>
    </div>
@endsection
