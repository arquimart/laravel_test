@extends('layouts.app')
@section('title', 'Peliculas Admin')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h2 class="text-center">Peliculas Admin</h2>
            <a href={{route("peliculas.create")}} class="btn btn-primary">Agregar peliculas</a>
        </div>
        <table class="table table-dark table-striped mt-3">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">titulo</th>
                    <th scope="col">categoria</th>
                    <th scope="col">año de estreno</th>
                    <th scope="col">precio renta</th>
                    <th scope="col">precio compra</th>
                    <th scope="col">cantidad dispobible</th>
                    <th scope="col">Actualizar</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($peli as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->titulo }}</td>
                        <td>{{ $item->nombre}}</td>
                        <td>{{ $item->agno}}</td>
                        <td>{{ $item->pr}}</td>
                        <td>{{ $item->cmp}}</td>
                        <td>{{ $item->cant}}</td>
                        <td>
                            <form action={{route("peliculas.edit",$item->id)}} method="GET">
                                <input type="submit" value="Actualizar" class="btn btn-primary">
                            </form>
                        </td>
                        <td>
                            <form action={{route("peliculas.destroy",$item->id)}} method="post">
                                @csrf
                                <input type="submit" value="Eliminar" class="btn btn-danger">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

@endsection
