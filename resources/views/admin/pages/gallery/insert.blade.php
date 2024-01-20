@extends('layouts.admin')

@section('adminCentar')
    <div class="tabcontent" id="addProject">
        <div class="menuText form">
        <form method="POST" action="{{url('/admin/gallery/insertGallery')}}" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            <ul class="contactForm adminProduct marginForm">
                <li>
                    <input type="hidden" name="idSkriveno" />
                    <button type="button" id="imageButton" onclick="document.getElementById('profilePhoto').click()" class="dugmeFile inputForm">Dodaj sliku</button>
                    <span id="profilePhotoValue"></span>
                    <input class="prod" type="file" name="image" id="profilePhoto" style="display:none;" onchange="document.getElementById('profilePhotoValue').innerHTML=this.value;"/>
                </li>
                <li>
                    <input type="text" id="galleryName" name="name" />
                </li>

                <li><button type="submit" disabled id="submit" class="inputForm buttonDisable" name="insertGallery">Potvrdi</button></li>

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
    <script type="text/javascript" src="{{asset('js/adminValidation/gallery.js')}}"></script>
@endsection('javascript')
