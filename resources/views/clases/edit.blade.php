@extends('layouts.crud')

@section('content')
    <div class="container">
        <h2>Editar estilo</h2>
        <a href="{{ route('clases.index') }}" class="btn btn-primary mb-3">Volver</a>
        <form action="{{ route('clases.update', $clase->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" name="nombre" value="{{ $clase->nombre }}" required>
            </div>
            <div class="form-group">
                <label for="descripcion">descripcion:</label>
                <input type="text" class="form-control" name="descripcion" value="{{ $clase->descripcion }}" required>
            </div>
            <div class="form-group">
                <label for="descripcion">hora de inicio:</label>
                <input type="time" class="form-control" name="hora_inicio" value="{{ $clase->hora_inicio }}" required>
            </div>
            <div class="form-group">
                <label for="descripcion">hora fin:</label>
                <input type="time" class="form-control" name="hora_fin" value="{{ $clase->hora_fin }}" required>
            </div>

            <div class="form-group">
                <label for="id_profesor">Profesor:</label>
                <select name="id_profesor" id="id_profesor" class="form-control" required>
                    @foreach ($profesores as $profesor)
                        <option value="{{ $profesor->id }}" {{ $clase->id_profesor == $profesor->id ? 'selected' : '' }}>
                            {{ $profesor->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Actualizar</button>
        </form>
    </div>
@endsection
