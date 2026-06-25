<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Categorías</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            background: #f4f7fc;
            padding: 40px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, .1);
            margin-bottom: 25px;
        }

        h1 {
            color: #0d6efd;
            margin-bottom: 20px;
        }

        h2 {
            margin-bottom: 15px;
            color: #333;
        }

        .success {
            background: #d1e7dd;
            color: #0f5132;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .form-group {
            display: flex;
            gap: 10px;
        }

        input[type="text"] {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            outline: none;
        }

        input[type="text"]:focus {
            border-color: #0d6efd;
        }

        .btn {
            border: none;
            padding: 10px 18px;
            border-radius: 8px;
            cursor: pointer;
            color: white;
            font-weight: bold;
        }

        .btn-save {
            background: #198754;
        }

        .btn-edit {
            background: #0d6efd;
        }

        .btn-delete {
            background: #dc3545;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table thead {
            background: #0d6efd;
            color: white;
        }

        table th,
        table td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        table tbody tr:hover {
            background: #f8f9fa;
        }

        .actions {
            display: flex;
            gap: 10px;
        }

        .edit-form {
            display: flex;
            gap: 10px;
        }

        .success {
            background: #d1e7dd;
            color: #0f5132;
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            border-left: 5px solid #198754;
            transition: opacity .8s ease;
        }

        .modal {
            display: none;
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, .55);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background: white;
            width: 420px;
            padding: 30px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0, 0, 0, .25);
        }

        .modal-content h2 {
            margin-bottom: 15px;
        }

        .modal-content p {
            margin-bottom: 25px;
            font-size: 17px;
        }

        .modal-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
        }
    </style>
</head>

<body>

    <div class="container">

        <h1>🏊 Gestión de Categorías</h1>

        @if(session('success'))
        <div id="mensajeExito" class="success">
            {{ session('success') }}
        </div>
        @endif

        <div class="card">
            <h2>Registrar Nueva Categoría</h2>

            <form action="{{ route('categories.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <input
                        type="text"
                        name="nombre"
                        placeholder="Ingrese Nombre Categoria"
                        value="{{ old('nombre') }}"
                        required>

                    @error('nombre')
                    <div style="color:red; margin-top:5px;">
                        {{ $message }}
                    </div>
                    @enderror

                    <button class="btn btn-save" type="submit">
                        Guardar
                    </button>
                </div>
            </form>

        </div>

        <div class="card">
            <h2>Listado de Categorías</h2>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Categoría</th>
                        <th width="300">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>

                        <td>
                            <form
                                action="{{ route('categories.update',$category->id) }}"
                                method="POST"
                                class="edit-form">

                                @csrf
                                @method('PUT')

                                <input
                                    type="text"
                                    name="nombre"
                                    value="{{ $category->nombre }}">

                                <button
                                    class="btn btn-edit"
                                    type="submit">
                                    Editar
                                </button>
                            </form>
                        </td>

                        <td>
                            <div class="actions">
                                <form
                                    action="{{ route('categories.destroy',$category->id) }}"
                                    method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="button"
                                        class="btn btn-delete"
                                        onclick="abrirModal('{{ $category->nombre }}', this.form)">
                                        Eliminar
                                    </button>

                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3">
                            No existen categorías registradas.
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

    </div>
    <div id="modalEliminar" class="modal">

        <div class="modal-content">

            <h2>Eliminar Categoría</h2>

            <p id="textoEliminar"></p>

            <div class="modal-buttons">

                <button class="btn btn-save"
                    onclick="confirmarEliminar()">
                    Sí
                </button>

                <button class="btn btn-delete"
                    onclick="cerrarModal()">
                    No
                </button>

            </div>

        </div>

    </div>
    <script>
        const mensaje = document.getElementById('mensajeExito');

        if (mensaje) {
            setTimeout(() => {
                mensaje.style.opacity = "0";

                setTimeout(() => {
                    mensaje.style.display = "none";
                }, 800);

            }, 5000); // 10 segundos
        }
        let formularioEliminar = null;

        function abrirModal(nombre, formulario) {

            formularioEliminar = formulario;

            document.getElementById("textoEliminar").innerHTML =
                "¿Está seguro de eliminar la categoría <strong>" +
                nombre +
                "</strong>?";

            document.getElementById("modalEliminar").style.display = "flex";
        }

        function cerrarModal() {

            document.getElementById("modalEliminar").style.display = "none";

            formularioEliminar = null;
        }

        function confirmarEliminar() {

            if (formularioEliminar) {
                formularioEliminar.submit();
            }

        }
    </script>

</body>

</html>