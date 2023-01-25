$("#btn-formLogin").on('click',function() {
    $('form[name="formLogin"]').submit(function (event) {
        event.preventDefault();
        
        /*$('#login-spinner').addClass('spinner-border');
        $('#login-spinner').addClass('spinner-border-sm');*/
         
        let email = $(this).find("input#emailL").val();
        let pin_access = $(this).find("input#pin_accessL").val();
        let result = document.getElementById("resultBox");
        /*console.log(email);
        console.log(password);*/

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : "/entrar",
            type : 'POST',
            data : {
                email: email,
                password: pin_access,
            },
            dataType: 'json',
            async: false,
            /*beforeSend : function(){
                $("#result").html("Carregando...");
            }*/
        })
        .done(function(msg){  
            
            result.style.display = "none";
            //
            let message = msg.message;
            console.log(message);
            if (message == 'member') {
                window.location.href = '/membro/home';
            }

        })
        .fail(function(msg){
            
            result.style.display = "block";
            //
            let data = JSON.parse(msg.responseText);
            $("#result").html('Email ou Senha errada!');
            
            /*setTimeout(
                $('#login-spinner').removeClass('spinner-border'),
                $('#login-spinner').removeClass('spinner-border-sm')
            , 9000);*/
            
        });

    })
  
});


$("#btn-formReg").on('click',function() {
    $('form[name="formRegister"]').submit(function (event) {
        event.preventDefault();
        
        let result = document.getElementById("resultBox2");

        let data = $("#formRegister").serialize();
        
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : "/registo-membro",
            type : 'POST',
            data:data,
            dataType: 'json',
            async: false,
            /*beforeSend : function(){
                $("#result").html("Carregando...");
            }*/
        })
        .done(function(msg){  
            alert('Cadastrado com sucesso')
            $('#resultBox2').removeClass('alert-danger');
            $('#resultBox2').addClass('alert-success');
            result.style.display = "block";
            
            //
            let message = msg.message;
            $("#result2").html(message);
            /*result.style.display = "none";
            //
            let message = msg.message;
            console.log(message);
            if (message == 'member') {
                window.location.href = '/conta';
            }else{
                window.location.href = '/';
            }*/
        })
        .fail(function(msg){
            $('#resultBox2').removeClass('bg-success');
            $('#resultBox2').addClass('bg-danger');
            result.style.display = "block";
            //
            let data = JSON.parse(msg.responseText);
            $("#result2").html(data.message);
        });
        
    });
});
