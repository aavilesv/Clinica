jQuery(document).on('submit','#formLg',function(event){
            event.preventDefault();
            jQuery.ajax({
                // url:'../Seguridad/Usuario/Controlador/CtrUsuario.php',
                url:'validar.php',
                type:'POST',
                dataType:'json',
                data:$(this).serialize(),
                beforeSend:function(){
                  $('#loading').show('slow');
                  //$('.btnlogin').val('Validando....');
                }
              })
              .done(function(respuesta){
                console.log(respuesta);
                if (!respuesta.error) {
                  //alert('sesion iniciada');
                   location='../vista/menu.php';

                }else {

                  $('.error').slideDown('slow');
                  setTimeout(function(){
                  $('.error').slideUp('slow');
                },1500);
                $('#loading').hide('fast');
                  //$('.btnlogin').val('Iniciar Sesion');
                //alert('Datos incorrectos')
                }
              })
              .fail(function(resp){
                console.log(resp.responseText);
              })
              .always(function(){
                console.log("complete");
            });
      });
