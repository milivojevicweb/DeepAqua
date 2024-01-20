$(document).ready(function() {
    togleElementsForOrdes();

    $(document).on("click",".pagContact", function(event){
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        $('#hidden_page').val(page);
        fetch_data_contact(page);
        window.scrollTo({ top: 0});
       });

       $(document).on("click",".pagService", function(event){
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        $('#hidden_page').val(page);
        fetch_data_service(page);
        window.scrollTo({ top: 0});
       });

       $(document).on("click",".pagUser", function(event){
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        $('#hidden_page').val(page);
        fetch_data_user(page);
        window.scrollTo({ top: 0});
       });

    $(document).on("click",".deleteButtonContact",deleteContact);
    $(document).on("click",".noDeleteButton",closeModalDelete);

    $(document).on("click",".deleteButtonService",deleteService);
    $(document).on("click",".deleteButtonUser",deleteUser);

    $(document).on("click",".deleteGallery",deleteGallery);

    $(document).on("click",".mailTextButton",modalMailText);
    $(document).on("click",".closeMessageBox",closeModalMailText);

    $(document).on("click",".deleteContact",modalDeleteContact);
    $(document).on("click",".deleteUsers",modalDeleteUser);
    $(document).on("click",".deleteService",modalDeleteService);

    $(document).on("click",".closeDelete",closeModalDelete);

    $(document).on("click",".mailTextButton",contactText);

    $(document).on("click",".mailTextButton",changeMessageParam);

    $(document).on("click","#answerMessage",sendAnswerMail);

});

function togleElementsForOrdes(){
    $(".buttonAdminContact").hide();
    $("#kontaktButton").click(function(){
        $(".buttonAdminContact").toggle("1000");
    });

    $(".buttonAdminProject").hide();
    $("#ProjectButton").click(function(){
        $(".buttonAdminProject").toggle("1000");
    });

    $(".buttonAdminUser").hide();
    $("#UserButton").click(function(){
        $(".buttonAdminUser").toggle("1000");
    });

    $(".buttonAdminGallery").hide();
    $("#GalleryButton").click(function(){
        $(".buttonAdminGallery").toggle("1000");
    });


    $(".buttonAdminPackage").hide();
    $("#PackageButton").click(function(){
        $(".buttonAdminPackage").toggle("1000");
    });

}


function fetch_data_contact(page)
{
 $.ajax({
  url:"/admin/contact/fetch_data?page="+page,
  dataType:"json",
  success:function(data)
  {
        var pagClass="pagContact";
        printContact(data);
        printPagination(data,pagClass);

  }
 })
}

function fetch_data_service(page){
    $.ajax({
        url:"/admin/service/fetch_data?page="+page,
        dataType:"JSON",
        success:function(data){

            var pagClass="pagService";
            printService(data);
            printPagination(data,pagClass);
        }
    })
}


function fetch_data_user(page){
    $.ajax({
        url:"/admin/user/fetch_data?page="+page,
        dataType:"JSON",
        success:function(data){
            var pagClass="pagUser";
            printUser(data);
            printPagination(data,pagClass);
        },
        error:ajaxError
    })
}


function deleteContact(){
    var id=$("#idDelete").val();
        if(id!=""){
            let token=$('meta[name="csrf-token"]').attr('content')
            $.ajax({
                url:"/admin/contact/deleteContact",
                method:"POST",
                data:{
                    _token:token,
                    id:id
                },
                success:function(){
                    refreshContact();
                    closeModalDelete();
                },error:ajaxError
            })
    }
}


function deleteService(){
    var id=$("#idDelete").val();
        if(id!=""){
            let token=$('meta[name="csrf-token"]').attr('content')
            $.ajax({
                url:"/admin/service/deleteService",
                method:"POST",
                data:{
                    _token:token,
                    id:id
                },
                success:function(){
                    refreshService();
                    closeModalDelete();
                },error:ajaxError
            })
        }

}

function deleteGallery(){
    var id=$(this).data('idgallery');
        if(id!=""){
            let token=$('meta[name="csrf-token"]').attr('content')
            $.ajax({
                url:"/admin/gallery/deleteGallery",
                method:"POST",
                data:{
                    _token:token,
                    id:id
                },
                success:function(){
                    refreshGallery();
                },error:ajaxError
            })
        }

}

function deleteUser(){
    var id=$("#idDelete").val();
        if(id!=""){
            let token=$('meta[name="csrf-token"]').attr('content')
            $.ajax({
                url:"/admin/user/deleteUser",
                method:"POST",
                data:{
                    _token:token,
                    id:id
                },
                success:function(){
                    refreshUser();
                    closeModalDelete();
                },error:ajaxError
            })
        }
}


function refreshContact(){
    var page=$('#hidden_page').val();
    $.ajax({
        url:"/admin/contact/getContact",
        method:"GET",
        success:function(data){
            fetch_data_contact(page);
            //printContact(data);
            printPagination(data);

        },error:ajaxError
    })
}

function refreshService(){
    var page=$('#hidden_page').val();
    $.ajax({
        url:"/admin/service/getService",
        method:"GET",
        success:function(data){
            fetch_data_service(page);
            printPagination(data);

        },error:ajaxError
    })
}

function refreshGallery(){
    $.ajax({
        url:"/admin/gallery/getGallery",
        method:"GET",
        success:function(data){
            printGallery(data);

        },error:ajaxError
    })
}

function refreshUser(){
    var page=$('#hidden_page').val();
    $.ajax({
        url:"/admin/user/getUser",
        method:"GET",
        success:function(data){
            fetch_data_user(page);
            printPagination(data);

        },error:ajaxError
    })
}

function printContact(data){
    let html = "";
    for(let item of data.data){
        html += `
        <ul>
            <li><p>${item.nameLastName}</p></li>
            <li><p>${item.email}</p></li>
            <li><button data-idcontact=${item.idContact} class="mailTextButton">Poruka</button></li>
            <li>`
            if(item.status==1){
                html+=`<i class="fa fa-check success"></i>`;
              }else{
                html+=`<i class="fa fa-close error" ></i>`;
              }
              html+=`</li>
            <li><button class="delete deleteContact" data-idcontact=${item.idContact}>x</button></li>
        </ul>
        `
    }
    $("#contactAdminTable").html(html);
}

function printService(data){
    let html = "";
    for(let item of data.data){
        html += `
        <ul>
            <li><img class="serviceImageTable"src="/images/${item.path}" alt="${item.alt}"/></li>
            <li>${item.name}</li>
            <li>${item.price}</li>
            <li><a class="edit" href="/admin/service/edit/${item.idService}"><i class="fa fa-cog"></i></a></li>
            <li><button class="delete deleteService" data-idservice=${item.idService}>x</button></li>
        </ul>
        `
    }
    $("#serviceAdminTable").html(html);
}

function printGallery(data){
    let html = "";
    for(let item of data){
        html += `
        <div class="mItem fancybox adminGallery" href="/images/${item.image}" data-fancybox="group">
        <img src="/images/${item.image}" alt="${item.name}">
        <div class="middle">
            <div class="text delete deleteGallery"  data-idgallery=${item.idGallery}>x</div>
        </div>
        </div>
    `
    }
    $("#adminGallery").html(html);
}

function printUser(data){
    let html = "";
    for(let item of data.data){
        html += `
        <ul>
            <li>${item.name}</li>
            <li>${item.lastName}</li>
            <li>${item.email}</li>
            <li>${item.level}</li>
            <li><a class="edit" href="/admin/user/edit/${item.idUser}"><i class="fa fa-cog"></i></a></li>
            <li><button class="delete deleteUsers" data-idusers=${item.idUser}>x</button></li>
        </ul>`;

    }
    $("#userAdminTable").html(html);
}


function ajaxError(greska, status, statusText){
    console.error('GRESKA AJAX: ');
    console.log(status);
    console.log(statusText);
    if(greska.status == 500){
        console.log(greska.parseJSON);
        alert(greska.parseJSON.poruka);
    }
    else if(greska.status == 400){
        alert('Niste poslali ispravno parametre!')
    }
}

function printPagination(data,pagClass){
    var page=$('#hidden_page').val();
    pagIspis="";
    for(var i=1;i<=Math.ceil(data.total/6);i++){
        if(page==i){
            pagIspis+=`<li><a class=" ${pagClass} activePagination activePaginationAdmin"  href="page=${i}">${i}</a></li>`;
        }else{
            pagIspis+=`<li><a class=" ${pagClass}"  href="page=${i}">${i}</a></li>`;
        }
    }

    $(".pagination").html(pagIspis);
}

function modalMailText(){
    $('#contactMessageBox').show();
}

function closeModalMailText(){
    $('#contactMessageBox').hide();
}

function modalDeleteContact(){
    var id=$(this).data('idcontact');
    $("#idDelete").val(id);
    $('#deleteModal').show();
}

function modalDeleteService(){
    var id=$(this).data('idservice');
    $("#idDelete").val(id);
    $('#deleteModal').show();
}


function modalDeleteUser(){
    var id=$(this).data('iduser');
    $("#idDelete").val(id);
    $('#deleteModal').show();
}


function closeModalDelete(){
    $('#deleteModal').hide();
}

function contactText(){
    var id=$(this).data('idcontact');
    let token=$('meta[name="csrf-token"]').attr('content')
    $.ajax({
        url:"/admin/contact/getContactText/"+id,
        method:"POST",
        dataType:"JSON",
        data:{
            _token:token
        }
        ,success:function(data){
            printContactText(data);
            printContactDate(data)
        },error:ajaxError
    })
}

function printContactText(data){
    var html="";

    html=`<p>${data.text}</p>`;

    $(".messageText").html(html);
}

function printContactDate(data){
    var html="";

    html=data.date;
    html2=data.datesend;

    $("#messageDate").html(html);
    $("#messageDateSend").html(html2);
}

function changeMessageParam(){
    var id=$(this).data('idcontact');
    $("#idcontact").val(id);

    printEmailInHidden(id);
}

function printEmailInHidden(id){
    let token=$('meta[name="csrf-token"]').attr('content')
    $.ajax({
        url:"/admin/contact/getContactText/"+id,
        method:"POST",
        dataType:"JSON",
        data:{
            _token:token
        }
        ,success:function(data){
            $("#contactMail").val(data.email);
        },error:ajaxError
    })
}

function sendAnswerMail(){
    var text=editor.getData();
    if(text!=""){
        let token=$('meta[name="csrf-token"]').attr('content')
        var email=$("#contactMail").val();
        var id=$("#idcontact").val();
        var page=$('#hidden_page').val();

        $.ajax({
            url:"/admin/contact/sendAnswer",
            method:"POST",
            data:{
                _token:token,
                email:email,
                text:text,
                id:id
            }
            ,success:function(data){
                $("#contactMail").val(data.email);
                $("#messageStatus").html("<div class='message messageVer2 messageSuccess' >Poslato!</div>");
                fetch_data_contact(page);
            },error:ajaxError
        })
    }else{
        $("#messageStatus").html("<div class='message messageVer2 messageError' >Greška!</div>");
    }
}
