<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa de la Juventud</title>
   
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilos personalizados para el sidebar */
        #sidebar {
            width: 250px;
            min-height: 100vh;
            transition: all 0.3s;
        }

        #sidebar .nav-link {
            font-size: 1rem;
            padding: 10px 20px;
        }

        #sidebar.toggled {
            margin-left: -250px;
        }

        #page-content-wrapper {
            transition: all 0.3s;
        }

        #wrapper.toggled #page-content-wrapper {
            margin-left: 0;
        }

        @media (max-width: 768px) {
            #sidebar {
                margin-left: -250px;
            }

            #wrapper.toggled #sidebar {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar" class="bg-dark text-white">
            <div class="sidebar-header text-center py-4">
                <a class="navbar-brand text-white" href="{{ route('welcome') }}">
                    <img src="{{ asset('IMG/def-.png') }}" alt="Logo" style="height: 50px;">
                    <h4>Casa de la Juventud</h4>
                </a>
            </div>
            <hr class="text-white">
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a class="nav-link text-white" href="{{ route('profesores.index') }}">
                        <i class="bi bi-person-circle me-2"></i> Profesores
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-white" href="{{ route('clases.index') }}">
                        <i class="bi bi-calendar-check me-2"></i> Clases
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-white" href="{{ route('inscripciones.index') }}">
                        <i class="bi bi-pencil-square me-2"></i> Inscripciones
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Contenido principal -->
        <div id="page-content-wrapper" class="w-100">
            <!-- Navbar superior -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
                <div class="container-fluid">
                    <button class="btn btn-outline-light me-2" id="menu-toggle">
                        <i class="bi bi-list"></i> Menú
                    </button>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown">
                                    <i class="bi bi-person-circle me-1"></i> {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('users.edit', Auth::user()->id) }}">
                                            <i class="bi bi-gear me-2"></i> Editar Perfil
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('users.create') }}">
                                            <i class="bi bi-person-plus me-2"></i> Agregar Usuario
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="bi bi-box-arrow-right me-2"></i> Salir
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Contenido dinámico -->
            <div class="container mt-4">
                <h1 class="text-center">Bienvenido, {{ Auth::user()->name }}</h1>
                <p class="text-center">Explora las opciones del menú para gestionar tu contenido.</p>
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script para el toggle del sidebar -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const menuToggle = document.getElementById('menu-toggle');
            const wrapper = document.getElementById('wrapper');

            menuToggle.addEventListener('click', () => {
                wrapper.classList.toggle('toggled');
            });
        });
    </script>
</body>

</html>
