<div class="container services">
    <div class="wrapper">
        <div class="homeContainer">
            <div class="containerText">
                <div><h1>{{$item->name}}</h1></div>
                {{-- <div class="line" id="line"></div> --}}
                <p>{{Str::limit($item->text,100)}}</p>
                <a target="_self" rel="follow" href={{url("/usluge/$item->idService")}}>pogledaj</a>
            </div>
            <div class="containerImg">
                <img src="{{asset('images/'.$item->path) }}" alt="{{$item->alt}}" />
            </div>
        </div>
    </div>
</div>
