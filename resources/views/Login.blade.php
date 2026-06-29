<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class="container mt-5">

        <div class="row justify-content-center">

            <div class="col-md-4">

                <div class="card">

                    <div class="card-header">

                        <h3>Iniciar Sesión</h3>

                    </div>

                    <div class="card-body">

                        <form action="{{ route('login.store') }}" method="POST">

                            @csrf

                            <div class="mb-3">

                                <label>Correo</label>

                                <input
                                    type="email"
                                    name="email"
                                    class="form-control"
                                    required>

                            </div>

                            <div class="mb-3">

                                <label>Contraseña</label>

                                <input
                                    type="password"
                                    name="password"
                                    class="form-control"
                                    required>

                            </div>

                            @error('email')

                            <div class="alert alert-danger">

                                {{ $message }}

                            </div>

                            @enderror

                            <button class="btn btn-primary w-100">

                                Iniciar Sesión

                            </button>

                            <a href="{{ route('cliente.register.form') }}" class="btn btn-outline-secondary w-100 mt-2">
                                Registrarse
                            </a>


                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>