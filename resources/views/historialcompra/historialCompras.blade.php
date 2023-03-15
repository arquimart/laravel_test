@extends('layouts.app')
@section('title', 'Peliculas')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h2 class="text-center">historial comrpas</h2>

        </div>
        <table class="table table-dark table-striped mt-3">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">titulo pelicula</th>
                    <th scope="col">usuario</th>
                    <th scope="col">cantidad</th>
                    <th scope="col">precio compra</th>
                    <th scope="col">total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($compras as $item)
                    <tr>
                        <td>{{ $item->idc }}</td>
                        <td>{{ $item->titulo }}</td>
                        <td>{{ $item->usuario}}</td>
                        <td>{{ $item->cant}}</td>
                        <td>{{ $item->prec}}</td>
                        <td>{{ $item->tl}}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

@endsection
