@extends('layouts.admin')

@section('adminCentar')
<div class="tabcontent" id="kontakt">
    <form class="form" method="POST" action="{{url('admin/contact/send')}}">
        <ul>
            @csrf
            <li><label for="subject">Naslov (subject)</label><input type="text" name="subject" id="subject"/> </li>
            <li><label for="email">Mejl</label><input type="email" id="email" name="email" /></li>
            <li><label for="summary-ckeditor">Tekst</label><div id="mailSpaceButton"></div><textarea  id="summary-ckeditor" name="summary-ckeditor"></textarea></li>
            <li><button type="submit" disabled class="buttonDisable" id="sendButton">Pošalji</button></li>
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

@endsection('adminCentar')

@section('javascript')
@parent


    <script src="{{ asset('ckeditor/build/ckeditor.js') }}"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#summary-ckeditor' ) )
            .then( newEditor => {
                editor = newEditor;
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>

<script type="text/javascript" src="{{asset('js/adminValidation/sendMail.js')}}"></script>
@endsection('javascript')
