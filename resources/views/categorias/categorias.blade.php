@extends('layouts.app')
@section('title', 'Categorias')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h2 class="text-center">Categorias</h2>
            <form class="row g-3" method="POST" action={{route("categorias.store")}}>
                @csrf
                <div class="col-auto">
                    <label for="staticEmail2" class="visually-hidden">Nombre</label>
                    <input type="text" class="form-control" id="staticEmail2" name="nombre">
                </div>
                <div class="col-auto mt-4">
                    <button type="submit" class="btn btn-primary mb-3">Agregar</button>
                </div>
            </form>
        </div>

        <table class="table table-dark table-striped mt-5">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">nombre</th>

                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cate[0] as $item)
                    <tr>
                        <td>{{ $item->id }}</td>


                                <td >
                                    <form action={{ route('categorias.update', $item->id) }} method="POST">
                                        @csrf
                                    <input type="text" value={{ $item->nombre }} name="nombre">
                                    <input type="submit" value="Actualizar" class="btn btn-primary">
                                    </form>
                                </td>




                        <td>
                            <form action={{ route('roles.edit', $item->id) }} method="GET">
                                <input type="submit" value="Eliminar" class="btn btn-danger">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>



    </div>

@endsection
