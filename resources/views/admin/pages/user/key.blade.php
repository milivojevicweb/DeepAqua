@extends('layouts.admin')

@section('adminCentar')
<div class="tabcontent" id="addProduct">
    <div class="menuText form">
        <form method="POST" action="{{url('/admin/user/updateKey')}}">
            @csrf
            <ul>
                <li><input id="key" type="text" name="key" value="{{ $key->registrationKey }}"/></li>
                @isset($errors)
                @foreach($errors->all() as $error)
                <li><div class="message messageVer2 messageError">
                    {{ $error }}
                </div></li>
                @endforeach
                @endisset

                @if(session()->has('message'))
                    <li><div class="message messageVer2">
                        {{ session('message') }}
                    </div></li>

                @endif
                <li><button id="insertKey" type="submit">Potvrdi</button></li>
            </ul>
        </form>

    </div>
</div>


@endsection('adminCentar')

@section('javascript')
@parent
<script type="text/javascript" src="{{asset('js/adminValidation/key.js')}}"></script>
@endsection('javascript')
