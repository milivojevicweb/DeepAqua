<ul>
    <li><img class="projectImageTable"src="{{asset('images/'.$item->path)}}" alt="{{$item->alt}}"/></li>
    <li>{{$item->name}}</li>
    <li>{{$item->price}}</li>
    <li><a target="_self" rel="follow" class="edit" href={{ url("/admin/service/edit/$item->idService") }}><i class="fa fa-cog"></i></a></li>
    <li><button class="delete deleteService" data-idService={{$item->idService}}>x</button></li>
</ul>
