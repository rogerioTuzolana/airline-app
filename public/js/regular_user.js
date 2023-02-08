$("#cat1").on('click',function(event) {
    
    const option= document.getElementById('intern');
    const option2= document.getElementById('loca');
    option.style.display = 'none';
    option2.style.display = 'block';

    $("#category").val("local")

    $("#orige").prop("required", true);
    $("#destiny").prop("required", true);

    $("#optionInter1").prop("required", false);
    $("#optionInter2").prop("required", false);
});

$("#cat2").on('click',function(event) {
    
    const option= document.getElementById('intern');
    const option2= document.getElementById('loca');
        
    option.style.display = 'block';
    option2.style.display = 'none';
    $("#category").val("inter")

    $("#orige").prop("required", false);
    $("#destiny").prop("required", false);

    $("#optionInter1").prop("required", true);
    $("#optionInter2").prop("required", true);

});

$(document).ready(function () {
    /*$("#cat1").prop("checked", true);
    

    if($("#cat1").is(':checked') && $("#cat1").val()=='option1'){
        const option= document.getElementById('intern');
        const option2= document.getElementById('loca');
        option.style.display = 'none';
        option2.style.display = 'block';

        $("#orige").prop("required", true);
        $("#destiny").prop("required", true);

        $("#optionInter1").prop("required", false);
        $("#optionInter2").prop("required", false);

        $("#category").val("local")
        
    }else{
        const option= document.getElementById('intern');
        const option2= document.getElementById('loca');
        
        option.style.display = 'block';
        option2.style.display = 'none';

        $("#orige").prop("required", false);
        $("#destiny").prop("required", false);

        $("#optionInter1").prop("required", true);
        $("#optionInter2").prop("required", true);

        $("#category").val("inter") 
    }*/

    $("#route1").prop("checked", true);
    if($("#route1").is(':checked') && $("#route1").val()=='go'){
        const div= document.getElementById('div-date-return');
        div.style.display = 'none';

        $("#n_ticket_return").prop("required", false);
        let date = "#date-val"+$("#date").val()
        
        $("#date2").html($(date).attr("data-date"))
    }else{
        const div2= document.getElementById('div-date-return');
        div2.style.display = 'block';
        $("#date_return2").html($("#date_return").html())
        $("#n_ticket_return").prop("required", true);

        let date = "#date_return-val"+$("#date_return").val()
        
        $("#date_return2").html($(date).attr("data-date_return"))
        
    }

    $('.ticket_quantity').mask("###", {reverse: true});
    $('.money').mask("###", {reverse: true});
});

let countries;
// Agentes que criam contas para utilizadores
fetch("https://restcountries.com/v2/all")
.then(function (res) {
    return res.json()
})
.then(function (data) {
    //console.log(data)
    countryData(data)
})
.catch(function (err) {
    console.log('Error: '+err)
})

function countryData(data) {
    countries = data;
    let options ="";
    for (let i = 0; i < countries.length; i++) {
        options = options+'<option value="'+countries[i].alpha2Code+'">'+countries[i].name+'</option>';   
    }
    document.getElementById('optionInter1').innerHTML = options;
    document.getElementById('optionInter2').innerHTML = options;
    //document.getElementById('optionInter').innerHTML = options;
}

function dateData(data) {
    
    date = data;

    var select = document.getElementById('date');
    var newOption;
    while (select.childNodes.length>=1) {
        select.removeChild(select.firstChild);
    }

    let options ="";
    for (let i = 0; i < date.length; i++) {
        newOption = document.createElement('option');
        newOption.value = date[i].id;
        newOption.text = date[i].date+' '+date[i].time+' - '+date[i].name;
        select.appendChild(newOption)
        //options = options+'<option value="'+date[i].id+'">'+date[i].date+' '+date[i].time+' - '+date[i].name+'</option>';   
    }
    console.log(newOption);
    //document.getElementById('date').innerHTML = options;
}

function dateData2(data) {
    date = data;
    let options ="";
    for (let i = 0; i < date.length; i++) {
        options = options+'<option value="'+date[i].id+'">'+date[i].date+' '+date[i].time+' - '+date[i].name+'</option>';   
    }
    
    document.getElementById('date_return').innerHTML = options;
}

$(".chooseDate").on('change',function(event) {
    //event.preventDefault();
    let orige=''
    let destiny=''
    
    let category = $("#category").val()
    if (category =='inter') {
        orige = $("#optionInter1").val();
        destiny = $("#optionInter2").val();

        if ($(this).attr('data-per') == 'orig') {
            orige = $(this).val();
            destiny = $("#optionInter2").val();
        }else{
            orige = $("#optionInter1").val();
            destiny = $(this).val();
        }

    }else{
        if ($(this).attr('data-per') == 'orig') {
            orige = $(this).val();
            destiny = $("#destiny").val();
        }else{
            orige = $("#orige").val();
            destiny = $(this).val();
        }
        
        
    }

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url : "/cliente/data-voo",
        type : 'GET',
        data : {
            
            orige: orige,
            destiny: destiny,
        },
        dataType: 'json',
        async: false,
    })
    .done(function(msg){

        let data = msg.data;
        console.log(data);
        //if (data.length > 0) {
            //dateData(data)
        //}
        //$("#result").html(data);
        //setTimeout(window.location.reload(), 10000);
    })
    .fail(function(msg){

        let data = JSON.parse(msg.responseText);
        console.log(data.message);
    });
});

$("#date").on('change',function () {
    let date = "#date-val"+$(this).val()
    $("#date2").html($(date).attr("data-date"))
    
})

$("#date_return").on('change',function () {
    let date = "#date-val"+$(this).val()
    $("#date_return2").html($(date).attr("data-date_return"))
    
})

$("#route1").on('click',function(event) {
    const div2= document.getElementById('div-date-return');
    div2.style.display = 'none';
    $("#n_ticket_return").prop("required", false);

    let date = "#date-val"+$("#date").val()
    $("#date2").html($(date).attr("data-date"))
    $("#date_return2").html("--")
})

$("#route2").on('click',function(event) {
    
    const div2= document.getElementById('div-date-return');
    div2.style.display = 'block';
    $("#n_ticket_return").prop("required", true);

    let date = "#date_return-val"+$("#date_return").val()
    $("#date_return2").html($(date).attr("data-date_return"))
    //event.preventDefault();
    /*let orige=''
    let destiny=''
    
    let category = $("#category").val()
    if (category =='inter') {
        orige = $("#optionInter1").val();
        destiny = $("#optionInter2").val();

        if ($(this).attr('data-per') == 'orig') {
            orige = $("#optionInter1").val();
            destiny = $("#optionInter2").val();
        }else{
            orige = $("#optionInter1").val();
            destiny = $("#optionInter2").val();
        }

    }else{
        if ($(this).attr('data-per') == 'orig') {
            orige = $("#orige").val();
            destiny = $("#destiny").val();
        }else{
            orige = $("#orige").val();
            destiny = $("#destiny").val();
        }
    
    }

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url : "/cliente/data-voo",
        type : 'GET',
        data : {
            
            orige: destiny,
            destiny: orige,
        },
        dataType: 'json',
        async: false,
    })
    .done(function(msg){

        let data = msg.data;
        console.log(data);
        //dateData2(data)
        
    })
    .fail(function(msg){

        let data = JSON.parse(msg.responseText);
        console.log(data.message);
    });*/
});

$("#btn-addAirline").on('click',function() {
    $('form[name="formAddAirline"]').submit(function (event) {
        event.preventDefault();
        let orige=''
        let destiny=''

        let name = $(this).find("input#name").val();
        let category = $(this).find("select#category").val();
        if (category =='inter') {
            orige = $(this).find("select#optionInter1").val();
            destiny = $(this).find("select#optionInter2").val();
        }else{
            orige = $(this).find("select#orige").val();
            destiny = $(this).find("select#destiny").val();
        }
        
        let date = $(this).find("input#date").val();
        //let date_return = $(this).find("input#date_return").val();
        let time = $(this).find("input#time").val();
        let fleet_id = $(this).find("select#fleet_id").val();


        let result = document.getElementById("resultBox");   
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : "/cliente/voo",
            type : 'POST',
            data : {
                name: name,
                category: category,
                orige: orige,
                destiny: destiny,
                date: date,
                //date_return: date_return,
                time: time,
                fleet_id: fleet_id,
            },
            dataType: 'json',
            async: false,
        })
        .done(function(msg){
  
            $('#resultBox').removeClass('alert-danger');
            $('#resultBox').addClass('alert-success');
            result.style.display = "block";
            
            //
            let message = msg.message;
            $("#result").html(message);
            setTimeout(window.location.reload(), 10000);
            //$('form[name="formAddFleet"]').reset();
        })
        .fail(function(msg){
            $('#resultBox').removeClass('bg-success');
            $('#resultBox').addClass('bg-danger');
            result.style.display = "block";
            //
            let data = JSON.parse(msg.responseText);
            $("#result").html(data.message);
        });

    }) 
});

function chooseDateReturn() {
    $(".chooseDateReturn").on('change',function(event) {
        event.preventDefault();
        const orige=''
        const destiny=''
        
        let category = $("#category").val()
        if (category =='inter') {
            orige = $("#optionInter1").val();
            destiny = $("#optionInter2").val();
    
            if ($(this).attr('data-per') == 'orig') {
                orige = $(this).val();
                destiny = $("#optionInter2").val();
            }else{
                orige = $("#optionInter1").val();
                destiny = $(this).val();
            }
    
        }else{
            if ($(this).attr('data-per') == 'orig') {
                orige = $(this).val();
                destiny = $("#destiny").val();
            }else{
                orige = $("#orige").val();
                destiny = $(this).val();
            }
            
            
        }
    
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : "/cliente/data-voo",
            type : 'GET',
            data : {
                
                orige: destiny,
                destiny: orige,
            },
            dataType: 'json',
            async: false,
        })
        .done(function(msg){
    
            let data = msg.data;
            console.log(data);
            //dateData(data)

            //$("#result").html(data);
            //setTimeout(window.location.reload(), 10000);
        })
        .fail(function(msg){
    
            let data = JSON.parse(msg.responseText);
            console.log(data.message);
        });
    });
}
/**/

$("#btn-addAirline").on('click',function() {
    $('form[name="formAddAirline"]').submit(function (event) {
        event.preventDefault();
        let orige=''
        let destiny=''

        let name = $(this).find("input#name").val();
        let category = $(this).find("select#category").val();
        if (category =='inter') {
            orige = $(this).find("select#optionInter1").val();
            destiny = $(this).find("select#optionInter2").val();
        }else{
            orige = $(this).find("select#orige").val();
            destiny = $(this).find("select#destiny").val();
        }
        
        let date = $(this).find("input#date").val();
        //let date_return = $(this).find("input#date_return").val();
        let time = $(this).find("input#time").val();
        let fleet_id = $(this).find("select#fleet_id").val();


        let result = document.getElementById("resultBox");   
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : "/cliente/voo",
            type : 'POST',
            data : {
                name: name,
                category: category,
                orige: orige,
                destiny: destiny,
                date: date,
                //date_return: date_return,
                time: time,
                fleet_id: fleet_id,
            },
            dataType: 'json',
            async: false,
        })
        .done(function(msg){
  
            $('#resultBox').removeClass('alert-danger');
            $('#resultBox').addClass('alert-success');
            result.style.display = "block";
            
            //
            let message = msg.message;
            $("#result").html(message);
            setTimeout(window.location.reload(), 10000);
            //$('form[name="formAddFleet"]').reset();
        })
        .fail(function(msg){
            $('#resultBox').removeClass('bg-success');
            $('#resultBox').addClass('bg-danger');
            result.style.display = "block";
            //
            let data = JSON.parse(msg.responseText);
            $("#result").html(data.message);
        });

    }) 
});
