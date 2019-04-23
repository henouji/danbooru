@extends('layouts.app')

@section('content')  
<div class="my-3 p-3 bg-white rounded box-shadow">
<h6 class="border-bottom border-gray pb-2 mb-0">Recent Tasks</h6>
@if (count($posts)>0)
    @foreach ($posts as $post) 
    <div class="media text-muted pt-3">
    <img src="/storage/cover_images/{{$post->cover_image}}" alt="" class="mr-2 rounded" style="width:50px">
    <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
    <strong class="d-block text-gray-dark"><a href="/posts/{{$post->id}}">{{$post->title}}</a></strong>
        {{$post->created_at}} : {{$post->user->name}}
    </p>
    <div class="btn-group" role="group">
        <a href="/posts/{{$post->id}}/accept"><button type="button" class="btn btn-primary">Accept</button></a>
    </div>
    </div>
    @endforeach                
@else
    <div class="media text-muted pt-3">
    <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        No Updates.
    </p>
    </div>
@endif        
    <small class="d-block text-right mt-3">
    <a href="#">All Tasks</a>
    </small>
</div>
{{-- {{$posts->links()}} --}}
    
@endsection