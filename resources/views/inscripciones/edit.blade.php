@extends('layouts.crud')

@section('content')
    <div class="container">
        <h1>Editar Inscripción</h1>
        <form method="POST" action="{{ route('inscripciones.update', $inscripcion->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="fecha_inscripcion">Fecha de Inscripción:</label>
                <input type="date" name="fecha_inscripcion" id="fecha_inscripcion" class="form-control"
                       value="{{ $inscripcion->fecha_inscripcion }}" required>
            </div>

            <div class="form-group">
                <label for="fecha_nac">Fecha de Nacimiento:</label>
                <input type="date" name="fecha_nac" id="fecha_nac" class="form-control"
                       value="{{ $inscripcion->fecha_nac }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control"
                       value="{{ $inscripcion->email }}" required>
            </div>

            <div class="form-group">
                <label for="id_clase">Clase:</label>
                <select name="id_clase" id="id_clase" class="form-control" required>
                    @foreach ($clases as $clase)
                        <option value="{{ $clase->id }}" {{ $inscripcion->id_clase === $clase->id ? 'selected' : '' }}>
                            {{ $clase->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Inscripción</button>
        </form>
    </div>
@endsection
