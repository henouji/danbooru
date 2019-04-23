@extends('layouts.app')

@section('content')

<div class="my-3 p-3 bg-white rounded box-shadow" style="text-align:center">
    <h1 class="cover-heading">{{$title}}</h1>
    <p class="lead" >Danbooru! A Guild Board!</p>
    <p class="lead">
        <a href="/register" class="btn btn-lg btn-secondary">Register</a>
    </p>
</div>
@endsection