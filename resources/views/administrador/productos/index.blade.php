@extends('layouts.admin')

@section('contenido')

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show">
    {{ session('success') }}
    <button class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show">
    {{ session('error') }}
    <button class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<div class="container-fluid">

    <div class="row mb-4">
        <div class="col">
            <h2 class="fw-bold text-primary">
                📦 Gestión de Productos
            </h2>
        </div>
    </div>

    {{-- FORMULARIO --}}
    <div class="card shadow-sm mb-4">

        <div class="card-header bg-primary text-white">
            Registrar Nuevo Producto
        </div>

        <div class="card-body">

            <form action="{{ route('administrador.productos.store') }}" method="POST">
                @csrf

                <div class="row g-3">

                    <div class="col-md-4">
                        <label>Nombre</label>
                        <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" required>
                    </div>

                    <div class="col-md-4">
                        <label>Categoría</label>
                        <select name="categories_id" class="form-control" required>
                            <option value="">Seleccione</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->nombre }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label>Precio</label>
                        <input type="number" step="0.01" name="precio" class="form-control" required>
                    </div>

                    <div class="col-md-2">
                        <label>Stock</label>
                        <input type="number" name="stock" class="form-control" required>
                    </div>

                    <div class="col-md-12">
                        <label>Descripción</label>
                        <textarea name="descripcion" class="form-control"></textarea>
                    </div>

                    <div class="col-md-12">
                        <button class="btn btn-success w-100">
                            Guardar Producto
                        </button>
                    </div>

                </div>

            </form>

        </div>
    </div>
    {{-- Editar Producto --}}

    <div class="card shadow-sm mb-4" id="editarProducto" style="display:none;">

        <div class="card-header bg-warning">

            <strong>Editar Producto</strong>

        </div>

        <div class="card-body">

            <form id="formEditar" method="POST">

                @csrf
                @method('PUT')

                <div class="row">

                    <div class="col-md-3">
                        <label>Nombre</label>
                        <input
                            type="text"
                            id="edit_nombre"
                            name="nombre"
                            class="form-control">
                    </div>

                    <div class="col-md-3">
                        <label>Categoría</label>

                        <select
                            id="edit_categoria"
                            name="categories_id"
                            class="form-select">

                            @foreach($categories as $category)

                            <option value="{{ $category->id }}">
                                {{ $category->nombre }}
                            </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-2">
                        <label>Precio</label>
                        <input
                            type="number"
                            step="0.01"
                            id="edit_precio"
                            name="precio"
                            class="form-control">
                    </div>
                    <div class="col-md-2">
                        <label>Stock</label>
                        <input
                            type="number"
                            id="edit_stock"
                            name="stock"
                            class="form-control">
                    </div>
                    <div class="col-12 mt-3">

                        <label class="form-label">
                            Descripción
                        </label>

                        <textarea
                            id="edit_descripcion"
                            name="descripcion"
                            class="form-control"
                            rows="4"
                            placeholder="Ingrese la descripción del producto"></textarea>

                    </div>

                    <div class="col-12 mt-3">

                        <div class="d-flex justify-content-end gap-2">

                            <button type="submit" class="btn btn-warning px-4">
                                💾 Guardar Cambios
                            </button>

                            <button
                                type="button"
                                class="btn btn-secondary px-4"
                                onclick="cancelarEdicion()">

                                Cancelar

                            </button>

                        </div>

                    </div>

                </div>

            </form>

        </div>

    </div>
    {{-- TABLA --}}
    <div class="card shadow-sm">

        <div class="card-header bg-dark text-white">
            Productos Registrados
        </div>

        <div class="card-body">

            <table class="table table-hover table-bordered align-middle">

                <thead class="table-primary">
                    <tr>
                        <th>#</th>
                        <th>Producto</th>
                        <th>Categoría</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Estado</th>
                        <th width="250">Acciones</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($products as $product)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $product->nombre }}</td>

                        <td>
                            {{ $product->category->nombre ?? 'Sin categoría' }}
                        </td>

                        <td>{{ $product->precio }}</td>

                        <td>{{ $product->stock }}</td>

                        <td>
                            @if($product->estado)
                            <span class="badge bg-success">Activo</span>
                            @else
                            <span class="badge bg-secondary">Inactivo</span>
                            @endif
                        </td>

                        <td class="d-flex gap-2">

                            {{-- EDITAR --}}
                            <button
                                type="button"
                                class="btn btn-warning btn-sm btn-editar"
                                data-id="{{ $product->id }}"
                                data-nombre="{{ $product->nombre }}"
                                data-categoria="{{ $product->categories_id }}"
                                data-precio="{{ $product->precio }}"
                                data-stock="{{ $product->stock }}"
                                data-descripcion="{{ $product->descripcion }}">


                                Editar

                            </button>

                            {{-- DESACTIVAR --}}
                            <form action="{{ route('administrador.productos.toggle', $product->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-info btn-sm">
                                    Estado
                                </button>
                            </form>

                            {{-- ELIMINAR --}}
                            <form action="{{ route('administrador.productos.destroy', $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm">
                                    Eliminar
                                </button>
                            </form>

                        </td>

                    </tr>

                    @empty
                    <tr>
                        <td colspan="7" class="text-center">
                            No hay productos registrados
                        </td>
                    </tr>
                    @endforelse

                </tbody>

            </table>

        </div>
    </div>

</div>
<script>
    document.querySelectorAll('.btn-editar').forEach(function(btn) {

        btn.addEventListener('click', function() {

            document.getElementById("editarProducto").style.display = "block";

            document.getElementById("edit_nombre").value = this.dataset.nombre;
            document.getElementById("edit_categoria").value = this.dataset.categoria;
            document.getElementById("edit_precio").value = this.dataset.precio;
            document.getElementById("edit_stock").value = this.dataset.stock;
            document.getElementById("edit_descripcion").value = this.dataset.descripcion;

            document.getElementById("formEditar").action =
                "{{ url('administrador/productos') }}/" + this.dataset.id;

            window.scrollTo({
                top: document.getElementById("editarProducto").offsetTop - 80,
                behavior: "smooth"
            });

        });

    });

    function cancelarEdicion() {
        document.getElementById("editarProducto").style.display = "none";
    }
</script>
@endsection