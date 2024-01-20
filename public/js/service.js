$(document).ready(function() {


    $(document).on("click",".pag", function(event){
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        $('#hidden_page').val(page);
        fetch_data(page);
        window.scrollTo({ top: 0});
       });



});


function fetch_data(page){

    $.ajax({
        url:"/usluge/fetch_data?page="+page,
        dataType:"JSON",
        success:function(data){
            printService(data);
            printPagination(data);
        },error:ajaxError
    })
}

function printPagination(data){
    var page=$('#hidden_page').val();
    pagIspis="";
    for(var i=1;i<=Math.ceil(data.total/6);i++){
        if(page==i){
            pagIspis+=`<li><a class="pag activePagination"  href="page=${i}">${i}</a></li>`;
        }else{
            pagIspis+=`<li><a class="pag"  href="page=${i}">${i}</a></li>`;
        }
    }

    $(".pagination").html(pagIspis);
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

function printService(data){
    let html = "";
    for(let item of data.data){
        html += `
        <div class="container services">
            <div class="wrapper">
                <div class="homeContainer">
                    <div class="containerText">
                        <div><h1>${item.name}</h1></div>
                        <p>${limit(item.text)}</p>
                        <a target="_self" rel="follow" href="/usluge/${item.idService}">pogledaj</a>
                    </div>
                    <div class="containerImg">
                        <img src="/images/${item.path}" alt="${item.alt}" />
                    </div>
                </div>
            </div>
        </div>
        `
    }
    $("#mainservice").html(html);
}

function limit(element)
{
    html="";
    var max_chars = 100;

    if(element.length > max_chars) {
        html = element.substr(0, max_chars)+"...";
    }else{
        html=element;
    }

    return html;
}
