@extends('layouts.template')

@section('title')
Kontakt
@endsection('title')


@section('page')
Kontakt
@endsection('page')

@section('ogImage')
{{asset('images/ogImage.webp')}}
@endsection('title')

@section('centar')

@include('front.partials.secondHeader')


<div id="contact">
    <div class="wrapper">
        <div id="contactContent">
            <div id="contactLeft">
                <ul>
                    <li class="contactHead">Kontaktirajte nas</li>
                    <li><a target="_blank" rel="noopener" href="tel:+381668353001"><i class="fa fa-phone"></i> +381 66 83 53 001</a></li>
                    <li><a target="_blank" rel="noopener" href="mailto:deepaquadetailing@gmail.com"><i class="fa fa-envelope"></i> deepaquadetailing@gmail.com</a></li>
                    <li id="contactSocial"><a target="_blank" rel="noopener" href="https://www.instagram.com/deep_aqua_detailing/"><i class="fa fa-instagram"></i></a> <a target="_blank" rel="noopener" href="https://www.facebook.com/profile.php?id=100070750123381"><i class="fa fa-facebook-square"></i></a> <a href="https://www.youtube.com/channel/UCkBMGN15WFm2gfVWcDJjDSw" target="_blank" rel="noopener" ><p class="socialNetworkIconText">Youtube</p><i class="fa fa-youtube-play"></i></a></li>
                </ul>
            </div>
            <div id="contactRight">
                <form method="POST" action="{{url('/kontakt')}}">
                    <ul>
                        @csrf
                        <li class="contactHead">Pošaljite poruku</li>
                        <li><label for="nameLastName">Ime i prezime </label><input type="text" id="nameLastName" name="nameLastName" /></li>
                        <li><label for="email">Mejl </label><input type="email" id="email" name="email"></li></li>
                        <li><label for="contactTextarea">Poruka </label><textarea id="contactTextarea" name="text"></textarea></li>
                        <li><button type="submit" id="sendMessage" disabled class="buttonDisable" name="sendMessage">Pošalji</button></li>
                    </ul>
                </form>

                @isset($errors)
                @foreach($errors->all() as $error)
                    <div class="messageVer2 message">
                        {{ $error }}
                    </div>
                @endforeach
                @endisset

                @if(session()->has('message'))
                    <div class="messageVer2 message">
                        {{ session('message') }}
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>

<div id="maps">
    <iframe title="Deep Aqua Google Maps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2851.981513228967!2d20.95752762957893!3d44.37196984684512!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4750cf05e33666bb%3A0x4ca38dfe9a0ad0fb!2z0IjQvtCyZSDQotC-0YDQsdC40YbQtSAyMiwg0KHQvNC10LTQtdGA0LXQstGB0LrQsCDQn9Cw0LvQsNC90LrQsA!5e0!3m2!1ssr!2srs!4v1667926340880!5m2!1ssr!2srs"  allowfullscreen="" loading="lazy"></iframe>
</div>



@endsection('centar')

@section('javascript')
@parent
    <script type="text/javascript" src="{{asset('js/contact.js')}}"></script>
@endsection('javascript')
