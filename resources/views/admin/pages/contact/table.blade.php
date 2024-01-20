@extends('layouts.admin')

@section('adminCentar')
<div class="tabcontent" id="kontakt">

    <div class="adminContainer">
        <ul class="adminHead">
            <li>Ime</li>
            <li>Mejl</li>
            <li>Tekst</li>
            <li>Status</li>
            <li>Obriši</li>
        </ul>

        <div class="adminContent" id="contactAdminTable">
            @foreach ( $contact as $item )
                @component('admin.partials.contact',["item"=>$item])
                @endcomponent
            @endforeach
        </div>

        <div id="contactMessageBox" class="messageBox">

            <div class="messageBoxContent">
                    <ul>
                        <li><button class="closeMessageBox" type="button">&times;</button></li>
                        <li><span>Poruka:</span></li>
                        <li><div class="messageText"></div></li>
                        <li>Primljena: <p id="messageDate"></p></li>
                        <li>Poslata: <p id="messageDateSend"></p></li>
                        <li><span>Odgovori na poruku: </span></li>
                        <li>
                            <form class="form" >
                                <textarea  id="summary-ckeditor" name="summary-ckeditor"></textarea>
                                <div id="messageStatus"></div>
                                <div id="mailSpaceButton"></div>
                                <button id="answerMessage" type="button">pošalji</button>
                            </form>
                        </li>
                    </ul>
                    <input type="hidden" id="contactMail"/>
                    <input type="hidden" id="idcontact" />
            </div>

        </div>

        <div id="deleteModal" class="messageBox">

            <div class="messageBoxContent messageDeleteBox">
                    <ul>
                        <li><button class="closeMessageBox closeDelete" type="button">&times;</button></li>
                        <li class="deleteBoxHeader">Da li želite da obrišete?</li>
                        <li class="deleteBothButtons"><button type="button" class="deleteButton deleteButtonContact">Da</button><button type="button" class="noDeleteButton">Ne</button></li>
                        <input type="hidden" id="idDelete" />
                    </ul>
            </div>

        </div>

    </div>

    <div id="pagination">
        <ul class="pagination">
            @for($i=1;$i<=ceil($contact->total()/6);$i++)
            <li><a target="_self" rel="follow" @if($i==1) class="activePaginationAdmin activePagination pagContact"@else class="pagContact" @endif href="page={{$i}}">{{$i}}</a></li>
            @endfor
        </ul>
    </div>


    <input type="hidden" name="page" id="hidden_page" value="1" />
    <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="idProducts" />
</div>
@endsection

@section('javascript')
@parent
    <script src="{{ asset('ckeditor/build/ckeditor.js') }}"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#summary-ckeditor' ) )
            .then( newEditor => {
                editor = newEditor;
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection('javascript')



