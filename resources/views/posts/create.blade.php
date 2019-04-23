@extends('layouts.app')

@section('content')
<div class="my-3 p-3 bg-white rounded box-shadow">
<h1>Post Task</h1>
{{ Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
    <div class="form-group">
    {{Form::label('title','Title')}}
    {{Form::text('title','', ['class' => 'form-control', 'placeholder' =>'Title'])}}
    </div>
    <div class="form-group">
    {{Form::label('detail','Detail')}}
    {{Form::textarea('detail','', ['id'=> 'article-ckeditor', 'class' => 'form-control', 'placeholder' =>'Task Detail'])}}
    </div>
    <div class="form-group">
    {{Form::file('cover_image')}}
    </div>
    {{Form::submit('Post', ['class' => 'btn btn-primary'])}}
{{ Form::close() }}

</div>
@endsection