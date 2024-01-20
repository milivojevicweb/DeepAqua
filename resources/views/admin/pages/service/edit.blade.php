@extends('layouts.admin')

@section('adminCentar')
<div class="tabcontent" id="addProduct">
    <div class="menuText form">
        <form method="POST" action="{{url('/admin/service/edit/updateService')}}" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            <ul class="contactForm adminProduct marginForm">
            <li><img id="productImageEdt"src="{{asset('images/'.$service->path)}}" alt="{{$service->alt}}"/></li>
            <li>
                <p class="imgSize">Preporučena veličina slike: 600x400</p>
            </li>
            <li>
                    <input type="hidden" name="idSkriveno" />
                    <button class="buttonImageAdmin inputForm" type="button" onclick="document.getElementById('profilePhotoEdit').click()" class="dugmeFile">Ažuriraj sliku</button>
                    <span id="profilePhotoValue"></span>
                    <input class="prod" type="file" name="image" id="profilePhotoEdit"  style="display:none;" onchange="document.getElementById('profilePhotoValue').innerHTML=this.value;"/>
                </li>
                <li><input type="hidden" name="id" value={{$service->idService}}></li>
                <li><input type="text" name="name"  id="serviceName"  value="{{$service->name}}" /></li>
                <li><textarea id="serviceText" name="text">{{$service->text}}</textarea></li>
                <li><input type="text" name="price"  id="servicePrice"  value="{{$service->price}}" /></li>
                <li><button name="editService" id="submit" class="buttonImageAdmin inputForm"type="submit">Potvrdi</button></li>

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
