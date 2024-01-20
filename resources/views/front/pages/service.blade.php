@extends('layouts.template')

@section('title')
Usluge
@endsection('title')


@section('page')
Usluge
@endsection('page')

@section('ogImage')
{{asset('images/ogImage.webp')}}
@endsection('title')

@section('centar')

@include('front.partials.secondHeader')


    <div id="mainservice">
        @foreach ($service as $item)
        @component("front.partials.service",["item"=>$item])

        @endcomponent
    @endforeach
    </div>



    <div id="pagination">
        <ul class="pagination">
            @for($i=1;$i<=ceil($service->total()/6);$i++)
            <li><a target="_self" rel="follow" @if($i==1) class="activePagination pag "@else class="pag" @endif href="page={{$i}}">{{$i}}</a></li>
            @endfor
        </ul>
    </div>
    <input type="hidden" name="page" id="hidden_page" value="1" />
    <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="idProducts" />


@endsection('centar')

@section('javascript')
@parent
    <script type="text/javascript" src="{{asset('js/service.js')}}"></script>
@endsection('javascript')
