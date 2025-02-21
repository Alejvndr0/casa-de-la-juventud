@extends('layouts.crud')

@section('content')
    <div class="container">
        <h2>Detalles del usuario</h2>
        <table class="table">
            <tbody>
                <tr>
                    <th>ID:</th>
                    <td>{{ $user->id }}</td>
                </tr>
                <tr>
                    <th>Nombre:</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th>correo:</th>
                    <td>{{ $user->email }}</td>
                </tr>
            </tbody>
        </table>
        <a href="{{ route('users.index') }}" class="btn btn-primary">Volver</a>
    </div>
@endsection
