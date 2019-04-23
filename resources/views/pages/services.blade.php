@extends('layouts.app')

@section('content')
<div class="jumbotron">        
    <h1 class="cover-heading">Services</h1>                        
    <p >Trust me, I'm an eckspert.</p>                
    <ul>
    @if (count($services) > 0)
        @foreach ($services as $service)
        <li class="lead">{{$service}}</li>
        @endforeach   
    @endif 
</div>
@endsection