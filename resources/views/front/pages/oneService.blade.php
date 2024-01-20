@extends('layouts.template')

@section('title')
{{$service->name}}
@endsection('title')

@section('ogImage')
{{asset('images/'.$service->path)}}
@endsection('title')

@section('page')
Usluge
@endsection('page')


@section('centar')

@include('front.partials.secondHeader')

<div class="wrapper">
    <div id="oneProjectContainer">
        <div class="projectImage">
            <img src="{{asset('images/'.$service->path)}}" alt="{{$service->alt}}"/>
        </div>

        <div class="projectInfo">
            <ul>
                <li><h1>{{$service->name}}</h1></li>
                <li><div class="line"></div></li>
                <li><p>{{$service->text}}</p></li>
            </ul>
            <ul>
                <li id="price" >{{$service->price}}</li>
            </ul>
        </div>
    </div>
</div>

@endsection('centar')
