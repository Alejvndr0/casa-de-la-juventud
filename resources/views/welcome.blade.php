<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CASA DE LA JUVENTUD</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        /* Estilo para el encabezado con un fondo atractivo */
        header {
            background: linear-gradient(to right, #6a1b9a, #8e24aa);
            color: white;
            padding: 60px 0;
        }

        header h1 {
            font-size: 3.5rem;
            font-weight: bold;
        }

        header p {
            font-size: 1.2rem;
        }

        /* Barra de navegación con color plomo */
        .navbar {
            background-color: #607d8b; /* Color plomo */
        }

        .navbar .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: white;
        }

        .navbar-nav .nav-item .btn {
            background-color: #f8bbd0;
            color: #607d8b; /* Texto color plomo */
            border-radius: 25px;
        }

        .navbar-nav .nav-item .btn:hover {
            background-color: #455a64; /* Gris más oscuro al pasar el ratón */
            color: white;
        }

        /* Sección "Conócenos" */
        .conocenos {
            background-color: #f3e5f5;
            padding: 40px 0;
            border-radius: 8px;
        }

        .conocenos h2 {
            font-size: 2.5rem;
            color: #607d8b; /* Color plomo */
            font-weight: bold;
        }

        /* Estilo para los íconos de los estilos de baile */
        .styles-list .list-group-item {
            background-color: #f8bbd0;
            border: none;
            font-size: 1.2rem;
            text-align: center;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .styles-list .list-group-item:hover {
            background-color: #ec407a;
            color: white;
        }

        /* Estilos para la galería de imágenes */
        .img-gallery {
            height: 250px;
            object-fit: cover;
            border-radius: 8px;
        }

        .gallery-section h2 {
            font-size: 2.5rem;
            color: #8e24aa;
            font-weight: bold;
            margin-bottom: 30px;
        }

        /* Pie de página */
        footer {
            background-color: #607d8b; /* Color plomo */
            color: white;
            padding: 30px 0;
            text-align: center;
        }

        footer .footer-links {
            margin-top: 20px;
            font-size: 1.1rem;
        }

        footer .footer-links a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
        }

        footer .footer-links a:hover {
            color: #f8bbd0; /* Color al pasar el ratón */
        }

        footer .contact-info {
            margin-top: 20px;
            font-size: 1.2rem;
        }

        footer .contact-info p {
            margin: 5px 0;
        }

  /* Estilos de la imagen */
/* Estilos de la imagen */
.institution-image {
    width: 100%;
    height: auto;
    object-fit: cover;
    display: block; /* Asegura que la imagen ocupe todo el ancho del contenedor */
}

/* Capa superpuesta para darle opacidad */
.position-relative {
    position: relative;
}

.image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(82, 1, 149, 0.218); /* Color con opacidad */
    display: flex;
    justify-content: center;
    align-items: center;
    color: white;
    padding: 20px; /* Asegura que el texto no se pegue a los bordes */
    text-align: center; /* Centra el texto horizontalmente */
}

.image-title {
    font-size: 5vw; /* Utiliza un tamaño de fuente relativo a la anchura de la ventana */
    font-weight: bold;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6); /* Sombra para mejorar la legibilidad */
    margin: 0;
    line-height: 1.2; /* Ajusta el espacio entre líneas */
}

/* Asegurarse de que el texto sea responsivo en pantallas más pequeñas */
@media (max-width: 768px) {
    .image-title {
        font-size: 8vw; /* Tamaño de fuente más grande en pantallas pequeñas */
    }

    .image-overlay {
        padding: 10px; /* Menos espacio en pantallas más pequeñas */
    }
}

@media (max-width: 480px) {
    .image-title {
        font-size: 10vw; /* Aumentar el tamaño del texto aún más en pantallas muy pequeñas */
    }
}

/* Estilo para el logo */
.logo-img {
    height: 45px; /* Ajusta el tamaño del logo según prefieras */
    width: auto;  /* Mantén el aspecto proporcional */
}

    </style>

</head>

<body>
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <!-- Reemplazamos el texto por el logo -->
            <a class="navbar-brand" href="{{ route('inscrip.create') }}">
                <img src="{{ asset('img/def-.png') }}" alt="Logo Casa de la Juventud" class="logo-img">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a href="{{ url('/users') }}" class="nav-link text-white">INICIO</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link text-white">INICIAR SESIÓN</a>
                            </li>
                        @endauth
                      
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    
    

  
<section class="container-fluid p-0 position-relative">
    <img src="{{ asset('img/juve3.png') }}" alt="Imagen de la Institución" class="institution-image">
    <div class="image-overlay">
        <h1 class="image-title">CASA DE LA JUVENTUD</h1>
    </div>
</section>
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" id="success-message" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i> <!-- Ícono de éxito -->
        <strong>¡Éxito!</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<script>
    window.onload = function() {
        var successMessage = document.getElementById('success-message');
        if (successMessage) {
            setTimeout(function() {
                successMessage.style.display = 'none';
            }, 2000); // El mensaje desaparecerá después de 2 segundos
        }
    }
</script>



    <!-- Encabezado -->
    <header class="text-center">
        <p>Promoviendo la pasión por el arte</p>
        <a href="{{ route('inscrip.create') }}" class="btn btn-light btn-lg">INSCRIBITE AHORA</a>
    </header>

    <!-- Sección "Conócenos" -->
    <section class="container conocenos my-5">
        <h2 class="text-center mb-4">CONÓCENOS</h2>
        <p class="text-center">
            Somos lainstancia encargada de trabajar con los jovenes y para los jovenes, generando proyectos y programas enfocados a apoyarlos y capacitarlos con el proposito que cumplan sus sueños.
        </p>
    </section>

    <!-- Sección de Estilos de Baile -->
    <section class="container my-5">
        <h2 class="text-center mb-4">NUESTROS SERVICIOS</h2>
        <div class="row justify-content-center styles-list">
            <div class="col-md-4">
                <ul class="list-group">
                    <li class="list-group-item">Danza de Salón</li>
                    <li class="list-group-item">Canto e instrumentos</li>
                    <li class="list-group-item">Danza folklorica</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Galería de imágenes -->
    <section class="container gallery-section my-5">
        <h2 class="text-center">GALERÍA</h2>
        <div class="row">
            <div class="col-md-4 mb-3">
                <img src="{{ asset('IMG/pro1.jpg') }}" class="img-fluid img-gallery" alt="Imagen de baile 1">
            </div>
            <div class="col-md-4 mb-3">
                <img src="{{ asset('IMG/pro3.jpg') }}" class="img-fluid img-gallery" alt="Imagen de baile 2">
            </div>
            <div class="col-md-4 mb-3">
                <img src="{{ asset('IMG/pro2.jpg') }}" class="img-fluid img-gallery" alt="Imagen de baile 3">
            </div>
        </div>
    </section>

    <!-- Pie de página -->
    <footer>
        <p>&copy; 2024 CASA DE LA JUVENTUD</p>
        <div class="footer-links">
            <a href="https://www.facebook.com/profile.php?id=100083972371896&mibextid=ZbWKwL" target="_blank">Facebook</a>
            <a href="https://www.instagram.com/casadelajuventud_gamc?igsh=MWp6MGg4aGdjY3g2MA==" target="_blank">Instagram</a>
            <a href="https://www.tiktok.com/@somosjuventudcochabamba?_t=8rPydPkfbpI&_r=1" target="_blank">TikTok</a>
        </div>
        <div class="contact-info">
            <p>Email: contacto@casajuventud.com</p>
            <p>Teléfono: +591</p>
            <p>Dirección: Calle 16 de julio entre sucre y jordan</p>
        </div>
    </footer>



</body>

</html>
