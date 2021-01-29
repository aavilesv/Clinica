<?php
 session_start();
require_once('../Controlador/ProveedorCTR.php');
include_once('../Controlador/CarritoCTR.php');

$product = new ItemsDAO();
$cart = new CarritoCTR();
if (isset($_GET['action'])) {
  switch ($_GET['action']) {
    case 'add':
    $cart->add_item($_GET['code'], $_GET['amount']);
    break;
    case 'remove':
    $cart->remove_item($_GET['code']);
    break;
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Lista de Proveedores</title>
  <?php
  $rutaValidacion="../../../../";
  $rutaFoto="../../";
  $ruraPerfil="../../";
  $rut="../../../";
  $ruta = "../../../../";
  require_once("../../../../Apps/Main/head.php");
  ?>
  <script type="text/javascript" src="../js/functions.js"></script>
</head>

<body>
  <?php require_once("../../../../Apps/Main/header.php"); ?>
  <div id="page-wrapper">
    <div class="container-fluid bg-success">
      <div class="row">
        <div class="col-lg-12">
          <br> <br>
          <div class="row-fluid">
            <div class="span12">
              <ul class="breadcrumb list-group-item-success">
                <li><a href= " <?php echo $ruta; ?>Apps/Main/vista/menu.php"><i class="glyphicon glyphicon-home"></i> Inicio</a><span class="divider"></span></li>
                <li><a href= " <?php echo $ruta;?>Apps/seguridad/farmacia/inicio.php"><i class="glyphicon glyphicon-plus"></i> Farmacia</a><span class="divider"></span></li>
                <li><a href="javascript:window.location.reload();" class="active"><i class="glyphicon glyphicon-shopping-cart"></i> Compras</a> <span class="divider">/</span></li>
              </ul>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <h1 class="page-header"><i class="glyphicon glyphicon-list-alt"></i> Lista de Compras</h1>
            </div><!-- /.col-lg-12 -->
          </div><!-- /.row -->

          <div class="container-fluid">
            <div class="row">
              <div class="panel panel-default panel-table panel-green">
                <div class="panel panel-heading">
                <br>

                <div class="row"> <!-- Criterios de Búsqueda-->
                  <div class="col col-md-12 col-xs-12">
                    <form method="post" action="InterfazCompra.php">
                      <div class="form-row">
                        <div class="col col-xs-12 col-md-4 mb-3">
                          <div class="form-group">
                            <div class="input-group">
                              <span class="input-group-addon">Proveedor</span>
                              <!--<label for="sel1">Select list:</label>-->
                              <select class="form-control" id="sel1" onchange="cargarTabla()" name="idProveedor">
                                <?php $cart->cargarProveedor() ?>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col col-md-1 mb-3">
                        </div>
                        <div class="col col-xs-12 col-md-4 mb-3">
                          <div class="form-group">
                            <div class="input-group">
                              <span class="input-group-addon">Fecha</span>
                              <input id="empleado" type="text" class="form-control" name="empleado"  disabled value=<?php echo date("Y-M-d"); ?>>
                            </div>
                          </div>
                        </div>
                      </div><!--Fin form row 1-->
                      <div class="form-row">
                        <div class="col col-xs-12 col-md-4 mb-3">
                          <div class="form-group">
                            <div class="input-group">
                              <span class="input-group-addon">Empleado</span>
                              <input id="empleado" type="text" class="form-control" name="empleado"  disabled placeholder="<?php echo $_SESSION['n_usuario'];?>">
                            </div>
                          </div>
                        </div>
                        <div class="col col-md-1 mb-3">
                        </div>
                        <div class="col col-xs-12 col-md-4 mb-3">
                          <div class="form-group">
                            <div class="input-group">
                              <span class="input-group-addon">Orden de Compra</span>
                              <input id="empleado" type="text" class="form-control" name="empleado"  disabled value=<?php echo 'CP00'.$product->generaOrden(); ?>>
                            </div>
                          </div>
                        </div>
                      </div><!--Fin form row 2-->
                      <div class="form-row">
                        <div class="col col-xs-12 col-md-4 mb-3">
                          <div class="form-group">
                            <div class="btn-group">
                                <div class="col-md-2 col-md-offset" >
                                    <button id="btnEnviar" type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-shopping-cart"></span> Comprar</button>
                                </div>
                                <div class="col-md-2 col-md-offset-3">
                                    <a href='InterfazCompra.php?prod=0&opc=cancelar' class="btn btn-danger icon-home col-md-offset-0" name="button" role="button"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div> <!-- Fin Criterios de Búsqueda-->
              </div>
              <div class="panel-body">
                <div class="col-6"><!-- Cuerpo de Tabla-->
                  <div class="col-sx-6 col-md-6 table-responsive">
                    <table class="table table-bordered table-hover table-condensed table-fixed table-responsive-md">
                      <thead class="productsHeader bg-success">
                        <tr>
                          <th colspan="6" style="text-align:center">Lista de productos</th>
                        </tr>
                        <tr>
                          <th>Producto</th>
                          <th>Existencia</th>
                          <th>Vencimiento</th>
                          <th>Precio (<i class="fa fa-usd" aria-hidden="true"></i>)</th>
                          <th>Cantidad</th>
                          <th>Opcion</th>
                        </tr>
                      </thead>
                      <tbody class="productsBody" id="tablaprod">
                        <?= $product->get_products(); ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="col-6">
                  <div class="col-sx-6 col-md-6 table-responsive">
                    <table class="table table-bordered table-hover table-condensed table-fixed">
                      <thead class="cartHeader bg-info" display="off">
                        <tr>
                          <th colspan="6" style="text-align:center">Mi Carrito de compras <i class="glyphicon glyphicon-shopping-cart"><i/></th>
                          </tr>
                          <tr>
                            <th colspan="3">Total pagar: <?= $cart->get_total_payment(); ?></th>
                            <th colspan="3">Total items: <?= $cart->get_total_items(); ?></th>
                          </tr>
                        </thead>
                        <tbody class="cartBody">
                          <tr>
                            <th>ID</th>
                            <th>Producto</th>
                            <th>Precio (<i class="fa fa-usd" aria-hidden="true"></i>)</th>
                            <th>Cantidad</th>
                            <th>SubTotal</th>
                            <th>Opcion</th>
                          </tr>
                          <?= $cart->get_items(); ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="panel-footer">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php require_once("../../../../Apps/Main/footer.php"); ?>
</body>
</html>
<script type="text/javascript">
function comprar(){
  <?php $cart->detalleCompra(); ?>
}
</script>
<script type="text/javascript">
function cargarTabla() {
  var x = document.getElementById("sel1").value;
  $("#tablaprod").append(<?= $product->get_products('x'); ?>);
  <?php $valor = 'x' ?>
  //document.getElementById("prod").innerHTML = $product->get_products(); ;
}

$(".delete-button").click(function () {
  var id = $(this).attr('value');
  var proveedor = $(this).attr('id');
  //alert("razonSocial del proveedor seleccionado: "+id);
  if (confirm("Estas seguro, deseas elmininar proveedor: " + proveedor.toString() + " ?")) {
    $(".delete-button").attr("href", "InterfazProveedor.php?ruc=" + id + "&opc=eliminar");
  } else {
    return false;
  }
});
</script>
