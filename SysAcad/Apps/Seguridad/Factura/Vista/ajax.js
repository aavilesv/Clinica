//Llenar el combo de cliente
$(document).ready(function() {
  $('#cboTipCli').change(function(event) {
    var id = $('#cboTipCli').val();
    var ce;
    if(id == 'Cliente'){
      ce='cli';
    }else if(id == 'Paciente'){
      ce='pac';
    }
    $.ajax({
      url: 'Datos.php',
      type: 'POST',
      data: {'id': id, 'opc':'cbo'}
    })
    .done(function(Cliente) {
      $('#cboCliente').html(Cliente);
      $('#cedula').val('');
      $('#direccion').val('');
      $('#cboCliente1').val('');
      $('#nomb').val('');
      $('#ce').val(ce);
    })
    .fail(function() {
      console.log("error");
    })
  });
});


$(document).ready(function() {
  $('#cbarticulo').change(function(event) {
    var id = $('#cbarticulo').val();
    $.ajax({
      url: 'Datos.php',
      type: 'POST',
      dataType:'json',
      data: {'id': id, 'opc':'cbart'}
    })
    .done(function(Datos) {
      $('#art-cod').val(Datos.id);
      $('#art-stock').val(Datos.stock);
      $('#art-precio').val(Datos.vuni);
    })
    .fail(function() {
      console.log("error");
    })
  });
});
