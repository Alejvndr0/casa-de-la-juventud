@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h4>{{ __('Registro de Usuario') }}</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Campo de Nombre -->
                        <div class="form-floating mb-3">
                            <input id="name" type="text" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   name="name" 
                                   value="{{ old('name') }}" 
                                   required autocomplete="name" 
                                   placeholder="Nombre Completo">
                            <label for="name">
                                <i class="bi bi-person-fill me-2"></i>Nombre Completo
                            </label>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Campo de Correo Electrónico -->
                        <div class="form-floating mb-3">
                            <input id="email" type="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   name="email" 
                                   value="{{ old('email') }}" 
                                   required autocomplete="email" 
                                   placeholder="Correo Electrónico">
                            <label for="email">
                                <i class="bi bi-envelope-fill me-2"></i>Correo Electrónico
                            </label>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Campo de Contraseña -->
                        <div class="form-floating mb-3">
                            <input id="password" type="password" 
                                   class="form-control @error('password') is-invalid @enderror" 
                                   name="password" 
                                   required autocomplete="new-password" 
                                   placeholder="Contraseña">
                            <label for="password">
                                <i class="bi bi-lock-fill me-2"></i>Contraseña
                            </label>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Campo de Confirmar Contraseña -->
                        <div class="form-floating mb-3">
                            <input id="password-confirm" type="password" 
                                   class="form-control" 
                                   name="password_confirmation" 
                                   required autocomplete="new-password" 
                                   placeholder="Confirmar Contraseña">
                            <label for="password-confirm">
                                <i class="bi bi-lock-fill me-2"></i>Confirmar Contraseña
                            </label>
                        </div>

                        <!-- Botón de Registro -->
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="bi bi-check-circle-fill me-2"></i>{{ __('Registrar') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
