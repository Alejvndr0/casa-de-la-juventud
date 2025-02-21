@extends('layouts.crud')

@section('content')
<div class="container">
    <h1>Listado de asistencias</h1>
    <a href="{{route('users.index')}}" class="btn btn-primary mb-3">Volver</a>
    <a href="{{ route('asistencias.create') }}" class="btn btn-primary mb-3">agregar una nueva asistencia</a>
    <table class="table table-dark">
        <thead >
            <tr>
                <th>ID</th>
                <th>fecha de asistencia</th>
                <th>estado de asistencia</th>
                <th>estudiante</th>
                <th>clase</th>
                <th>acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($asistencias as $asistencia)
                <tr class="table-active">
                    <td>{{$asistencia->id }}</td>
                    <td>{{$asistencia->fecha_asistencia}}</td>
                    <td>{{$asistencia->estado_asistencia}}</td>
                    <td>{{$asistencia->estudiante->nombre}}</td>
                    <td>{{$asistencia->clase->nombre}}</td>
                    
                    <td>
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <a href="{{ route('asistencias.edit', $asistencia->id) }}" class="btn btn-primary mb-3">Editar</a>
                                </div>
                                <div class="col">
                                    <form id="form-eliminar4" action="{{ route('asistencias.destroy', $asistencia->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger" onclick="confirmarEliminacion('form-eliminar4')">Eliminar</button>
                                    </form>
                                </div>
                                <div class="col"></div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection