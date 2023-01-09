@extends('layouts.app')
@section('title', 'Catalogo')
@section('content')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
@endsection
<div class="content-header">
  <div class="container-fluid">
    <div class="card">
        <div class="card-body">
        <h1>Catalogo</h1>
        <table class="table table-stripped" id="peliculas">
            <thead>
                <tr>
                <th scope="col">id</th>
                <th scope="col">Titulo</th>
                <th scope="col">Categoria</th>
                <th scope="col">Fecha de lanzamiento</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Disponible</th>
                <th scope="col">Rentar</th>
                @can('peliculasEdit')
                <th scope="col">Acciones</th>
                @endcan
                </tr>
            </thead>
            <tbody>
                @foreach ($peliculas as $pelicula)
                <tr>
                <th scope="row">{{$pelicula->id}}</th>
                <td>{{$pelicula->title}}</td>
                <td>{{$pelicula->category}}</td>
                <td>{{$pelicula->release_date}}</td>
                <td>{{$pelicula->description}}</td>
                <td allign="center">@if($pelicula->disponible)
                        &#9989;
                    @else &#10060;
                    @endif
                </td>
                <td>@if($pelicula->disponible)
                    <a href="{{route('nuevaRenta', $pelicula->id)}}" class="btn btn-primary">
                    <span class="fas fa-shopping-cart"></span>
                    </a>
                    @else
                    <p>Esta pelicula no se puede rentar <br> porque no esta disponible</p>
                    @endif
                </td>
                <td>
                    @can('peliculasEdit')
                    <a href="{{route('peliculasEdit', $pelicula->id)}}" class="btn btn-warning">
                    <span class="fas fa-pen"></span>
                    </a>
                    <form action="{{route('peliculasDestroy', $pelicula->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <span class="fas fa-trash"></span>
                        </button>
                    </form>
                    @endcan
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
    <script>

        $(document).ready(function () {
            $('#peliculas').DataTable({
                order:[[1, 'asc']],
                columnDefs: [
                {
                    targets: [0],
                    visible: false,
                    searchable: false,
                },
                {
                    targets: [4, 5,6],
                    orderable: false,
                    searchable: false,
                },
                ],
            });
        });


    </script>


@endsection
