@extends('layouts.admin')

@section('adminCentar')
    <div class="tabcontent" id="addProduct">
    <div class="menuText form">
    <form method="POST" action="{{ url('/admin/user/insertUser') }}">
        <ul class="contactForm adminProduct marginForm">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <li><label>Ime </label> <input class="reg" id="regName" type="text" name="name" ></li>
            <li><label>Prezime </label><input class="reg" id="regLastName" type="text" name="lastName" ></li>
            <li><label>Mejl </label><input class="reg" id="regEmail" type="email" name="email" ></li>
            <li><select id="level" name="level">
                <option value="0">Izaberi...</option>
                @foreach ($level as $item)
                @component('admin.partials.userLevel',["item"=>$item])

                @endcomponent
                @endforeach
            </select></li>
            <li><label>Lozinka </label><input class="reg" id="regPassword" type="password" name="password" ></li>
            <li><label>Ponovi lozinku </label><input class="reg" id="repeatPassword" type="password" name="repeatPassword"></li>
            <li><label>Ključ </label><input id="key" class="reg" type="text" name="key"/></li>
            <li><button name='user' disabled id="insertUser" class="inputForm buttonDisable" type="submit">Potvrdi</button></li>

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
<script type="text/javascript" src="{{asset('js/adminValidation/insertUser.js')}}"></script>
@endsection('javascript')
