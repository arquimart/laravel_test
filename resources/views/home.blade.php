@extends('layouts.app')
@section('title', 'Home')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Bienvenido {{Auth::user()->name}}</h4>
            <p>
                Una película por definición, es toda obra audiovisual cuya misión es contar historias reales o ficticias y cuyo desarrollo se recrea a través de un trabajo de producción, montaje y postproducción, con el fin de destinar el producto final a la explotación comercial. Ahora bien, no todas las películas son iguales ni se manejan con la misma intención. Existe una gran diferencia entre lo que es una película de psicología educativa y lo que es una película de ciencia ficción. Aquí interviene lo que es el género de una película, que no es más que el tema bajo el que se desarrolla el film, y que permite clasificarlo bajo un de género específico.
            </p>
            <hr>
            <p class="mb-0">Espero que encuentres lo que buscas</p>
          </div>
    </div>

</div>

@endsection
