@extends('layouts.admin')

@section('contenido')

<h2 class="mb-4">

    Bienvenido, 👤 {{ Auth::user()->nombre }} {{ Auth::user()->apellido }}

</h2>

<div class="card">

    <div class="card-body">

        <h4>Panel de Administración</h4>

        <p>

            Desde este panel podrás administrar el sistema de la tienda.

        </p>

    </div>

</div>
@endsection