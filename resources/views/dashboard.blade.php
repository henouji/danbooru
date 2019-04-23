@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
                <div class="my-3 p-3 bg-white rounded box-shadow">
                <h6 class="border-bottom border-gray pb-2 mb-0">Recently Created Tasks</h6>
                @if (count($posts)>0)
                    @foreach ($posts as $post) 
                    <div class="media text-muted pt-3">
                    <img src="/storage/cover_images/{{$post->cover_image}}" alt="" class="mr-2 rounded" style="width:50px">
                    <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                    <strong class="d-block text-gray-dark"><a href="/posts/{{$post->id}}">{{$post->title}}</a></strong>
                        {{$post->created_at}}
                    <div class="btn-group" role="group">
                    <a href="/posts/{{$post->id}}/edit"><button type="button" class="btn btn-primary">Update</button></a>
                    {!! Form::open(['action'=> ['PostsController@destroy', $post->id], 'method' => 'POST', 'style' => 'text-align:right']) !!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                    {!! Form::close() !!}
                    </div>
                    </p>                    
                    </div>                    
                    @endforeach                
                    <small class="d-block text-right mt-3">
                        <a href="#">All Tasks</a>
                    </small>
                @else
                    <div class="media text-muted pt-3">
                    <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                        No Tasks Created.
                    </p>
                    </div>
                @endif        
                    
                </div>
        </div>
        <div class="col-md-6">
            <div class="my-3 p-3 bg-white rounded box-shadow">
                <h6 class="border-bottom border-gray pb-2 mb-0">Recently Accepted Tasks</h6>
                @if (count($tasks)>0)
                    @foreach ($tasks as $task) 
                    <div class="media text-muted pt-3">
                    <img src="/storage/cover_images/{{$task->post->cover_image}}" alt="" class="mr-2 rounded" style="width:50px">
                    <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                    <strong class="d-block text-gray-dark"><a href="/posts/{{$task->post->id}}">{{$task->post->title}}</a></strong>
                        Accepted @ {{$task->created_at}}
                    </p>
                    <div class="btn-group" role="group">
                        <a href="/turnin/{{$task->id}}"><button type="button" class="btn btn-primary">Turn In</button></a>
                        <a href="/dashboard/remove/{{$task->id}}"><button type="button" class="btn btn-danger">Decline</button></a>
                    </div>
                    </div>
                    @endforeach                
                    <small class="d-block text-right mt-3">
                        <a href="#">All Tasks</a>
                    </small>
                @else
                    <div class="media text-muted pt-3">
                    <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                        No Tasks Accepted.
                    </p>
                    </div>
                @endif       
            </div>
        </div>
    </div>
</div>
@endsection
