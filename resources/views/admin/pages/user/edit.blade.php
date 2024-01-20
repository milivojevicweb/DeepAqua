@extends('layouts.admin')

@section('adminCentar')
<div class="tabcontent" id="addProduct">
    <div class="menuText form">
    <form method="POST" action="{{ url('/admin/user/editUser') }}">
        <ul class="contactForm adminProduct marginForm">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id" value="{{$user->idUser}}">
            <li><input class="reg" id="regName" type="text" name="name" value="{{$user->name}}" placeholder="Name"></li>
            <li><input class="reg" id="regLastName" type="text" name="lastName" value="{{$user->lastName}}" placeholder="Last name"></li>
            <li><input class="reg" id="regEmail" type="email" name="email" value="{{$user->email}}" placeholder="Email"></li>
            <li><select id="level" name="level">
                @foreach ($level as $item)
                @component('admin.partials.userLevelEditUser',["item"=>$item,"currentLevel"=>$user->idUserLevel])

                @endcomponent
                @endforeach
            </select></li>
            <li><button name='user' id="editUser" class="inputForm" type="submit">Potvrdi</button></li>

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

        </ul>
        </form>

    </div>
    </div>


@endsection

@section('javascript')
@parent
    <script type="text/javascript" src="{{asset('js/adminValidation/editUser.js')}}"></script>
@endsection('javascript')
