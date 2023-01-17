function changeCategory(select){
    var optionInter = document.getElementById('optionInter');
    var optionLocal = document.getElementById('optionLocal');

    const value = select.value
    if(value == "local"){
        
        //optionInter.style.display = 'block';
        optionInter.style.display = 'none';
        optionLocal.style.display = 'flex';

    }else{
        
        //optionLocal.style.display = 'none';
        optionLocal.style.display = 'none';
        optionInter.style.display = 'flex';
    }
    
}

$("#btn-addAirline").on('click',function() {
    $('form[name="formAddAirline"]').submit(function (event) {
        event.preventDefault();
        let orige=''
        let destiny=''

        let name = $(this).find("input#name").val();
        let category = $(this).find("select#category").val();
        if (category =='inter') {  
            orige = $(this).find("select#orige2").val();
            destiny = $(this).find("select#destiny2").val();  
        }else{
            orige = $(this).find("select#orige").val();
            destiny = $(this).find("select#destiny").val();
        }
        let date = $(this).find("input#date").val();
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