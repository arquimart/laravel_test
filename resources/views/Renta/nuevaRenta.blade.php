@extends('layouts.app')
@section('title', 'Rentar Pelicula')
@section('content')
<div class="content-header">
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <form action="{{route('rentasStore',$pelicula->id)}}" method="POST">
                @csrf
                <h1>Rentar Pelicula</h1>
                <div>
                    <input type="hidden" name="pelicula_id" value="{{$pelicula->id}}">
                </div>
                <div class="input-group mb-4">
                    <label for="title" class="col-sm-2 col-form-label">Titulo</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="title" name="title" value="{{$pelicula->title}}" autocomplete="off" required disabled>
                    </div>
                </div>
                <div class="input-group mb-4">
                    <label for="category" class="col-sm-2 col-form-label">Fecha de renta</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="fecha_renta" name="fecha_renta" placeholder="Fecha de renta" value="$(this).datepicker(getDate)" required>
                    </div>
                </div>
                <div class="input-group mb-4">
                    <label for="year" class="col-sm-2 col-form-label">Fecha de devolucion</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="fecha_devolucion" name="fecha_devolucion" placeholder="Fecha de devolucion" required>
                    </div>
                </div>
                <div class="input-group mb-4">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Rentar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>


@endsection
