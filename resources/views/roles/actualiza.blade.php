@extends('layouts.app')
@section('title', 'Roles Actaulizar')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h2 class="text-center">Actualizar Rol</h2>
        </div>
        <div class="container mx-auto  mt-5">

            <form method="post" action={{route("roles.update",$roles[0]->id)}}>
                @csrf

                <fieldset disabled>

                <div class="mb-3">
                    <label for="exampleFormControlInput" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="exampleFormControlInput" placeholder={{$roles[0]->name}} required name="name">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">correo</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder={{$roles[0]->email}} required name="email">
                </div>

                </fieldset>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" {{($roles[0]->admin)?"checked":""}} name="check">
                    <label class="form-check-label" for="exampleCheck1" >Check me out</label>
                  </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </div>

@endsection
