<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa de la Juventud - Tu Espacio para Crecer</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;800&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        h1, h2 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 800;
        }

        /* Navbar */
        .navbar {
            background: rgba(45, 55, 72, 0.95);
            padding: 1rem 2rem;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            transition: background 0.3s ease;
        }

        .navbar.scrolled {
            background: #2d3748;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .navbar-brand {
            color: #fff !important;
            font-size: 1.75rem;
            display: flex;
            align-items: center;
        }

        .logo-img {
            height: 50px;
            margin-right: 10px;
            transition: transform 0.3s ease;
        }

        .navbar-brand:hover .logo-img {
            transform: scale(1.1);
        }

        .navbar-nav .nav-link {
            color: #fff !important;
            font-size: 1.1rem;
            padding: 0.5rem 1.5rem;
            transition: color 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #f8bbd0 !important;
        }

        /* Hero Section */
        .hero-section {
            position: relative;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            background: url('{{ asset('IMG/juve3.png') }}') no-repeat center center/cover;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, rgba(106, 27, 154, 0.7), rgba(0, 0, 0, 0.8));
        }

        .hero-content {
            position: relative;
            z-index: 1;
        }

        .hero-content h1 {
            font-size: 4.5rem;
            margin-bottom: 1.5rem;
            text-shadow: 3px 3px 10px rgba(0, 0, 0, 0.7);
            animation: fadeInUp 1s ease-in-out;
        }

        .hero-content p {
            font-size: 1.5rem;
            margin-bottom: 2rem;
            animation: fadeInUp 1.2s ease-in-out;
        }

        .hero-content .btn {
            background: #f8bbd0;
            color: #2d3748;
            font-size: 1.25rem;
            padding: 0.75rem 2.5rem;
            border-radius: 50px;
            font-weight: 600;
            transition: background 0.3s ease, transform 0.3s ease;
            animation: fadeInUp 1.4s ease-in-out;
        }

        .hero-content .btn:hover {
            background: #ec407a;
            transform: translateY(-3px);
            color: #fff;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Sección Conócenos */
        .about-section {
            padding: 5rem 2rem;
            background: #fff;
        }

        .about-section h2 {
            font-size: 3rem;
            color: #2d3748;
            margin-bottom: 2rem;
            text-align: center;
        }

        .about-section p {
            font-size: 1.25rem;
            color: #666;
            line-height: 1.8;
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
        }

        /* Servicios */
        .services-section {
            padding: 5rem 2rem;
            background: #f3e5f5;
        }

        .services-section h2 {
            font-size: 3rem;
            color: #6a1b9a;
            margin-bottom: 3rem;
            text-align: center;
        }

        .service-card {
            background: #fff;
            border-radius: 15px;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .service-card i {
            font-size: 2.5rem;
            color: #f8bbd0;
            margin-bottom: 1rem;
        }

        .service-card h3 {
            font-size: 1.5rem;
            color: #2d3748;
            margin-bottom: 1rem;
        }

        /* Galería */
        .gallery-section {
            padding: 5rem 2rem;
        }

        .gallery-section h2 {
            font-size: 3rem;
            color: #6a1b9a;
            margin-bottom: 3rem;
            text-align: center;
        }

        .gallery-card {
            position: relative;
            overflow: hidden;
            border-radius: 15px;
            margin-bottom: 2rem;
        }

        .gallery-card img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .gallery-card:hover img {
            transform: scale(1.1);
        }

        .gallery-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            opacity: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            transition: opacity 0.3s ease;
        }

        .gallery-card:hover .gallery-overlay {
            opacity: 1;
        }

        /* Footer */
        footer {
            background: linear-gradient(135deg, #2d3748, #1a202c);
            color: #fff;
            padding: 3rem 2rem;
            text-align: center;
        }

        footer p {
            margin: 0;
            font-size: 1.1rem;
        }

        .footer-links a {
            color: #f8bbd0;
            margin: 0 1.5rem;
            font-size: 1.2rem;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: #fff;
        }

        .contact-info p {
            font-size: 1rem;
            margin: 0.5rem 0;
        }

        /* Notificación */
        .alert-success {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 2000;
            border-radius: 10px;
            background: #28a745;
            color: #fff;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            animation: slideIn 0.5s ease;
        }

        @keyframes slideIn {
            from { transform: translateX(100%); }
            to { transform: translateX(0); }
        }

        /* Responsividad */
        @media (max-width: 992px) {
            .hero-content h1 {
                font-size: 3.5rem;
            }

            .hero-content p {
                font-size: 1.25rem;
            }

            .about-section h2, .services-section h2, .gallery-section h2 {
                font-size: 2.5rem;
            }
        }

        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 2.5rem;
            }

            .hero-content p {
                font-size: 1rem;
            }

            .hero-content .btn {
                font-size: 1rem;
                padding: 0.5rem 2rem;
            }

            .gallery-card img {
                height: 200px;
            }
        }

        @media (max-width: 576px) {
            .navbar-brand {
                font-size: 1.5rem;
            }

            .logo-img {
                height: 40px;
            }

            .hero-content h1 {
                font-size: 2rem;
            }

            .services-section, .about-section, .gallery-section {
                padding: 3rem 1rem;
            }

            .footer-links a {
                display: block;
                margin: 0.5rem 0;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('inscrip.create') }}">
                <img src="{{ asset('IMG/def-.png') }}" alt="Logo Casa de la Juventud" class="logo-img">
                <span>Casa de la Juventud</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a href="{{ url('/users') }}" class="nav-link">Inicio</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link">Iniciar Sesión</a>
                            </li>
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1>Tu Espacio para Crecer</h1>
            <p>Únete a nosotros y descubre un mundo de oportunidades artísticas y culturales.</p>
            <a href="{{ route('inscrip.create') }}" class="btn">Inscríbete Ahora</a>
        </div>
    </section>

    <!-- Mensaje de éxito -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" id="success-message" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            <strong>¡Éxito!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Sección Conócenos -->
    <section class="about-section">
        <h2>¿Quiénes Somos?</h2>
        <p>Somos la instancia dedicada a empoderar a los jóvenes, ofreciendo proyectos y programas que los apoyan y capacitan para que alcancen sus sueños a través del arte y la creatividad.</p>
    </section>

    <!-- Sección Servicios -->
    <section class="services-section">
        <h2>Nuestros Servicios</h2>
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4 col-sm-6">
                    <div class="service-card">
                        <i class="bi bi-music-note-beamed"></i>
                        <h3>Danza de Salón</h3>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="service-card">
                        <i class="bi bi-mic-fill"></i>
                        <h3>Canto e Instrumentos</h3>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="service-card">
                        <i class="bi bi-people-fill"></i>
                        <h3>Danza Folklórica</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Galería -->
    <section class="gallery-section">
        <h2>Galería</h2>
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4 col-sm-6">
                    <div class="gallery-card">
                        <img src="{{ asset('IMG/pro1.jpg') }}" alt="Imagen de baile 1">
                        <div class="gallery-overlay">
                            <span>Danza en Acción</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="gallery-card">
                        <img src="{{ asset('IMG/pro3.jpg') }}" alt="Imagen de baile 2">
                        <div class="gallery-overlay">
                            <span>Expresión Cultural</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="gallery-card">
                        <img src="{{ asset('IMG/pro2.jpg') }}" alt="Imagen de baile 3">
                        <div class="gallery-overlay">
                            <span>Pasión en Movimiento</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>© 2024 Casa de la Juventud</p>
        <div class="footer-links">
            <a href="https://www.facebook.com/profile.php?id=100083972371896&mibextid=ZbWKwL" target="_blank">Facebook</a>
            <a href="https://www.instagram.com/casadelajuventud_gamc?igsh=MWp6MGg4aGdjY3g2MA==" target="_blank">Instagram</a>
            <a href="https://www.tiktok.com/@somosjuventudcochabamba?_t=8rPydPkfbpI&_r=1" target="_blank">TikTok</a>
        </div>
        <div class="contact-info">
            <p>Email: contacto@casajuventud.com</p>
            <p>Teléfono: +591</p>
            <p>Dirección: Calle 16 de Julio entre Sucre y Jordán</p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Efecto de scroll para la navbar
        window.addEventListener('scroll', () => {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Animación del mensaje de éxito
        window.onload = function() {
            var successMessage = document.getElementById('success-message');
            if (successMessage) {
                setTimeout(() => {
                    successMessage.classList.remove('show');
                    setTimeout(() => successMessage.style.display = 'none', 500);
                }, 2000);
            }
        }
    </script>
</body>
</html>