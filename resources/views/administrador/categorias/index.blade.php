@extends('layouts.admin')

@section('contenido')
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
                🏊 Gestión de Categorías
            </h2>

        </div>

    </div>

    @if(session('success'))

    <div class="alert alert-success alert-dismissible fade show">

        {{ session('success') }}

        <button class="btn-close"
            data-bs-dismiss="alert">
        </button>

    </div>

    @endif

    {{-- Registrar categoría --}}

    <div class="card shadow-sm mb-4">

        <div class="card-header bg-primary text-white">

            Registrar Nueva Categoría

        </div>

        <div class="card-body">

            <form action="{{ route('administrador.categorias.store') }}" method="POST">

                @csrf

                <div class="row">

                    <div class="col-md-9">

                        <input
                            type="text"
                            name="nombre"
                            class="form-control"
                            placeholder="Ingrese el nombre de la categoría"
                            value="{{ old('nombre') }}">

                        @error('nombre')

                        <small class="text-danger">

                            {{ $message }}

                        </small>

                        @enderror

                    </div>

                    <div class="col-md-3">

                        <button class="btn btn-success w-100">

                            Guardar

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

    {{-- Tabla --}}

    <div class="card shadow-sm">

        <div class="card-header bg-dark text-white">

            Categorías Registradas

        </div>

        <div class="card-body">

            <table class="table table-hover table-bordered align-middle">

                <thead class="table-primary">

                    <tr>

                        <th width="80">Nª</th>

                        <th>Categoría</th>

                        <th width="220">Acciones</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($categories as $category)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>

                            <form
                                action="{{ route('administrador.categorias.update',$category->id) }}"
                                method="POST"
                                class="d-flex gap-2">

                                @csrf

                                @method('PUT')

                                <input
                                    type="text"
                                    class="form-control"
                                    name="nombre"
                                    value="{{ $category->nombre }}">

                                <button class="btn btn-warning">

                                    Editar

                                </button>

                            </form>

                        </td>

                        <td>

                            <button
                                type="button"
                                class="btn btn-danger btn-eliminar"
                                data-id="{{ $category->id }}"
                                data-nombre="{{ $category->nombre }}"
                                data-bs-toggle="modal"
                                data-bs-target="#modalEliminar">

                                Eliminar

                            </button>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="3" class="text-center">

                            No existen categorías registradas.

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

{{-- Modal Bootstrap --}}

<div class="modal fade"
    id="modalEliminar"
    tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header bg-danger text-white">

                <h5 class="modal-title">

                    Eliminar Categoría

                </h5>

                <button
                    class="btn-close btn-close-white"
                    data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                <p id="textoEliminar"></p>

            </div>

            <div class="modal-footer">

                <form id="formEliminar" method="POST">

                    @csrf

                    @method('DELETE')

                    <button class="btn btn-danger">

                        Sí, eliminar

                    </button>

                </form>

                <button
                    class="btn btn-secondary"
                    data-bs-dismiss="modal">

                    Cancelar

                </button>

            </div>

        </div>

    </div>

</div>

<script>
    document.querySelectorAll('.btn-eliminar').forEach(function(btn) {

        btn.addEventListener('click', function() {

            document.getElementById('textoEliminar').innerHTML =
                "¿Está seguro de eliminar la categoría <strong>" + this.dataset.nombre + "</strong>?";

            document.getElementById('formEliminar').action =
                "{{ url('administrador/categorias') }}/" + this.dataset.id;

        });

    });
</script>

@endsection