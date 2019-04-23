@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-4 col-sm-4">
        <div class="my-3 p-3 bg-dark rounded box-shadow">
            <img src="/storage/cover_images/{{$post->cover_image}}" alt="" class="mr-2 rounded" style="width:100%">
        </div>
    </div>
    <div class="col-md-8 col-sm-8">
        <div class="my-3 p-3 bg-white rounded box-shadow">
        <h1>Edit Task</h1>
        {{ Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
            <div class="form-group">
            {{form::label('title','Title')}}
            {{form::text('title', $post->title, ['class' => 'form-control', 'placeholder' =>'Title'])}}
            </div>
            <div class="form-group">
            {{form::label('detail','Detail')}}
            {{form::textarea('detail', $post->detail, ['id'=> 'article-ckeditor', 'class' => 'form-control', 'placeholder' =>'Task Detail'])}}
            </div>
            <div class="form-group">
            {{Form::file('cover_image')}}
            </div>
            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit('Post', ['class' => 'btn btn-primary'])}}
        {{ Form::close() }}
        </div>
    </div>
</div>
@endsection