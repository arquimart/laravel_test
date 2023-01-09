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
        <h1>Usuarios</h1>
        <table class="table table-stripped" id="users">
            <thead>
                <tr>
                <th scope="col">id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Rol</th>
                <th scope="col">Cambiar Rol</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $us)
                <tr>
                <th scope="row">{{$us->id}}</th>
                <td>{{$us->name}}</td>
                <td>{{$us->email}}</td>
                <td>{{$us->role}}</td>
                <td>
                    <form action="{{route('switchRole', $us->id)}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success">
                            Cambiar Rol
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
            $('#users').DataTable({
                order:[[1, 'asc']],
            });
        });


    </script>


@endsection
