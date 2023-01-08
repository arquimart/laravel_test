@extends('layouts.app')
@section('title', 'Pelicula Agregar')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h2 class="text-center">Agregar pelicula</h2>
            <div class="container mx-auto bg-primary-subtle mt-5">
                <h1 class="text-center">Registro</h1>
                <form method="post" action={{route("user.store")}}>
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="exampleFormControlInput" placeholder="Nombre" required name="name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">correo</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="correo@ejemplo.com" required name="email">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">contraseña</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" required name="password">
                    </div>

                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>


@endsection
