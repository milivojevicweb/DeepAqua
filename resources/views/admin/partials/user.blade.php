<ul>
    <li>{{ $item->name}}</li>
    <li>{{ $item->lastName}}</li>
    <li>{{ $item->email}}</li>
    <li>{{ $item->level}}</li>
    <li><a target="_self" rel="follow" class="edit" href={{ url("/admin/user/edit/$item->idUser") }} ><i class="fa fa-cog"></i></a></li>
    <li><button class="delete deleteUsers" data-iduser={{$item->idUser}}>x</button></li>
</ul>
