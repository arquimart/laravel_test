@extends('layouts.app')
@section('title', 'Peliculas')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h2 class="text-center">Comprar o Alquilar</h2>
            <h3 class="text-center">{{$peli[0]->titulo}}</h3>
            <h4 class="text-center">cantidad disponible:{{$peli[0]->cantidad_disponible}}</h4>
        </div>
        <br>
        <br>
       <form action={{route('peliculas.operacionA',$peli[0]->id)}}  class="text-center" method="post">
        @csrf
        <label for="">seleccione la opcion que desee</label>
        <br>
        <input type="radio" checked name="opcion" value="re">
        <label for="">renta ${{$peli[0]->precio_renta}}</label>
        <br>
        <input type="radio" name="opcion" value="co">
        <label for="">compra ${{$peli[0]->precio_compra}}</label>
        <br>
        <input type="text" name="cantidad">
        <label for="">cantidad</label>
        <br>
        <input type="submit" class="btn btn-primary">
       </form>

    </div>
    <?php

    if(isset($exceso)){
        echo('<script>');
        echo('alert("la cantidad no valida")');
        echo('</script>');
    }


    ?>

@endsection
