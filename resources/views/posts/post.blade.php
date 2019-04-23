@extends('layouts.app')

@section('content')


<div class="row">
    <div class="col-md-4 col-sm-4">
        <div class="my-3 p-3 bg-white rounded box-shadow">
        <img src="/storage/cover_images/{{$post->cover_image}}" alt="" class="mr-2 rounded" style="width:100%">
        </div>
    </div>
    <div class="col-md-8 col-sm-8">
        <div class="my-3 p-3 bg-white rounded box-shadow">
            <div class="row">
                <div class="col">
                <a href="/posts"><button type="button" class="btn btn-dark">Back</button></a>
                </div>
                @if (!Auth::guest())
                    @if (Auth::user()->id == $post->user_id)
                    <div class="col">
                        {!! Form::open(['action'=> ['PostsController@destroy', $post->id], 'method' => 'POST', 'style' => 'text-align:right']) !!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                        {!! Form::close() !!}
                    </div>
                    @endif
                @endif
            </div>  
            @if ($post)
            <h1 style="text-align:center">
                {{$post->title}}
            </h1>
            <h2 class="border-bottom border-gray pb-2 mb-5" style="text-align:center">Npc {{$post->user->name}}</h2>
            <h3>{!! $post->detail !!}</h3>
            <hr>
            <div class="container">
                <div class="row">
                    @if (!Auth::guest())
                        @if (Auth::user()->id == $post->user_id)
                        <div class="col">
                            <a href="/posts/{{$post->id}}/edit"><button type="button" class="btn btn-dark">Edit</button></a>
                        </div>
                        @endif
                    @endif
                    <div class="col" style="text-align:end">
                        <small>{{$post->created_at}}</small>
                    </div>
                </div>
            </div>
            @else
            <div class="well">
                <h3 class="lead">Task Not Found.</h3>
            </div>
            @endif
        </div>             
    </div>
</div>
@endsection