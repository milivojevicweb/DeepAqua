@extends('layouts.template')

@section('title')
Registracija
@endsection('title')


@section('page')
Registracija
@endsection('page')

@section('ogImage')
{{asset('images/ogImage.webp')}}
@endsection('title')

@section('centar')

@include('front.partials.secondHeader')

<div class="wrapper">
    <div class="tabcontent" id="addProduct">
        <div id="registrationContainer" class="menuText form">
        <form method="POST" action="{{ url('/registracija') }}">
            <ul class="contactForm adminProduct marginForm">
                <li><h1 id="registrationHead">Registrujte se</h1></li>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <li><label for="name">Ime </label><input class="reg" id="name" type="text" name="name" ></li>
                <li><label for="lastName">Prezime </label><input class="reg" id="lastName" type="text" name="lastName" ></li>
                <li><label for="email">Mejl </label><input class="reg" id="email" type="email" name="email" ></li>
                <li><label for="password">Lozinka </label><input class="reg" id="password" type="password" name="password" ></li>
                <li><label for="repeatPassword">Ponovi lozinku </label><input class="reg" id="repeatPassword" type="password" name="repeatPassword" ></li>
                <li><label for="key">Ključ </label> <input class="reg" id="key" type="text" name="key"/></li>
                <li><button name='submit' class="inputForm buttonDisable" disabled id="submit" type="submit">SUBMIT</button></li>
            </ul>
        </form>
        @isset($errors)
        @foreach($errors->all() as $error)
            <div class="message messageVer2 messageError">
                {{ $error }}
            </div>
        @endforeach
        @endisset

        @if(session()->has('message'))
            <div class="message messageVer2">
                {{ session('message') }}
            </div>
        @endif
        </div>
    </div>
</div>


@endsection('centar')

@section('javascript')
@parent
    <script type="text/javascript" src="{{asset('js/registration.js')}}"></script>
@endsection('javascript')
