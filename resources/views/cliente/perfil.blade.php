@extends('layouts.cliente')

@section('contenido')

<div class="container py-4">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow">

                <div class="card-header bg-primary text-white">

                    <h4 class="mb-0">
                        👤 Mi Perfil
                    </h4>

                </div>

                <div class="card-body">

                    <div class="row mb-3">

                        <div class="col-md-6">

                            <label class="fw-bold">
                                Nombre
                            </label>

                            <div class="form-control bg-light">
                                {{ Auth::user()->nombre }}
                            </div>

                        </div>

                        <div class="col-md-6">

                            <label class="fw-bold">
                                Apellido
                            </label>

                            <div class="form-control bg-light">
                                {{ Auth::user()->apellido }}
                            </div>

                        </div>

                    </div>

                    <div class="row mb-3">

                        <div class="col-md-6">

                            <label class="fw-bold">
                                Correo electrónico
                            </label>

                            <div class="form-control bg-light">
                                {{ Auth::user()->email }}
                            </div>

                        </div>

                        <div class="col-md-6">

                            <label class="fw-bold">
                                Fecha de registro
                            </label>

                            <div class="form-control bg-light">
                                {{ Auth::user()->created_at->format('d/m/Y') }}
                            </div>

                        </div>

                    </div>

                    <hr>

                    <div class="d-flex justify-content-end gap-2">

                        <button
                            class="btn btn-warning"
                            data-bs-toggle="modal"
                            data-bs-target="#modalEditar">

                            ✏️ Modificar Cuenta

                        </button>

                        <button
                            class="btn btn-danger"
                            data-bs-toggle="modal"
                            data-bs-target="#modalEliminar">

                            🗑 Eliminar Cuenta

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
<div class="modal fade" id="modalEditar">

    <div class="modal-dialog">

        <form action="{{ route('cliente.perfil.update') }}" method="POST">

            @csrf
            @method('PUT')

            <div class="modal-content">

                <div class="modal-header bg-warning">

                    <h5>Modificar Cuenta</h5>

                    <button class="btn-close" data-bs-dismiss="modal"></button>

                </div>

                <div class="modal-body">

                    <div class="mb-3">

                        <label>Nombre</label>

                        <input
                            type="text"
                            name="nombre"
                            value="{{ Auth::user()->nombre }}"
                            class="form-control">

                    </div>

                    <div class="mb-3">

                        <label>Apellido</label>

                        <input
                            type="text"
                            name="apellido"
                            value="{{ Auth::user()->apellido }}"
                            class="form-control">

                    </div>

                </div>

                <div class="modal-footer">

                    <button class="btn btn-warning">

                        Guardar Cambios

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>
<div class="modal fade" id="modalEliminar">

    <div class="modal-dialog">

        <form action="{{ route('cliente.perfil.destroy') }}" method="POST">

            @csrf
            @method('DELETE')

            <div class="modal-content">

                <div class="modal-header bg-danger text-white">

                    <h5>Eliminar Cuenta</h5>

                    <button class="btn-close btn-close-white"
                        data-bs-dismiss="modal">
                    </button>

                </div>

                <div class="modal-body">

                    <div class="alert alert-danger">

                        <strong>¡Advertencia!</strong>

                        <br><br>

                        Esta acción eliminará permanentemente tu cuenta.

                        No podrás recuperarla.

                    </div>

                    <div class="mb-3">

                        <label>

                            Escriba su contraseña para confirmar

                        </label>

                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            required>

                    </div>

                </div>

                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">

                        Cancelar

                    </button>

                    <button class="btn btn-danger">

                        Eliminar definitivamente

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

@endsection