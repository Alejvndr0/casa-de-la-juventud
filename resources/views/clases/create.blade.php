@extends('layouts.crud')

@section('content')
    <div class="container">
        <h2>agregar una nueva clase</h2>
        <a href="{{ route('clases.index') }}" class="btn btn-primary mb-3">Volver</a>
        <form action="{{ route('clases.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" class="form-control" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="descripcion">descripcion:</label>
                <input type="text" class="form-control" name="descripcion" required>
            </div>
            <div class="form-group">
                <label for="hora_inicio">hora de inicio:</label>
                <input type="time" class="form-control" name="hora_inicio" required>
            </div>
            <div class="form-group">
                <label for="hora_fin">hora fin:</label>
                <input type="time" class="form-control" name="hora_fin" required>
            </div>


            <div class="form-group">
                <label for="id_profesor">Profesor:</label>
                <select name="id_profesor" id="id_profesor" class="form-control" nullable>
                    @foreach ($profesores as $profesor)
                        <option value="{{ $profesor->id }}">{{ $profesor->nombre }}</option>
                    @endforeach
                </select>
            </div>


            <br>
            <button type="submit" class="btn btn-success">Guardar</button>
        </form>
    </div>
@endsection
