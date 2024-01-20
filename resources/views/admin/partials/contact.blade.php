<ul>
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    <li><p>{{ $item->nameLastName}}</p></li>
    <li><p>{{ $item->email}}</p></li>
    <li><button data-idcontact={{$item->idContact}} class="mailTextButton">Poruka</button></li>
    <li>@if($item->status==1)<i class="fa fa-check success"></i>@else <i class="fa fa-close error"></i> @endif</li>
    <li><button class="delete deleteContact" data-idcontact={{$item->idContact}}>x</button></li>
</ul>
