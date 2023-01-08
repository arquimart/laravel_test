@extends('layouts.app')
@section('title', 'Roles')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h2 class="text-center">Roles</h2>
        </div>
        <table class="table table-dark table-striped">
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
                @foreach ($roles as $item)
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
