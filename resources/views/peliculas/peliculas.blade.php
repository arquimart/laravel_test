@extends('layouts.app')
@section('title', 'Peliculas')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h2 class="text-center">Peliculas</h2>

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

                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

@endsection
