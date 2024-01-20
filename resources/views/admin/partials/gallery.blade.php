<div class="mItem fancybox adminGallery" href="{{asset('images/'.$item->image)}}" data-fancybox="group">
    <img src="{{asset('images/'.$item->image)}}" alt="{{$item->name}}">
    <div class="middle">
        <div class="text delete deleteGallery"  data-idgallery={{$item->idGallery}}>x</div>
    </div>
</div>
