@extends('layouts.app')
@section('title', 'Home')
@section('content')
<div class="content-header">
  <div class="container-fluid">
    <h1>Bienvenido {{auth()->user()->name}}</h1>
  </div>
</div>
@endsection
