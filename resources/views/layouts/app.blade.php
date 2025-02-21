<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Casa de la Juventud') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;800&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(to bottom, #f5f5f5, #e5e7eb);
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            color: #333;
        }

        h1, h2, h3, h4 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 800;
            color: #343a40;
        }

        /* Navbar */
        .navbar {
            background: linear-gradient(135deg, #4b1e78, #603089);
            padding: 1rem 2rem;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            transition: background 0.3s ease, padding 0.3s ease;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            color: #fff !important;
            font-family: 'Montserrat', sans-serif;
            font-weight: 800;
            font-size: 1.75rem;
            transition: transform 0.3s ease;
        }

        .navbar-brand:hover {
            transform: scale(1.05);
            color: #f8bbd0 !important;
        }

        .navbar-brand img {
            height: 40px;
            margin-right: 10px;
            transition: transform 0.3s ease;
        }

        .navbar-brand:hover img {
            transform: rotate(10deg);
        }

        .navbar-toggler {
            border: none;
            color: #fff;
        }

        .navbar-nav .nav-link {
            color: #d9d9d9 !important;
            font-size: 1.1rem;
            padding: 0.5rem 1.5rem;
            transition: color 0.3s ease, background 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #fff !important;
            background: rgba(248, 187, 208, 0.2);
            border-radius: 20px;
        }

        .dropdown-menu {
            background: #4b1e78;
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }

        .dropdown-item {
            color: #d9d9d9;
            padding: 0.75rem 1.5rem;
            transition: background 0.3s ease, color 0.3s ease;
        }

        .dropdown-item:hover {
            background: #603089;
            color: #fff;
        }

        .dropdown-item i {
            margin-right: 0.5rem;
        }

        /* Main Content */
        .main-content {
            min-height: calc(100vh - 80px - 60px);
            padding: 5rem 2rem 2rem;
            background: #fff;
            border-radius: 15px;
            margin: 80px auto 2rem;
            max-width: 1200px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        /* Footer */
        footer {
            background: linear-gradient(135deg, #4b1e78, #2d1b4e);
            color: #d9d9d9;
            padding: 2rem 1rem;
            text-align: center;
            font-size: 0.9rem;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        footer p {
            margin: 0;
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
        }

        /* Responsividad */
        @media (max-width: 992px) {
            .navbar-brand {
                font-size: 1.5rem;
            }

            .navbar-brand img {
                height: 35px;
            }

            .navbar-nav .nav-link {
                font-size: 1rem;
                padding: 0.5rem 1rem;
            }

            .main-content {
                padding: 4rem 1.5rem 1.5rem;
                margin: 70px auto 1.5rem;
            }
        }

        @media (max-width: 768px) {
            .navbar {
                padding: 0.75rem 1rem;
            }

            .navbar-brand {
                font-size: 1.25rem;
            }

            .navbar-brand img {
                height: 30px;
                margin-right: 8px;
            }

            .navbar-nav .nav-link {
                font-size: 0.95rem;
                padding: 0.5rem 0.75rem;
            }

            .main-content {
                padding: 3rem 1rem 1rem;
                margin: 60px auto 1rem;
            }

            .dropdown-menu {
                width: 100%;
                text-align: center;
            }
        }

        @media (max-width: 576px) {
            .navbar {
                padding: 0.5rem 0.75rem;
            }

            .navbar-brand {
                font-size: 1.1rem;
            }

            .navbar-brand img {
                height: 25px;
                margin-right: 5px;
            }

            .navbar-nav .nav-link {
                font-size: 0.85rem;
                padding: 0.4rem 0.5rem;
            }

            .main-content {
                padding: 2.5rem 0.5rem 0.5rem;
                margin: 50px auto 0.5rem;
                border-radius: 10px;
            }

            footer {
                padding: 1.5rem 0.5rem;
            }

            footer p {
                font-size: 0.85rem;
            }
        }

        @media (max-width: 400px) {
            .navbar-brand {
                font-size: 1rem;
            }

            .navbar-brand img {
                height: 20px;
            }

            .navbar-nav .nav-link {
                font-size: 0.8rem;
                padding: 0.3rem 0.4rem;
            }

            .main-content {
                padding: 2rem 0.25rem 0.25rem;
                margin: 45px auto 0.25rem;
            }

            footer p {
                font-size: 0.75rem;
            }
        }
    </style>
</head>
<body>
    <div id="app">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-md navbar-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('IMG/def-.png') }}" alt="Logo Casa de la Juventud" class="logo-img">
                    <span>Casa de la Juventud</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        @guest
                            <!-- Espacio para enlaces de invitados si los necesitas -->
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" 
                                   data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="main-content">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer>
            <div class="container">
                <p>© {{ date('Y') }} Casa de la Juventud. Todos los derechos reservados.</p>
            </div>
        </footer>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>