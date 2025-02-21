<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Casa de la Juventud</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(to bottom, #f2f2f7, #e2e2e8);
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            color: #333;
        }

        h1, h2, h3, h4 {
            font-family: 'Poppins', sans-serif;
            font-weight: 800;
            color: #343a40;
        }

        /* Sidebar */
        #sidebar {
            width: 280px;
            min-height: 100vh;
            background: linear-gradient(180deg, #2d3748, #1a202c);
            color: #fff;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 1000;
            transition: margin-left 0.3s ease;
            box-shadow: 2px 0 15px rgba(0, 0, 0, 0.3);
        }

        #sidebar .sidebar-header {
            padding: 2rem 1rem;
            text-align: center;
            background: rgba(255, 255, 255, 0.05);
        }

        #sidebar .navbar-brand {
            color: #fff !important;
            font-size: 1.5rem;
            font-weight: 700;
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: transform 0.3s ease;
        }

        #sidebar .navbar-brand img {
            height: 60px;
            margin-bottom: 0.5rem;
            transition: transform 0.3s ease;
        }

        #sidebar .navbar-brand:hover {
            transform: scale(1.05);
        }

        #sidebar .navbar-brand:hover img {
            transform: rotate(10deg);
        }

        #sidebar .nav-link {
            font-size: 1.1rem;
            padding: 1rem 1.5rem;
            color: #d9d9d9;
            transition: background 0.3s ease, color 0.3s ease, padding-left 0.3s ease;
        }

        #sidebar .nav-link:hover, #sidebar .nav-link.active {
            background: rgba(248, 187, 208, 0.2);
            color: #fff;
            padding-left: 2rem;
        }

        #sidebar .nav-link i {
            margin-right: 0.75rem;
        }

        #sidebar hr {
            border-color: rgba(255, 255, 255, 0.2);
            margin: 1rem 0;
        }

        #sidebar.toggled {
            margin-left: -280px;
        }

        /* Page Content */
        #page-content-wrapper {
            width: 100%;
            margin-left: 280px;
            transition: margin-left 0.3s ease;
        }

        #wrapper.toggled #page-content-wrapper {
            margin-left: 0;
        }

        /* Navbar superior */
        .top-navbar {
            background: linear-gradient(135deg, #4b1e78, #563d7c);
            padding: 1rem 2rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .top-navbar .btn-toggle {
            background: transparent;
            border: 1px solid #fff;
            color: #fff;
            padding: 0.5rem 1rem;
            transition: background 0.3s ease, transform 0.3s ease;
        }

        .top-navbar .btn-toggle:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: scale(1.05);
        }

        .top-navbar .nav-link {
            color: #fff !important;
            font-size: 1.1rem;
            padding: 0.5rem 1rem;
        }

        .top-navbar .dropdown-menu {
            background: #4b1e78;
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }

        .top-navbar .dropdown-item {
            color: #d9d9d9;
            padding: 0.75rem 1.5rem;
            transition: background 0.3s ease, color 0.3s ease;
        }

        .top-navbar .dropdown-item:hover {
            background: #603089;
            color: #fff;
        }

        .top-navbar .dropdown-item i {
            margin-right: 0.5rem;
        }

        /* Contenido dinámico */
        .content-container {
            padding: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .welcome-message {
            background: #fff;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
            text-align: center;
        }

        /* Responsividad */
        @media (max-width: 992px) {
            #sidebar {
                width: 250px;
            }

            #page-content-wrapper {
                margin-left: 250px;
            }

            #sidebar.toggled {
                margin-left: -250px;
            }

            .top-navbar {
                padding: 0.75rem 1rem;
            }
        }

        @media (max-width: 768px) {
            #sidebar {
                margin-left: -250px;
            }

            #wrapper.toggled #sidebar {
                margin-left: 0;
            }

            #page-content-wrapper {
                margin-left: 0;
            }

            .content-container {
                padding: 1rem;
            }

            .welcome-message h1 {
                font-size: 1.75rem;
            }

            .welcome-message p {
                font-size: 1rem;
            }
        }

        @media (max-width: 576px) {
            .navbar-brand {
                font-size: 1.25rem;
            }

            .navbar-brand img {
                height: 40px;
            }

            .top-navbar .nav-link {
                font-size: 1rem;
            }

            .top-navbar .btn-toggle {
                padding: 0.4rem 0.8rem;
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar" class="bg-dark text-white">
            <div class="sidebar-header">
                <a class="navbar-brand" href="{{ route('welcome') }}">
                    <img src="{{ asset('IMG/def-.png') }}" alt="Logo">
                    <span>Casa de la Juventud</span>
                </a>
            </div>
            <hr>
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a class="nav-link {{ request()->routeIs('profesores.*') ? 'active' : '' }}" href="{{ route('profesores.index') }}">
                        <i class="bi bi-person-circle"></i> Profesores
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link {{ request()->routeIs('clases.*') ? 'active' : '' }}" href="{{ route('clases.index') }}">
                        <i class="bi bi-calendar-check"></i> Clases
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link {{ request()->routeIs('inscripciones.*') ? 'active' : '' }}" href="{{ route('inscripciones.index') }}">
                        <i class="bi bi-pencil-square"></i> Inscripciones
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Contenido principal -->
        <div id="page-content-wrapper">
            <!-- Navbar superior -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top top-navbar">
                <div class="container-fluid">
                    <button class="btn btn-toggle" id="menu-toggle">
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
                                            <i class="bi bi-gear"></i> Editar Perfil
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('users.create') }}">
                                            <i class="bi bi-person-plus"></i> Agregar Usuario
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="bi bi-box-arrow-right"></i> Salir
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
            <div class="content-container">
                <div class="welcome-message">
                    <h1>Bienvenido, {{ Auth::user()->name }}</h1>
                    <p>Explora las opciones del menú para gestionar tu contenido.</p>
                </div>
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