@extends('layouts.app')
@section('title', 'Rentas')
@section('content')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
@endsection
<div class="content-header">
  <div class="container-fluid">
    <div class="card">
        <div class="card-body">
        <h1>Rentas</h1>
        <table class="table table-stripped" id="rentas">
            <thead>
                <tr>
                <th scope="col">id</th>
                <th scope="col">Pelicula</th>
                <th scope="col">Fecha de renta</th>
                <th scope="col">Fecha de devolucion</th>
                <th scope="col">Email de usuario</th>
                <th scope="col">Estado de devolucion</th>
                <th scope="col">Devolver</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rentas as $rent)
                <tr>
                <th scope="row">{{$rent->id}}</th>
                <td>{{$rent->pelicula}}</td>
                <td>{{$rent->fecha_renta}}</td>
                <td>{{$rent->fecha_devolucion}}</td>
                <td>{{auth()->user()->email}}</td>
                <td allign="center">@if($rent->devuelto)
                        &#9989;
                    @else &#10060;
                    @endif
                <td>
                    <form action="{{route('rentasDevolver', $rent->id)}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success">
                            Devolver
                        </button>
                    </form>
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
            $('#rentas').DataTable({
                order:[[1, 'asc']],
                columnDefs: [
                {
                    targets: [0],
                    visible: false,
                    searchable: false,
                },

                ],
            });
        });


    </script>
@endsection
