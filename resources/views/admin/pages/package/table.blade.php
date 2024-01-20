@extends('layouts.admin')

@section('adminCentar')
<div class="tabcontent" id="Products">

    <div class="adminContainer">
        <ul class="adminHead">
            <li>Naziv</li>
            <li>Cena</li>
            <li>Edit</li>
        </ul>

        <div class="adminContent" id="contactAdminTable">
            @foreach($package as $item)
            @component("admin.partials.package",["item"=>$item])
                @endcomponent
            @endforeach
        </div>


</div>
@endsection

