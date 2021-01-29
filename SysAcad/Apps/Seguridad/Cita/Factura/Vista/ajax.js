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
      $('#ce').val(ce);
    })
    .fail(function() {
      console.log("error");
    })
  });
});

//llenar los datos segun el cliente seleccionado

$(document).ready(function() {
  $('#cboCliente').change(function(event) {
    var id = $('#cboCliente').val();
    var ce = $('#ce').val();
    $.ajax({
      url: 'Datos.php',
      type: 'POST',
      dataType:'json',
      data: {'id': id, 'opc':'inf', 'ti':ce}
    })
    .done(function(Datos) {
        $('#cedula').val(Datos.ced);
        $('#direccion').val(Datos.dir);
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

/*$(document).ready(function() {
  $('#agregar').click(function(event) {
    var id = $('#art-cod').val();
    var can = $('#art-cantidad').val();
    var subtotal = $('#subtotal').val();
    var precio = $('#art-precio').val();
    $.ajax({
      url: 'Datos.php',
      type: 'POST',
      data: {'id': id, 'opc':'aggArt', 'can': can }
    })
    .done(function(fila) {
      $('#tdetalle').html();
      $('#tdetalle').append(fila.fil);
      alertify.success('Success notification message.');
      $('#art-cantidad').val(1);
      $('#art-cod').val('');
      $('#cbarticulo').val(0);
      $('#art-stock').val('');
      $('#art-precio').val('');
      //$('#subtotal').val(subtotal + parseFloat(can*precio));
          var itenes = [];
          $('#tdatos tbody tr').each(function(){
            var itemOrden={};
              itemOrden.precio =parseFloat($(this).find('td').eq(4).html());
              itenes.push(itemOrden);
          });
          var orden = {};
          orden.itenes = itenes;
          var total = 0;
          $.each(itenes, function(index, value){
            total += value.precio;
          });
          $('#subtotal').val(total.toFixed(2));
          var des = total * 0.06;
          $('#descuento').val(des);
          var iva = ((total - des) * 0.12).toFixed(2);
          $('#iva').val(iva);
          var tot = (total - parseFloat(des) + parseFloat(iva)).toFixed(2);
          $('#total').val(tot);

      //https://www.youtube.com/watch?v=9l4OcYkFdtc
    })
    .fail(function() {
      console.log("error");
    })
  });
});*/
