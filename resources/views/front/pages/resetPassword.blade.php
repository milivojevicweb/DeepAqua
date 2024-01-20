@extends('layouts.template')

@section('title')
Obnovi lozinku
@endsection('title')


@section('page')
Obnovi lozinku
@endsection('page')

@section('ogImage')
{{asset('images/ogImage.webp')}}
@endsection('title')


@section('centar')

@include('front.partials.secondHeader')

<div class="wrapper">

    <div class="formContainer">
        <form class="form" method="POST" action="{{url('/obnavljanjeLozinke')}}">
            <ul>
            @csrf
            <input type="hidden" name="token" value='<?= $_GET['token']?>' />
            <input type="hidden" name="email" value='<?= $_GET['email']?>' />
            <li><label for="passwordReset">Lozinka</label><input id="passwordReset" class="reset" type="password"  name="password" ></li>
            <li><label for="passwordResetRepeat">Ponovi lozinku</label><input id="passwordResetRepeat" class="reset" type="password"  name="rePassword"/></li>
            <li><button type="submit" id="resetPasswordButton" disabled  class="buttonDisable" name="submitPassword">Pošalji</button></li>
            </ul>
        </form>
    </div>
    @isset($errors)
    @foreach($errors->all() as $error)
        <div class="message">
            {{ $error }}
        </div>
    @endforeach
    @endisset

    @if(session()->has('message'))
        <div class="message">
            {{ session('message') }}
        </div>
    @endif
</div>



@endsection('centar')

@section('javascript')
@parent
    <script type="text/javascript" src="{{asset('js/resetPassword.js')}}"></script>
@endsection('javascript')
