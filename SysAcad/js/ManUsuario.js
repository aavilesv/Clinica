function addRegistro(){
  //Obteniendo los valores del formulario
  var nombre = $("#nombre").val();
  var apellido = $("#apellido").val();
  var usuario = $("#usuario").val();
  var clave = $("#calve").val();

  //Agregando registro
  $.post("ajax/addRecord.php",{
    nombre : nombre,
    apellido : apellido,
    usuario : usuario,
    clave : clave
  }, function (data, status) {
    //Cierra the popup
    $("#add_new_record_modal").modal("hide");

    //Lee registros nuevamente
    
  })
}
