<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Casa de la Juventud</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(to bottom right, #f2f2f7, #e2e2e8);
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

        /* Navbar */
        .navbar {
            background: linear-gradient(135deg, #563d7c, #6f42c1);
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
            font-size: 1.75rem;
            font-weight: 600;
            transition: transform 0.3s ease, color 0.3s ease;
        }

        .navbar-brand:hover {
            transform: scale(1.05);
            color: #f8bbd0 !important;
        }

        .navbar-toggler {
            border: none;
            color: #fff;
        }

        .navbar-nav .nav-link {
            color: #fff !important;
            font-size: 1.1rem;
            padding: 0.5rem 1.5rem;
            transition: color 0.3s ease, background 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #f8bbd0 !important;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
        }

        /* Main Content */
        .main-content {
            min-height: calc(100vh - 80px - 60px);
            padding: 5rem 2rem 2rem;
            margin: 80px auto 2rem;
            max-width: 1200px;
        }

        .card {
            border-radius: 15px;
            border: none;
            background: #fff;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        /* Botones */
        .btn {
            margin-top: 1.5rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, #563d7c, #6f42c1);
            border: none;
            font-weight: 600;
            padding: 0.75rem 2rem;
            border-radius: 30px;
            transition: background 0.3s ease, transform 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #6f42c1, #8e24aa);
            transform: scale(1.05);
        }

        /* Footer */
        footer {
            background: linear-gradient(135deg, #563d7c, #4b1e78);
            color: #fff;
            padding: 2rem 1rem;
            text-align: center;
            font-size: 0.9rem;
            position: relative;
            bottom: 0;
            width: 100%;
            box-shadow: 0 -4px 15px rgba(0, 0, 0, 0.2);
        }

        footer p {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
        }

        /* Responsividad */
        @media (max-width: 992px) {
            .navbar-brand {
                font-size: 1.5rem;
            }

            .navbar-nav .nav-link {
                font-size: 1rem;
                padding: 0.5rem 1rem;
            }

            .main-content {
                padding: 4rem 1.5rem 1.5rem;
                margin: 70px auto 1.5rem;
            }

            .card {
                padding: 1.5rem;
            }
        }

        @media (max-width: 768px) {
            .navbar {
                padding: 0.75rem 1rem;
            }

            .navbar-brand {
                font-size: 1.25rem;
            }

            .navbar-nav .nav-link {
                font-size: 0.95rem;
                padding: 0.5rem 0.75rem;
            }

            .main-content {
                padding: 3rem 1rem 1rem;
                margin: 60px auto 1rem;
            }

            .card {
                padding: 1.25rem;
            }

            .btn-primary {
                padding: 0.6rem 1.5rem;
                font-size: 0.95rem;
            }
        }

        @media (max-width: 576px) {
            .navbar {
                padding: 0.5rem 0.75rem;
            }

            .navbar-brand {
                font-size: 1.1rem;
            }

            .navbar-nav .nav-link {
                font-size: 0.85rem;
                padding: 0.4rem 0.5rem;
            }

            .main-content {
                padding: 2.5rem 0.5rem 0.5rem;
                margin: 50px auto 0.5rem;
            }

            .card {
                padding: 1rem;
            }

            .btn-primary {
                padding: 0.5rem 1.2rem;
                font-size: 0.85rem;
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

            .navbar-nav .nav-link {
                font-size: 0.8rem;
                padding: 0.3rem 0.4rem;
            }

            .main-content {
                padding: 2rem 0.25rem 0.25rem;
            }

            .card {
                padding: 0.75rem;
            }

            .btn-primary {
                padding: 0.4rem 1rem;
                font-size: 0.75rem;
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
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('users.index') }}">
                    <span>Casa de la Juventud</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('users.index') }}">Inicio</a>
                        </li>
                        <!-- Puedes agregar más enlaces aquí si lo necesitas -->
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="main-content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-10 col-sm-12">
                        <div class="card">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="mt-5">
            <div class="container">
                <p>© {{ date('Y') }} Casa de la Juventud. Todos los derechos reservados.</p>
            </div>
        </footer>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- SweetAlert2 Confirmation Script -->
    <script>
        function confirmarEliminacion(formId, mensaje) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: mensaje || "Esta acción no se puede deshacer.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(formId).submit();
                }
            });
        }
    </script>
</body>
</html>