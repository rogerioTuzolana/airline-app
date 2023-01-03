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

$("#btn-addPerkTariff").on('click',function() {
    $('form[name="formAddPerkTariff"]').submit(function (event) {
        event.preventDefault();
        //alert('Sim')
        //return
        let amount = $(this).find("input#amount").val();
        let description = $(this).find("textarea#description").val();
        let perk_id = $(this).find("input#perk_id").val();
        let tariff_id = $(this).find("input#tariff_id").val();
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
                perk_id: perk_id,
                tariff_id: tariff_id,
                perk_tariff_id: perk_tariff_id,
            },
            dataType: 'json',
            async: false,
        })
        .done(function(msg){
            /*$("#amount").val("");
            $("#description").val("");
            $("#tariff_id").val("");
            $("#perk_id").val("");
            $("#perk_tariff_id").val("");*/

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