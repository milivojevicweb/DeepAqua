@extends('layouts.template')

@section('title')
Detailing
@endsection('title')

@section('ogImage')
{{asset('images/ogImage.webp')}}
@endsection('title')


@section('centar')

    <div id="slider">
        <div class="wrapper">
            <div id="sliderContent">
                <div id="sliderText">
                    <h1>Deep aqua detailing</h1>
                    <p>Dubinsko pranje automobila-nameštaja, poliranje vozila, polimerizacija farova, keramička zaštita, premium spoljno pranje, detailing enterijera, detailing felni, pranje motora, mašinsko sušenje.</p>
                    <a target="_self" rel="follow" href="{{url('/usluge')}}">Usluge</a>
                    <a class="noBackgroundButton" target="_blank" rel="noopener" href="https://bazzar.rs/store/impression">Proizvodi</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="wrapper">
            <div class="homeContainer">
                <div class="containerText">
                    <div><h1>O nama</h1></div>
                    <div class="line" id="line"></div>
                    <p>Deep Aqua detailing je garaža koja se sa velikom brigom i pažnjom odnosi prema Vašem automobilu i gde se misli o svakom detalju! Usluge su na profesionalnom nivou kako bi saradnja bila na obostrano zadovoljstvo, odnosno kako bi Vi bili zadovoljni uslugom i širili priču dalje.</p>
                </div>
                <div class="containerImg">
                    <img src="{{asset('images/carDetailing.webp')}}" alt="car detailing" />
                </div>
            </div>
        </div>
    </div>

    <div class="container2">
        <div class="wrapper">
            <div id="container2Content">
                <div class="containerImg">
                    <img src="{{asset('images/sundjerAuto.webp')}}" alt="usluge pranje auto" />
                </div>
                <div class="containerText">
                    <div><h1>Usluge</h1></div>
                    <div class="line" id="line2"></div>
                    <p>Usluge koje pružamo su na veoma visokom nivou. Trudimo se da vozilo bude perfektno kako bi naši korisnici bili maksimalno zadovoljni i ponovo uživali u vožnji automobila.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="wrapper">
            <div class="homeContainer">
                <div class="containerText">
                    <div><h1>Proizvodi</h1></div>
                    <div class="line" id="line"></div>
                    <p>Profesionalne usluge zahtevaju i profesionalne tečnosti sa kojima dobijamo visok kvalitet. Sve tečnosti koje koristimo možete pronaći na sajtu Bazzar, kako bi ste i Vi u svojoj garaži postali profesionalni ditejleri.</p>
                </div>
                <div class="containerImg">
                    <img src="{{asset('images/proizvodi.webp')}}" alt="proizvodi detailing dubinsko pranje" />
                </div>
            </div>
        </div>
    </div>

    <div class="container2 ytContainer2">
        <div class="wrapper">
            <div id="youtubeContainer">
                <div class="containerText">
                    <div><h1>Youtube video</h1></div>
                    <div class="line" id="line"></div>
                </div>

                <div id="youtubeVideo">
                    <iframe class="youtube" src="https://www.youtube.com/embed/OolqaE_Gz-M" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <iframe class="youtube" src="https://www.youtube.com/embed/bvd7jP17HhQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>

    <div id="userProduct">
        <div class="wrapper">
            <div id="userProductContainer">
                <p>Preko 300 zadovoljnjih korisnika</p>
                <p>Preko 400 očišćenih automobila</p>
            </div>
        </div>
    </div>



@endsection('centar')
