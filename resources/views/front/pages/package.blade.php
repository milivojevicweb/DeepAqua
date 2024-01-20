@extends('layouts.template')

@section('title')
Paketi
@endsection('title')


@section('page')
Paketi
@endsection('page')

@section('ogImage')
{{asset('images/ogImage.webp')}}
@endsection('title')

@section('centar')

@include('front.partials.secondHeader')


<div class="wrapper">
    <div class="packContainer">

        <div class="pack">
            <div class="card-header header-basic">
                <h1>{{$bronza->name}}</h1>
            </div>
            <ul class="packList">
                <li><i class="fa fa-check-circle check"></i> Detailing felni</li>
                <li><i class="fa fa-check-circle check"></i> Detaljno pranje spoljašnosti</li>
                <li><i class="fa fa-check-circle check"></i> Detaljno čišćenje enterijera (bez dubinskog)</li>
                <li class="grayList"><i class="fa fa-times-circle"></i> Keramički premaz za kožne delove unutrašnjosti</li>
                <li class="grayList"><i class="fa fa-times-circle"></i> Detaljna priprema i dekontaminacija laka pred poliranje</li>
                <li><i class="fa fa-check-circle check"></i> Osnovno poliranje u jednom prelazu (vraćanje sjaja)</li>
                <li class="grayList"><i class="fa fa-times-circle"></i> Polimerizacija farova (3 godine zaštite)</li>
                <li><i class="fa fa-check-circle check"></i> Keramički premaz ili vosak ( do 6 meseci zaštite)</li>
                <li><i class="fa fa-check-circle check"></i> Detaljno čišćenje uvala vrata</li>
                <li class="grayList"><i class="fa fa-times-circle"></i> Detaljno čišćenje motornog prostora sa zaštitom plastika( do godinu dana)</li>
                <li class="grayList"><i class="fa fa-times-circle"></i> Dezinfekcija klime i kabine</li>
            </ul>
            <p class="packPrice">{{$bronza->price}}</p>
            <img class="packCarTypes" src="{{asset('images/carTypes.jpg')}}" alt="vrsta auta"/>
            <p class="packTime">vreme koje je potrebno: 1 radni dan</p>
        </div>

        <div class="pack">
            <div class="card-header header-standard">
                <h1>{{$silver->name}}</h1>
            </div>
            <ul class="packList">
                <li><i class="fa fa-check-circle check"></i> Detailing felni</li>
                <li><i class="fa fa-check-circle check"></i> Detaljno pranje spoljašnosti</li>
                <li><i class="fa fa-check-circle check"></i> Dubinsko pranje sa mašinskim sušenjem</li>
                <li class="grayList"><i class="fa fa-times-circle"></i> Keramički premaz za kožne delove unutrašnjosti</li>
                <li><i class="fa fa-check-circle check"></i> Detaljna priprema i dekontaminacija laka pred poliranje</li>
                <li><i class="fa fa-check-circle check"></i> Poliranje u dva prelaza (skidanje ogrebotina i vraćanje sjaja)</li>
                <li><i class="fa fa-check-circle check"></i> Poliranje farova</li>
                <li><i class="fa fa-check-circle check"></i> Keramički premaz ili vosak (do godinu dana zaštite)</li>
                <li><i class="fa fa-check-circle check"></i> Detaljno čišćenje uvala vrata</li>
                <li class="grayList"><i class="fa fa-times-circle"></i> Detaljno čišćenje motornog prostora sa zaštitom plastika( do godinu dana)</li>
                <li class="grayList"><i class="fa fa-times-circle"></i> Dezinfekcija klime i kabine</li>
            </ul>
            <p class="packPrice">{{$silver->price}}</p>
            <img class="packCarTypes" src="{{asset('images/carTypes.jpg')}}" alt="vrsta auta"/>
            <p class="packTime">vreme koje je potrebno: 1 radni dan</p>
        </div>

        <div class="pack">
            <div class="card-header header-premium">
                <h1>{{$gold->name}}</h1>
            </div>
            <ul class="packList">
                <li><i class="fa fa-check-circle check"></i> Detailing felni</li>
                <li><i class="fa fa-check-circle check"></i> Detaljno pranje spoljašnosti</li>
                <li><i class="fa fa-check-circle check"></i> Detailing unutrašnjosti i dubinsko pranje sa mašinskim sušenjem</li>
                <li><i class="fa fa-check-circle check"></i> Keramički premaz za kožne delove unutrašnjosti</li>
                <li><i class="fa fa-check-circle check"></i> Detaljna priprema i dekontaminacija laka pred poliranje</li>
                <li><i class="fa fa-check-circle check"></i> Poliranje u 4 prelaza</li>
                <li><i class="fa fa-check-circle check"></i> Polimerizacija farova (3 godine zaštite)</li>
                <li><i class="fa fa-check-circle check"></i> Keramički premaz ( do 3 godine zaštite)</li>
                <li><i class="fa fa-check-circle check"></i> Detaljno čišćenje uvala vrata</li>
                <li><i class="fa fa-check-circle check"></i> Detaljno čišćenje motornog prostora sa zaštitom plastika( do godinu dana)</li>
                <li><i class="fa fa-check-circle check"></i> Dezinfekcija klime i kabine</li>
            </ul>
            <p class="packPrice">{{$gold->price}}</p>
            <img class="packCarTypes" src="{{asset('images/carTypes.jpg')}}" alt="vrsta auta"/>
            <p class="packTime">vreme koje je potrebno: 2 radna dana</p>
        </div>
    </div>
</div>

@endsection('centar')

@section('javascript')
@parent
    <script type="text/javascript" src="{{asset('js/contact.js')}}"></script>
@endsection('javascript')
