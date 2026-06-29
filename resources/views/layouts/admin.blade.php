<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrador</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f5f5;
        }

        .navbar-brand {
            font-weight: bold;
        }

        .contenido {
            padding: 30px;
        }
    </style>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">

        <div class="container">

            <a class="navbar-brand" href="{{ route('administrador.inicio') }}">
                Swimming Store
            </a>

            <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#menuAdmin">

                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse" id="menuAdmin">

                <ul class="navbar-nav me-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('administrador.inicio') }}">
                            Inicio
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('administrador.categorias.index') }}">
                            Gestión Categorías
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('administrador.productos.index') }}">
                            Gestión Productos
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Gestión Clientes
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Pedidos
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Ventas
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Reportes
                        </a>
                    </li>

                </ul>

                <ul class="navbar-nav">

                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle"
                            href="#"
                            role="button"
                            data-bs-toggle="dropdown">

                            👤 {{ Auth::user()->nombre }} {{ Auth::user()->apellido }}

                        </a>

                        <ul class="dropdown-menu dropdown-menu-end">

                            <li>

                                <a class="dropdown-item" href="#">
                                    Mi Perfil
                                </a>

                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>

                                <form action="{{ route('logout') }}" method="POST">

                                    @csrf

                                    <button class="dropdown-item">

                                        Cerrar Sesión

                                    </button>

                                </form>

                            </li>

                        </ul>

                    </li>

                </ul>

            </div>

        </div>

    </nav>

    <div class="contenido">

        @yield('contenido')

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html> 