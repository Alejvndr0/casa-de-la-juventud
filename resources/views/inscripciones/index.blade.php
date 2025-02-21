@extends('layouts.crud')

@section('content')
    <div class="container">
        <h1>Lista de Inscripciones</h1>
        <a href="{{ route('users.index') }}" class="btn btn-primary mb-3">Volver</a>
        <a href="{{ route('inscripciones.create') }}" class="btn btn-primary mb-3">Registrar Inscripción</a>
        <a href="{{ route('exportar.pdf') }}" class="btn btn-danger mb-3">Exportar PDF</a>


        <table class="table table-dark">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Fecha de Inscripción</th>
                    <th>Estado</th>
                    <th>Estudiante</th>
                    <th>Clase</th>
                    <th>Días</th>
                    <th>PDF</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($inscripciones as $inscripcion)
                    <tr class="table-active">
                        <td>{{ $inscripcion->id }}</td>
                        <td>{{ $inscripcion->fecha_inscripcion }}</td>

                        @if ($inscripcion->estaInactiva())
                            <td class="text-danger">Inactiva</td>
                        @else
                            <td class="text-success">Activa</td>
                        @endif

                        <td>{{ $inscripcion->nombre }} {{ $inscripcion->apellido }}</td>
                        <td>{{ $inscripcion->clase->nombre ?? 'No asignada' }}</td>
                        <td class="text-{{ $inscripcion->estaInactiva() ? 'danger' : 'success' }}">
                            {{ $inscripcion->diasRestantes() }} días restantes
                        </td>
                        <td>
                            <a href="{{ asset('storage/' . $inscripcion->pdf) }}" target="_blank">Ver PDF</a>

                           
                        </td>
                        <td>
                            <a href="{{ route('inscripciones.edit', $inscripcion->id) }}" class="btn btn-primary">Editar</a>
                            <form id="form-eliminar{{ $inscripcion->id }}" action="{{ route('inscripciones.destroy', $inscripcion->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger" onclick="confirmarEliminacion('form-eliminar{{ $inscripcion->id }}')">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
