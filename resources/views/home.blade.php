@extends('layouts.app')
@section('title', 'Home')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        {{Auth::user()->id}}
    </div>

</div>

@endsection
