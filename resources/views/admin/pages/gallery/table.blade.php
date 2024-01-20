@extends('layouts.admin')

@section('adminCentar')

<div class="wrapper">

    <div class="masonry gallery" id="adminGallery">

        @foreach ($gallery as $item)
            @component("admin.partials.gallery",["item"=>$item])

            @endcomponent
        @endforeach


    </div>

</div>

@endsection('adminCentar')
