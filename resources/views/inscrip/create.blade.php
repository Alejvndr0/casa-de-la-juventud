@extends('layouts.regis')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg border-0">
            <div class="card-header bg-primary text-white text-center">
                <h2>Registrar Inscripción</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('inscrip.store') }}" enctype="multipart/form-data" novalidate>
                    @csrf

                    <div class="mb-3">
                        <label for="nombre" class="form-label"><i class="bi bi-person-fill me-2"></i>Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingresa tu nombre" required>
                        <div class="invalid-feedback">Por favor, ingresa tu nombre.</div>
                    </div>

                    <div class="mb-3">
                        <label for="apellido" class="form-label"><i class="bi bi-person-fill me-2"></i>Apellidos</label>
                        <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Ingresa tus apellidos" required>
                        <div class="invalid-feedback">Por favor, ingresa tus apellidos.</div>
                    </div>

                    <div class="mb-3">
                        <label for="fecha_nac" class="form-label"><i class="bi bi-calendar-date me-2"></i>Fecha de nacimiento</label>
                        <input type="date" name="fecha_nac" id="fecha_nac" class="form-control" required>
                        <div class="invalid-feedback">Por favor, selecciona tu fecha de nacimiento.</div>
                    </div>

                    <div class="mb-3">
                        <label for="direccion" class="form-label"><i class="bi bi-geo-alt-fill me-2"></i>Dirección</label>
                        <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Ingresa tu dirección" required>
                        <div class="invalid-feedback">Por favor, ingresa tu dirección.</div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label"><i class="bi bi-envelope-fill me-2"></i>Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="ejemplo@correo.com" required>
                        <div class="invalid-feedback">Por favor, ingresa un correo electrónico válido.</div>
                    </div>

                    <div class="mb-3">
                        <label for="pdf" class="form-label"><i class="bi bi-file-earmark-pdf-fill me-2"></i>Fotocopia de carnet (PDF)</label>
                        <input type="file" name="pdf" id="pdf" class="form-control" accept="application/pdf" required>
                        <div class="invalid-feedback">Por favor, sube un archivo PDF.</div>
                    </div>

                    <div class="mb-3">
                        <label for="fecha_inscripcion" class="form-label"><i class="bi bi-calendar-check-fill me-2"></i>Fecha de Inscripción</label>
                        <input type="date" name="fecha_inscripcion" id="fecha_inscripcion" class="form-control" required>
                        <div class="invalid-feedback">Por favor, selecciona la fecha de inscripción.</div>
                    </div>

                    <div class="mb-3">
                        <label for="id_clase" class="form-label"><i class="bi bi-list-task me-2"></i>Clase</label>
                        <select name="id_clase" id="id_clase" class="form-select" required>
                            <option value="" disabled selected>Selecciona una clase</option>
                            @foreach ($clases as $clase)
                                <option value="{{ $clase->id }}">{{ $clase->nombre }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">Por favor, selecciona una clase.</div>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger mt-4">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="d-flex justify-content-between mt-4">
                        <button type="submit" class="btn btn-success" onclick="return confirmSubmit()">
                            <i class="bi bi-check-circle-fill me-2"></i>Registrar Inscripción
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function confirmSubmit() {
            return confirm("¿Estás seguro de que deseas registrar esta inscripción?");
        }
    </script>
@endsection
