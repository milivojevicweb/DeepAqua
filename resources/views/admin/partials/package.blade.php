<ul>
    <li>{{$item->name}}</li>
    <li>{{$item->price}}</li>
    <li><a target="_self" rel="follow" class="edit" href={{ url("/admin/package/edit/$item->idPackage") }}><i class="fa fa-cog"></i></a></li>
</ul>
