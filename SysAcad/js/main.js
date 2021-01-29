//   $(document).ready(function () { //esto es lo basico o clasico
//   $('form').submit(function (event) { // hice el evento sumit
//     event.preventDefault(); // sino lo coloco cuando le de sumibt en el boton se va a porocesar x jquery y se va a procesar x separado osea va a hacer un doble reuest uno kn jquery y otro sin jquery  (es para q solo se ejecute esa parte, para q no se expanda)
//     var data = $(this).serializeArray();  //guardo una variable data y el ((serializeArray)) vamos a serializar tanto el usuario y contraseña y lo cconvertimos en un arreglo
//
//     // esto es km la cabecera del metodo ajax q se va a ejecutar primero es km el request
//     $.ajax({
//       url: 'validar.php',
//       type: 'post', //es el metodo post o get
//       dataType: 'json', //tipo de dato lo q nos devuelve validar.php
//       data: data
//     })
//     .done(function () {// done es km si fuera un true
//       location.href = 'index.php';
//     })
//     .fail(function () {//false
//       $('span').html("falso");
//     });
//   })
// })


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
                  location='../main/indexa.php';

                }else {

                  $('.error').slideDown('slow');
                  setTimeout(function(){
                  $('.error').slideUp('slow');
                },3000);
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
