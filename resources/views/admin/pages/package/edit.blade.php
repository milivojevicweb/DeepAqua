@extends('layouts.admin')

@section('adminCentar')
<div class="tabcontent" id="addProduct">
    <div class="menuText form">
        <form method="POST" action="{{url('/admin/package/edit/updatePackage')}}" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            <ul class="contactForm adminProduct marginForm">
                <li><input type="hidden" name="id" value={{$package->idPackage}}></li>
                <li><input type="text" name="name"  id="serviceName"  value="{{$package->name}}" /></li>
                <li><input type="text" name="price"  id="servicePrice"  value="{{$package->price}}" /></li>
                <li><button name="updatePackage" id="submit" class="buttonImageAdmin inputForm"type="submit">Potvrdi</button></li>

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
    <script type="text/javascript" src="{{asset('js/adminValidation/service.js')}}"></script>
@endsection('javascript')
