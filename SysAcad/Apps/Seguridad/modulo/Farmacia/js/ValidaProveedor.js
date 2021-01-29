function addRegistro(){
  //Obteniendo los valores del formulario
  var ruc = $("#ruc").val();
  var razonSocial = $("#razonSocial").val();
  var telefono = $("#telefono").val();
  var email = $("#email").val();
  var direccion = $("#direccion").val();
  var estado = $("#estado").val();



  //Agregando registro
  $.post("ajax/addRecord.php",{
    ruc : ruc,
    razonSocial : razonSocial,
    telefono : telefono,
    email : email,
    direccion : direccion,
    estado : estado
  }, function (data, status) {
    //Cierra the popup
    $("#add_new_record_modal").modal("hide");

    //Lee registros nuevamente

  })
}
