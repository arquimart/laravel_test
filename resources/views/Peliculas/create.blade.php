@extends('layouts.app')
@section('title', 'Crear Pelicula')
@section('content')
<div class="content-header">
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <form action="{{route('peliculasStore')}}" method="POST">
                @csrf
                <h1>Crear Pelicula</h1>
                <div class="input-group mb-4">
                    <label for="title" class="col-sm-2 col-form-label">Titulo</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Titulo" autocomplete="off" required>
                    </div>
                </div>
                <div class="input-group mb-4">
                    <label for="category" class="col-sm-2 col-form-label">Categoria</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="category" name="category" placeholder="Categoria" autocomplete="off" required>
                    </div>
                </div>
                <div class="input-group mb-4">
                    <label for="year" class="col-sm-2 col-form-label">Año</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="release_date" name="release_date" placeholder="Año" required>
                    </div>
                </div>
                <div class="input-group mb-4">
                    <label for="descripcion" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea type="text" class="form-control" id="description" name="description" placeholder="descripcion" autocomplete="off" required></textarea>
                    </div>
                </div>
                <div class="input-group mb-4">
                    <label for="poster" class="col-sm-2 col-form-label">Disponible</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="disponible" name="disponible">
                            <option value="1">Si</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div>
                <div class="input-group mb-4">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>


@endsection
