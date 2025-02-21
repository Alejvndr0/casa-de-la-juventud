@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h4>{{ __('Iniciar Sesión') }}</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Campo de Correo Electrónico -->
                        <div class="form-floating mb-3">
                            <input id="email" type="email" 
                                class="form-control @error('email') is-invalid @enderror" 
                                name="email" 
                                value="{{ old('email') }}" 
                                required autocomplete="email" autofocus 
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
                                required autocomplete="current-password" 
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

                        <!-- Recordar Sesión -->
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" 
                                name="remember" 
                                id="remember" 
                                {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                <i class="bi bi-check-circle-fill me-2"></i>{{ __('Recordar Sesión') }}
                            </label>
                        </div>

                        <!-- Botones de Iniciar Sesión y Olvidar Contraseña -->
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="bi bi-box-arrow-in-right me-2"></i>{{ __('Iniciar Sesión') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link text-primary" href="{{ route('password.request') }}">
                                    <i class="bi bi-question-circle-fill me-2"></i>{{ __('¿Olvidaste tu contraseña?') }}
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
