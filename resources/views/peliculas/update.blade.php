@extends('layouts.app')
@section('title', 'Pelicula Agregar')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h2 class="text-center">Agregar pelicula</h2>
            <div class="container mx-auto bg-primary-subtle mt-5">

                <form method="post" action={{ route('peliculas.update',$peliculas[0]->id) }}>
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput" class="form-label">Titulo</label>
                        <input type="text" class="form-control" id="exampleFormControlInput"  required name="titulo" value={{$peliculas[0]->titulo}}>
                    </div>
                    <div class="input-group mb-3">
                        <select class="custom-select" id="inputGroupSelect02" name="cate">
                            @foreach ($categorias as $item)

                                    @if ($item->id==$peliculas[0]->idc)
                                        <option value={{ $item->id }} selected>{{ $item->nombre }} </option>
                                    @else
                                        <option value={{ $item->id }}>{{ $item->nombre }}</option>
                                    @endif
                            @endforeach
                        </select>
                        <div class="input-group-append">
                            <label class="input-group-text" for="inputGroupSelect02">Categorias</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput" class="form-label">Año Estreno</label>
                        <input type="text" class="form-control" id="exampleFormControlInput"  required name="agno" value={{$peliculas[0]->agno}}>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput" class="form-label">precio renta</label>
                        <input type="text" class="form-control" id="exampleFormControlInput"  required name="pr" value={{$peliculas[0]->pr}}>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput" class="form-label">precio compra</label>
                        <input type="text" class="form-control" id="exampleFormControlInput"  required name="cmp" value={{$peliculas[0]->cmp}}>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput" class="form-label">cantidad disponible</label>
                        <input type="text" class="form-control" id="exampleFormControlInput"  required name="cant" value={{$peliculas[0]->cant}}>
                    </div>


                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>

    </div>
@endsection
