@extends('layouts.app')
@section('title', 'Peliculas Admin')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h2 class="text-center">Peliculas Admin</h2>
            <a href="" class="btn btn-primary">Agregar peliculas</a>
        </div>
        <table class="table table-dark table-striped mt-3">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">nombre</th>
                    <th scope="col">correo</th>
                    <th scope="col">admin</th>
                    <th scope="col">Actualizar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($peli as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email}}</td>
                        @if ($item->admin)
                            <td>si</td>
                        @else
                            <td>no</td>
                        @endif
                        <td>
                            <form action={{route("roles.edit",$item->id)}} method="GET">
                                <input type="submit" value="Actualizar" class="btn btn-primary">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

@endsection
