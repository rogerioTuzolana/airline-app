

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
        $("#date_return").prop("required", false);
        
        let date = "#date-val"+$("#date").val()
        $("#date2").html($(date).attr("data-date"))

    }else{
        const div2= document.getElementById('div-date-return');
        div2.style.display = 'block';

        $("#date_return2").html($("#date_return").html())
        $("#n_ticket_return").prop("required", true);
        $("#date_return").prop("required", true);

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
    let options ="";
    for (let i = 0; i < date.length; i++) {
        options = options+'<option value="'+date[i].id+'">'+date[i].date+' '+date[i].time+' - '+date[i].name+'</option>';   
    }
    document.getElementById('date').innerHTML = options;
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
        url : "/membro/data-voo",
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
        //dateData(data)

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
    $("#date_return").prop("required", false);

    let date = "#date-val"+$("#date").val()
    $("#date2").html($(date).attr("data-date"))
    $("#date_return2").html("--")
})

/*$("#route1").on('click',function(event) {
    const div2= document.getElementById('div-date-return');
    div2.style.display = 'none';
    $("#n_ticket_return").prop("required", false);
})*/

$("#route2").on('click',function(event) {
    const div2= document.getElementById('div-date-return');
    div2.style.display = 'block';
    $("#n_ticket_return").prop("required", true);
    $("#date_return").prop("required", true);

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
        url : "/membro/data-voo",
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
            url : "/admin/voo",
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
            url : "/membro/data-voo",
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
            url : "/admin/voo",
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


$("#btn-addFleet").on('click',function() {
    $('form[name="formAddFleet"]').submit(function (event) {
        event.preventDefault();
        //alert('Sim')
        //return
        let brand = $(this).find("input#brand").val();
        let model = $(this).find("input#model").val();
        let capacity = $(this).find("input#capacity").val();
        let fleet_id = $(this).find("input#fleet_id").val();


        let result = document.getElementById("resultBox");   
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : "/admin/frota",
            type : 'POST',
            data : {
                brand: brand,
                model: model,
                capacity: capacity,
                fleet_id: fleet_id
            },
            dataType: 'json',
            async: false,
        })
        .done(function(msg){
            /*$("#brand").val("");
            $("#model").val("");
            $("#capacity").val("");*/

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

$("#btn-addPerk").on('click',function() {
    $('form[name="formAddPerk"]').submit(function (event) {
        event.preventDefault();
        //alert('Sim')
        //return
        let name = $(this).find("input#name").val();
        let description = $(this).find("textarea#description").val();
        let perk_id = $(this).find("input#perk_id").val();


        let result = document.getElementById("resultBox");   
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : "/admin/regalia",
            type : 'POST',
            data : {
                name: name,
                description: description,
                perk_id: perk_id
            },
            dataType: 'json',
            async: false,
        })
        .done(function(msg){
            /*$("#name").val("");
            $("#description").val("");*/

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

$('#btn-dropPerk').on('click', function () {
    $('form[name="formDropPerk"]').submit(function (event) {
        event.preventDefault();
        let perk_id = $("#drop_perk_id").val();
        let result = document.getElementById("resultBoxV");
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : "/admin/eliminar-regalia",
            type : 'DELETE',
            data : {
                perk_id: perk_id, 
            },
            dataType: 'json',
            async: false,
        })
        .done(function(msg){
            window.location.reload();
        })
        .fail(function(msg){
            //console.log("Falhou");
            $('#resultBoxV').removeClass('alert-success');
            $('#resultBoxV').addClass('alert-danger');
            result.style.display = "block";
            //
            let data = JSON.parse(msg.responseText);
            $("#resultV").html(data.message);
        });
    })
})

$(".checkTariffAir").on('change',function() {
    
    if ($(this).is(':checked')) {
       var status = 1
    }else{
        var status = 0
    }
    
    const tariff_id = $(this).attr('data-tariff')
    const airline_id = $(this).attr('data-airline')
    const tariff_airline_id = $(this).attr("data-tariff_air")

    //alert(perk_tariff_id);return
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url : "/admin/ativar-tarifa-voo",
        type : 'POST',
        data: {
            tariff_id: tariff_id,
            airline_id: airline_id,
            status: status,
            tariff_airline_id: tariff_airline_id,
        },
        dataType: 'json',
        async: false,
        /*beforeSend : function(){
            $("#result").html("Carregando...");
        }*/
    })
    .done(function(msg){  
        window.location.reload();
        //alert('Yes')
    })
    .fail(function(msg){
        
        /*let data = JSON.parse(msg.responseText);
        $("#resultUserPlan").html(data.message);
        $('#exampleModalUserPlan').modal('show')*/
        /*var modal = document.getElementById('exampleModalUserPlan')
        let modalBox = new bootstrap.Modal(modal);
        modalBox.show();*/
    });

});

$(".checkPerk").on('change',function() {
    
    if ($(this).is(':checked')) {
       var status = 1
    }else{
        var status = 0
    }
    
    const tariff_id = $(this).attr('data-tariff')
    const perk_id = $(this).attr('data-perk')
    let perk_tariff_id = $(this).attr("data-perk_tariff")

    //alert(perk_tariff_id);return
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url : "/admin/ativar-regalia",
        type : 'POST',
        data: {
            tariff_id: tariff_id,
            perk_id: perk_id,
            status: status,
            perk_tariff_id: perk_tariff_id,
        },
        dataType: 'json',
        async: false,
        /*beforeSend : function(){
            $("#result").html("Carregando...");
        }*/
    })
    .done(function(msg){  
        window.location.reload();
        //alert('Yes')
    })
    .fail(function(msg){
        
        /*let data = JSON.parse(msg.responseText);
        $("#resultUserPlan").html(data.message);
        $('#exampleModalUserPlan').modal('show')*/
        /*var modal = document.getElementById('exampleModalUserPlan')
        let modalBox = new bootstrap.Modal(modal);
        modalBox.show();*/
    });

});


$("#btn-addPerkTariff").on('click',function() {
    $('form[name="formAddPerkTariff"]').submit(function (event) {
        event.preventDefault();
        //alert('Sim')
        //return
        let amount = $(this).find("input#amount").val();
        let description = $(this).find("textarea#description").val();
        let perk_tariff_id = $(this).find("input#perk_tariff_id").val();


        let result = document.getElementById("resultBox");   
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : "/admin/regalia-tarifa",
            type : 'POST',
            data : {
                amount: amount,
                description: description,
                perk_tariff_id: perk_tariff_id,
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

$("#btn-addTariff").on('click',function() {
    $('form[name="formAddTariff"]').submit(function (event) {
        event.preventDefault();
        //alert('Sim')
        //return
        let name = $(this).find("input#name").val();
        let category = $(this).find("select#category").val();
        let amount = $(this).find("input#amount").val();
        let tariff_id = $(this).find("input#tariff_id").val();


        let result = document.getElementById("resultBox");   
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : "/admin/tarifa",
            type : 'POST',
            data : {
                name: name,
                category: category,
                amount: amount,
                tariff_id: tariff_id
            },
            dataType: 'json',
            async: false,
        })
        .done(function(msg){
            $("#name").val("");
            $("#amount").val("");
            //$("#category").val("");

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



//--------------------------Membro

$('#btn-cancelBuy').on('click', function () {
    $('form[name="formCancelBuy"]').submit(function (event) {
        event.preventDefault();
       
        let buy_id = $(this).find("input#cancel_buy_id").val();
        let result = document.getElementById("resultBoxB");
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : "/membro/reembolso/"+buy_id,
            type : 'DELETE',
            data : {
                buy_id: buy_id, 
            },
            dataType: 'json',
            async: false,
        })
        .done(function(msg){
            window.location.reload();
        })
        .fail(function(msg){
            //console.log("Falhou");
            $('#resultBoxB').removeClass('alert-success');
            $('#resultBoxB').addClass('alert-danger');
            result.style.display = "block";
            
            let data = JSON.parse(msg.responseText);
            $("#resultB").html(data.message);
        });
    })
})

$('#btn-cancelB').on('click', function (event) {
    event.preventDefault();
    $('#exampleModalCancelBuy').modal('hide')
})