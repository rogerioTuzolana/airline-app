$("#btn-addFleet").on('click',function() {
    $('form[name="formAddFleet"]').submit(function (event) {
        event.preventDefault();
        alert('Sim')
        return
        let brand = $(this).find("input#brand").val();
        let model = $(this).find("input#model").val();
        let capacity = $(this).find("input#capacity").val();

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
            },
            dataType: 'json',
            async: false,
        })
        .done(function(msg){
            $("#brand").val("");
            $("#model").val("");
            $("#capacity").val("");

            $('#resultBox').removeClass('alert-danger');
            $('#resultBox').addClass('alert-success');
            result.style.display = "block";
            
            //
            let message = msg.message;
            $("#result").html(message);
            setTimeout(window.location.reload(), 10000);
            $('form[name="formAddFleet"]').reset();
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
