<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CASA DE LA JUVENTUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    
    <style>
        body {
            background-color: #f2f2f7;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        h1, h2, h3, h4 {
            color: #343a40;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .navbar {
            background-color: #563d7c;
        }

        .navbar-brand, .navbar-nav .nav-link {
            color: #fff;
        }

        .btn {
            margin-top: 20px;
        }

        .btn-primary {
            background-color: #563d7c;
            border-color: #563d7c;
        }

        .btn-primary:hover {
            background-color: #6f42c1;
            border-color: #6f42c1;
        }

        .card {
            border-radius: 10px;
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        footer {
            background-color: #563d7c;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="{{ route('welcome') }}">
                <img src="{{ asset('IMG/def-.png') }}" alt="Logo" style="height: 45px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('welcome') }}">Inicio</a>
                    </li>
                    
                
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="card p-4">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="mt-5">
        <div class="container">
            <p>&copy; 2024 Casa de la Juventud. Todos los derechos reservados.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    
</body>

</html>
