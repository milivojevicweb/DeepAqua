@extends('layouts.template')

@section('title')
Galerija
@endsection('title')

@section('headlink')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css">
@endsection('headlink')

@section('page')
Galerija
@endsection('page')

@section('ogImage')
{{asset('images/ogImage.webp')}}
@endsection('title')

@section('centar')

@include('front.partials.secondHeader')


<div class="wrapper">

    <div class="masonry gallery">

        @foreach ($gallery as $item)
            @component("front.partials.gallery",["item"=>$item])

            @endcomponent
        @endforeach


    </div>

</div>

@endsection('centar')

@section('javascript')
@parent
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <script type="text/javascript" src="{{asset('js/gallery.js')}}"></script>
@endsection('javascript')
