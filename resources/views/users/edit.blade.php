@extends('layouts.crud')

@section('content')
    <div class="container">
        <h2>Editar usuario</h2>
        <a href="{{ route('users.index') }}" class="btn btn-primary mb-3">Volver</a>
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" class="form-control" name="name" value="{{ $user->name }}" required>
            </div>
            <div class="form-group">
                <label for="email">correo:</label>
                <input type="text" class="form-control" name="email" value="{{ $user->email }}" required>
            </div>
            <div class="form-group">
                <label for="password">nueva contraseña:</label>
                <input type="text" class="form-control" name="password" >
            </div>
            <br>
            <button type="submit" class="btn btn-success">Actualizar</button>
        </form>
    </div>
@endsection
