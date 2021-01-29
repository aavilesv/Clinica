
<!DOCTYPE html>
<?php
session_start();
 $ruta = "../../../../";
 require_once("../../../../Apps/Main/head.php");
 require_once('../Controlador/CtrCabFactura.php');
 require_once('../Controlador/CtrCliente.php');?>
 <head>
   <script type="text/javascript" src="../js/jquery.min.js"></script>
   <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
   <script src="../js/alertify.min.js"></script>
   <link rel="stylesheet" href="../css/alertify.core.css">
   <link rel="stylesheet" href="../css/alertify.default.css">
   <script src="ajax.js"></script>
 </head>

<body>
  <?php
    require_once("../../../../Apps/Main/header.php");
    if (isset($_GET['opc'])) {
        ini_set('date.timezone', 'America/Guayaquil');
        $feccrea = strftime('%Y-%m-%d-%H-%M-%S',time());
        $fecFac = strftime('%Y-%m-%d',time());
        switch ($_GET['opc']) {
         case 'nuevo':

               # Para nuevo registro
               $FACCabId = '';
               $IdProducto = '';
               $FACabFec = $fecFac;
               $FACCabDes = 6;
               $FACCabSubtotal = '';
               $FACCabIva = 12;
               $FACCabTotal = '';
               $FACCabTipCli = '';
               $FACCabCliId = '';
               $FACCabUsuCrea =  $_SESSION['n_usuario'];
               $FACCabFecCrea = $feccrea;
               $FACCabUsuMod = '';
               $FACCabFecMod = '';
               $FACCabEst = '';
               $cedula = '';
               $dir ='' ;
               $name='';
               $selected = '';
               $disable = '';
         break;
         case 'ver':
               # Para Visualizar los datos
               $Cliente = new CtrCliente();
               $factura = new CtrCabFactura();
               $registros = $factura->getFactura($_GET['fac']);
               $FACCabCliId = $registros->__get('FACCabCliId');
               $FACCabTipCli = $registros->__get('FACCabTipCli');
               if($FACCabTipCli == 'Cliente'){
                  $cli = $Cliente->getCliente($FACCabCliId);
                  $cedula=$cli->__get('FACCliCedula');
                  $name=$cli->__get('FACCliNombre')." ".$cli->__get('FACCliApellido');
                  $dir=$cli->__get('FACCliDireccion');
               }else{
                  $pac = $Cliente->getPaciente($FACCabCliId);
                  $pac = $Cliente->getPaciente($FACCabCliId);
                  $cedula=$pac['ced'];
                  $name=$pac['name'];
                 $dir=$pac['dire'];
               }

               $FACCabId = $registros->__get('FACCabId');
               $FACabFec = $registros->__get('FACabFec');
               $FACCabDes = $registros->__get('FACCabDes');
               $FACCabSubtotal = $registros->__get('FACCabSubtotal');
               $FACCabIva = $registros->__get('FACCabIva');
               $FACCabTotal = $registros->__get('FACCabTotal');
               $FACCabUsuCrea = $registros->__get('FACCabUsuCrea');
               $FACCabFecCrea = $registros->__get('FACCabFecCrea');
               $FACCabUsuMod = $registros->__get('FACCabUsuMod');
               $FACCabFecMod = $registros->__get('FACCabFecMod');
               $FACCabEst = $registros->__get('FACCabEst');

               $disable = 'disabled';
               $selected = 'selected';

          break;
       }
    }
  ?>
     <?php require_once("../../../../Apps/Main/header.php"); ?>
        <div class="row">
            <div class="col-lg-12">

                <div class="lock-screen-wrapper">
                    <div class="panel panel-info">
                          <div id="page-wrapper">
                        <div class="panel-body">
                            <form id="form1" name="frmManFactura"  method="post" action="InterfazCabFactura.php">


                                  <div class="row">
                                      <div class="col-xs-12">
                                          <fieldset style="font-family: arial">
                                            <!--  <legend style="font-size: 15px;font-weight: bold">Datos Vendedor-->
                                              </legend>
                                              <div class="row">

                                                    <div class="form-group">
                                                        <input id="id" value=<?php echo $FACCabId; ?>
                                                               class="form-control" type="hidden"
                                                               name="id">
                                                        <input id="ivaIni" value=<?php echo $FACCabIva; ?>
                                                        class="form-control" type="hidden"
                                                        name="ivaIni">
                                                        <input id="descIni" value=<?php echo $FACCabDes; ?>
                                                        class="form-control" type="hidden"
                                                        name="descIni">
                                                        <input id="usuCrea" value=<?php echo $FACCabUsuCrea; ?>
                                                        class="form-control" type="hidden"
                                                        name="usuCrea">
                                                        <input id="fecCrea" value=<?php echo $FACCabFecCrea; ?>
                                                        class="form-control" type="hidden"
                                                        name="fecCrea">
                                                        <input id="idcli" value=<?php echo $FACCabCliId; ?>
                                                        class="form-control" type="hidden"
                                                        name="idcli">
                                                        <input id="productos"
                                                        class="form-control" type="hidden"
                                                        name="productos">
                                                        <input id="cantidad"
                                                        class="form-control" type="hidden"
                                                        name="cantidad">
                                                        <input id="precioUnit"
                                                        class="form-control" type="hidden"
                                                        name="precioUnit">
                                                    </div>

                                                  <div class="control-label col-md-3">
                                                      <div class="form-group">
                                                          <label>Usuario</label>
                                                          <input id="usuario" value=<?php echo $FACCabUsuCrea; ?> readonly
                                                                 class="form-control" type="text"
                                                                 name="usuario">
                                                      </div>
                                                  </div>

                                                  <div class="col-xs-3">
                                                      <div class="form-group">
                                                          <label>Tipo de cliente</label>
                                                          <select class="form-control chosen-select" id="cboTipCli" name="cboTipCli" <?php echo $disable; ?>>
                                                              <option value="0">Seleccione Tipo Cliente</option>
                                                              <option value="Cliente" <?php if($FACCabTipCli == 'Cliente'){echo $selected;} ?>>Cliente</option>
                                                              <option value="Paciente" <?php if($FACCabTipCli == 'Paciente'){echo $selected;} ?>>Paciente</option>
                                                          </select>
                                                      </div>
                                                  </div>

                                                  <div class="col-xs-3">
                                                      <div class="form-group">
                                                          <label>Fecha</label>
                                                          <input id="fecha" name="fecha" value=<?php echo $fecFac; ?> readonly
                                                                 class="form-control" type="text"
                                                                 placeholder="Fecha"/>
                                                      </div>
                                                  </div>
                                              </div>

                                              <legend style="font-size: 15px;font-weight: bold"><h2>Factura</h2>
                                              </legend>
                                              <div class="row">
                                                <div class="col-md-3">
                                                    <label>Codigo: </label>
                                                      <input autocomplete="off" list="cboCliente" type="text" id="cboCliente1"  name="cboCliente" class="form-control" placeholder="Buscar Cliente" <?php echo $disable; ?>>

                                                      <datalist   id="cboCliente"  <?php echo $disable; ?>  >

                                                        </datalist>

                                                </div>
                                                <div class="col-xs-3">
                                                    <div class="form-group">
                                                        <label>Nombre:</label>
                                                        <input id="nomb" readonly class="form-control" name="nomb" type="text"  required="true"
                                                               value= <?php echo $name;  ?>>

                                                    </div>

                                                </div>
                                                  <input type="hidden" name="ce" id="ce">
                                                  <div class="col-xs-3">
                                                      <div class="form-group">
                                                          <label>Cedula:</label>
                                                          <input id="cedula" readonly class="form-control" name="cedula" type="text"
                                                                 value= <?php echo $cedula;  ?>>
                                                      </div>
                                                  </div>
                                                  <div class="control-label col-md-3">
                                                      <div class="form-group">
                                                          <label>Dirección:</label>
                                                          <input id="direccion" name="direccion" readonly class="form-control"
                                                                 type="text" value= <?php echo $dir;  ?>>
                                                      </div>
                                                  </div>
                                              </div>
                                              <br>

                                              <legend style="font-size: 15px;font-weight: bold">Datos del Articulo.
                                              </legend>

                                              <div class="well well-sm">
                                                  <div class="row">
                                                      <form id="frm-additem">
                                                          <div class="control-label col-md-3">
                                                              <input id="art-cod" class="form-control" type="text"
                                                                     placeholder="Codigo" readonly/>
                                                          </div>
                                                          <div class="control-label col-md-3">
                                                              <select class="chosen-select form-control" id="cbarticulo" name="cbarticulo" <?php echo $disable; ?>>
                                                                <?php
                                                                    $factura = new CtrCabFactura();
                                                                    $registros = $factura->getProductos();
                                                                 ?>
                                                                  <option value="0">Seleccione Articulo</option>
                                                                  <?php foreach ($registros as $value) {?>
                                                                    <?php if (!is_null($value)){ ?>
                                                                      <option value="<?php echo $value['idpro'] ?>"><?php echo $value['producto']; ?></option>
                                                                    <?php } ?>
                                                                  <?php  } ?>
                                                              </select>
                                                          </div>

                                                          <div class="col-xs-2">
                                                              <input id="art-cantidad" class="form-control" value="1" <?php echo $disable; ?>
                                                                     type="number" min= "1" step="1" name="art-cantidad">
                                                          </div>

                                                          <div class="col-xs-1">
                                                              <input id="art-stock" class="form-control"
                                                                     type="text" name="art-stock" readonly/>
                                                          </div>

                                                          <div class="col-xs-2">
                                                              <div class="input-group">
                                                                  <span class="input-group-addon"
                                                                        id="basic-addon1">P/u</span>
                                                                  <input id="art-precio" readonly
                                                                         class="form-control" type="text"
                                                                         name="art-precio"/>
                                                              </div>
                                                          </div>
                                                          <div class="col-xs-1">
                                                              <a <?php echo $disable; ?> class="btn btn-primary form-control" id="agregar"><i class="glyphicon glyphicon-plus"></i></a>
                                                          </div>
                                                      </form>

                                                  </div>
                                              </div>

                                              <div class="container-fluid">
                                                  <div class="row">
                                                      <table class="table table-hover table-bordered table-responsive table-striped"
                                                             id="tdatos" name="tdatos" >
                                                          <thead>
                                                              <tr>
                                                                  <th>Cod</th>
                                                                  <th>Descripción</th>
                                                                  <th>Cantidad</th>
                                                                  <th>Precio Unit.</th>
                                                                  <th>Total</th>
                                                                  <th>Accion</th>
                                                              </tr>
                                                          </thead>
                                                          <tbody id="tdetalle">
                                                          </tbody>
                                                      </table>

                                                  </div>
  <br><br>
                                                  <div class="row">
                                                      <div class="col-xs-4 col-lg-offset-8">
                                                          <div class="panel panel-info">
                                                              <div class="panel-heading">
                                                                  <strong class="panel-title">Total a Pagar</strong>
                                                              </div>
                                                              <div class="panel-body" style="min-height: 190px">
                                                                  <table class="totales col-xs-offset-1" style="display: block">
                                                                      <tbody>
                                                                          <tr>
                                                                              <td class="text-right">
                                                                                  <strong>SUBTOTAL: </strong>
                                                                              </td>
                                                                              <td>
                                                                                  <div class="input-group">
                                                                                      <span class="input-group-addon">
                                                                                          <i class="glyphicon glyphicon-usd"></i>
                                                                                      </span>
                                                                                      <input id="subtotal" readonly="" class="form-control"
                                                                                             type="text" placeholder="0.00" name="subtotal" style="font-weight: bold">
                                                                                  </div>
                                                                              </td>
                                                                          </tr>
                                                                          <tr>
                                                                              <td class="text-right">
                                                                                  <strong>DESC: </strong>
                                                                              </td>
                                                                              <td>
                                                                                  <div class="input-group">
                                                                                      <span class="input-group-addon">
                                                                                          <i class="glyphicon glyphicon-usd"></i>
                                                                                      </span>
                                                                                      <input id="descuento" name="descuento" class="form-control"
                                                                                             type="text" placeholder="0.00" readonly style="font-weight: bold">
                                                                                  </div>
                                                                              </td>
                                                                          </tr>
                                                                          <tr>
                                                                              <td class="text-right">
                                                                                  <strong>IVA 12%: </strong>
                                                                              </td>
                                                                              <td>
                                                                                  <div class="input-group">
                                                                                      <span class="input-group-addon">
                                                                                          <i class="glyphicon glyphicon-usd"></i>
                                                                                      </span>
                                                                                      <input id="iva" name="iva" readonly="" class="form-control"
                                                                                             type="text" placeholder="0.00" style="font-weight: bold">
                                                                                  </div>
                                                                              </td>
                                                                          </tr>

                                                                          <tr>
                                                                              <td class="text-right">
                                                                                  <strong>TOTAL: </strong>
                                                                              </td>
                                                                              <td>
                                                                                  <div class="input-group">
                                                                                      <span class="input-group-addon">
                                                                                          <i class="glyphicon glyphicon-usd"></i>
                                                                                      </span>
                                                                                      <input id="total" name="total" readonly="" class="form-control"
                                                                                             type="text" placeholder="0.00" style="font-weight: bold">
                                                                                  </div>
                                                                              </td>
                                                                          </tr>

                                                                      </tbody>
                                                                  </table>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>

                                              </div>


                                              <div class="well well-sm">
                                                  <div class="row">
                                                      <div class="col-xs-3 col-lg-offset-9">
                                                        <?php if (isset($_GET['opc']) && ($_GET['opc'] =='nuevo' || $_GET['opc'] =='editar')) {
              ?>

                                                        <button type="submit" id="btnsend" class=" btn btn-primary "><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>

                                                        <a href="ListarFacturas.php" id="btnSalir" class="btn btn-danger"> <i class="glyphicon glyphicon-remove"></i> Cancelar</a>

                                                        <?php
          } else {
              ?>
                                                            <a href="ListarFacturas.php" id="btnSalir" class="btn btn-primary"> <i class="glyphicon glyphicon-remove"></i> Regresar</a>

                                                        <?php
          } ?>
                                                        <input type="hidden"  name="opc" id="opc" value='<?=$_GET['opc'];?>' /><br>


                                                      </div>

                                                  </div>
                                              </div>

                                          </fieldset>
                                      </div>
                                  </div>
                             </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>
  </div>

  <script >
        $(function () {
        $(document).on('click', '#eli', function (event) {
            event.preventDefault();
            $(this).closest('tr').remove();
            var descIni = $('#descIni').val();
            var ivaIni = $('#ivaIni').val();
            calculo(descIni, ivaIni);
            idProductos();
            alertify.error('Producto removido');
        });

        /*agregar productos a la tabla */
        $('#agregar').click(function(event) {
          var band = '0';
          var id = $('#art-cod').val();
          var can = $('#art-cantidad').val();
          var subtotal = $('#subtotal').val();
          var precio = $('#art-precio').val();
          var descIni = $('#descIni').val();
          var ivaIni = $('#ivaIni').val();
          if(parseFloat(can) > parseFloat($('#art-stock').val())){
              alertify.alert("Cantidad supera al stock", function(){
              alertify.message('OK');

            });
            $('#art-cantidad').val(1);
          }else {
            $('#tdatos tbody tr').each(function(){
              if($(this).find('td').eq(0).html() == id){
                  can = parseFloat(can) + parseFloat($(this).find('td').eq(2).html());
                  var nuevoTotal = (parseFloat(can) * parseFloat(precio)).toFixed(2);
                  $(this).find('td').eq(2).html(can);
                  $(this).find('td').eq(4).html(nuevoTotal);
                  calculo(descIni, ivaIni);
                  alertify.success('Producto agregado, se aumento la cantidad');
                band = '1';
              }
            });
            if(band == '0'){
              $.ajax({
                url: 'Datos.php',
                type: 'POST',
                data: {'id': id, 'opc':'aggArt', 'can': can}
              })
              .done(function(fila) {
                if(fila == ''){
                  $('#art-cantidad').val(1);
                  alertify.error('Elija un Producto');
                }else{
                  $('#tdetalle').html();
                  $('#tdetalle').append(fila);
                  alertify.success('Producto agregado');

                  calculo(descIni, ivaIni);
                  idProductos();
                }


                //https://www.youtube.com/watch?v=9l4OcYkFdtc
              })
              .fail(function() {
              })
            }
          }
        });
      });

      function calculo(descIni,  ivaIni) {
        $('#art-cantidad').val(1);
        $('#art-cod').val('');
        $('#cbarticulo').val(0);
        $('#art-stock').val('');
        $('#art-precio').val('');
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
        var des = (total * descIni) / 100;
        $('#descuento').val(des);
        var iva = (((total - des) * ivaIni)/100).toFixed(2);
        $('#iva').val(iva);
        var tot = (total - parseFloat(des) + parseFloat(iva)).toFixed(2);
        $('#total').val(tot);
      }

      function idProductos() {
        var itenes = [];
        $('#tdatos tbody tr').each(function(){
          var itemOrden={};
            itemOrden.id =$(this).find('td').eq(0).html();
            itemOrden.precio =$(this).find('td').eq(3).html();
            itemOrden.cantidad =$(this).find('td').eq(2).html();
            itenes.push(itemOrden);
        });
        var orden = {};
        orden.itenes = itenes;
        var productos = '';
        var cantidad= '';
        var precioUni='';
        $.each(itenes, function(index, value){
          productos += value.id + '-';
          precioUni += value.precio + '-';
          cantidad += value.cantidad + '-';
        });
        $('#productos').val(productos);
        $('#precioUnit').val(precioUni);
        $('#cantidad').val(cantidad);
      }

      $(document).on('ready', function() {
        event.preventDefault();
        if($('#cboTipCli').val() != '0'){
          var id = $('#cboTipCli').val();
          var idcli = $('#idcli').val();
          $.ajax({
            url: 'Datos.php',
            type: 'POST',
            data: {'id': id, 'opc':'cbo'}
          })
          .done(function(Cliente) {
          $('#cboCliente').html(Cliente);
          $("#cboCliente option[value="+ idcli +"]").attr("selected",true);
          })
          .fail(function() {
            console.log("error");
          })
        }
      });
    $(document).on('ready', function() {
        event.preventDefault();
        var descIni = $('#descIni').val();
        var ivaIni = $('#ivaIni').val();
        if($('#cboTipCli').val() != '0'){
          var id = $('#id').val();
          $.ajax({
            url: 'Datos.php',
            type: 'POST',
            data: {'id': id, 'opc':'detalle'}
          })
          .done(function(detalle) {
            var obj = jQuery.parseJSON(detalle);
            for (var i = 0; i < obj.length; i++) {
              $('#tdetalle').html();
              $('#tdetalle').append(obj[i]);
            }
            calculo(descIni, ivaIni);
            tab = document.getElementById('tdatos');
            for(i=0; ele = tab.getElementsByTagName('button')[i]; i++)
                ele.disabled = true;
          })
          .fail(function() {
            console.log("error");
          })
        }
      });

      $(document).on('click', '#btnsend', function(event) {
        if (validaCmbTipCli() == false || validaCliente() == false || validaTabla() == false){
          event.preventDefault();
        }else {
          this.submit();
        }
      });

      function validaCmbTipCli() {
        var indice = document.getElementById('cboTipCli').selectedIndex;
        if (indice == null || indice == 0) {
          //alertify.error("Debe seleccionar Tipo de cliente");
          alertify.alert("Debe seleccionar Tipo de cliente", function(){
            alertify.message('OK');
          });

          return false;
        }
      }

      function validaCliente() {
        var nombre = document.getElementById('cboCliente1').value;
        if (nombre == null || nombre.length == 0 || /^\s+$/.test(nombre)) {
          // document.getElementById('apellido_help').style.color = "red";
          // document.getElementById('apellido').focus();
          alertify.alert("Debe seleccionar un cliente", function(){
              alertify.message('OK');
          });
          return false;
        }
      }

      function validaTabla() {
        var indice = document.getElementById("tdatos").rows.length;;
        if (indice == null || indice == 1) {
          alertify.alert("Debe agregar un producto", function(){
            alertify.message('OK');
          });
          return false;
        }
      }

      $(document).ready(function() {
        $('input[name=cboCliente]').change(function(event) {
          BuscarDatos();
        });
      });

      function BuscarDatos() {
        var id = document.getElementById('cboCliente1').value;
        var ce = $('#ce').val();
        if(id == ''){
          $('#cedula').val('');
            $('#nomb').val('');
          $('#direccion').val('');
        }
        $.ajax({
          url: 'Datos.php',
          type: 'POST',
          dataType:'json',
          data: {'id': id, 'opc':'inf', 'ti':ce}
        })
        .done(function(Datos) {
            $('#cedula').val(Datos.ced);
              $('#nomb').val(Datos.name);
            $('#direccion').val(Datos.dir);
        })
        .fail(function() {
          console.log("error");
        })
      }

      $(document).ready(function() {
        $('#cboCliente1').keypress(function(event) {
          if(event.which == 13) {
           event.preventDefault();
           BuscarDatos();
        }
        });
      });

      $(document).ready(function() {
        $('#nuevocli').click(function(event) {
          event.preventDefault();
        });
      });

  </script>
  </body>
