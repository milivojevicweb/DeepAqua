@if($item->idUserLevel==$currentLevel)
    <option selected value={{$item->idUserLevel }}>{{$item->name }}</option>
@else
    <option value={{$item->idUserLevel }}>{{$item->name }}</option>
@endif
