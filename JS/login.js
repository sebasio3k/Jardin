jQuery(document).on('submit','#formlogin', function(event){
    event.preventDefault();

    jQuery.ajax({
        url: 'php/login.php',
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        beforeSend: function(){
            $('#login').val('Validando...');
        }

    })
    .done(function(respuesta){
        console.log(respuesta);
        if(!respuesta.error){
            if(respuesta.tipo == 'Admin'){
                location.href = '13_admin_index.php';
            }
            else if(respuesta.tipo == 'Usuario'){ 
                location.href = '2_index_2.php'
            }
        }
        else{
            $('.errorl').slideDown('slow');
            setTimeout(function(){
                $('.errorl').slideUp('slow');
            },3000);
            $('#login').val('Iniciar Sesión');
        }
    })
    .fail(function(resp){
        console.log(resp.responseText);
    })
    .always(function(){
        console.log("complete");
    });
});