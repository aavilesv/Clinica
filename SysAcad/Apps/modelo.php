<?php
session_start();
require_once('../Controlador/CtrOrtodoncia.php');

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
    <div class="container-fluid ">
      <div class="row">
        <div class="col-lg-12">
          <br> <br>
          <div class="row-fluid">
            <div class="span12">
              <ul class="breadcrumb list-group-item-success">
                <li><a href= " <?php echo $ruta; ?>Apps/Main/vista/menu.php"> Inicio</a><span class="divider"></span></li>
                <li><a href= " <?php echo $ruta;?>Apps/seguridad/Ortodoncia/inicio.php"> Ortodoncia</a><span class="divider"></span></li>
                <li><a href="javascript:window.location.reload();" class="active"> Insumos</a> <span class="divider">/</span></li>
              </ul>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <h1 class="page-header">Insumos</h1>
            </div><!-- /.col-lg-12 -->
          </div>

          <div class="container-fluid">
            <div class="row">
              <div class="panel panel-default panel-table panel-danger">

                <div class="panel panel-heading">
                  <div class="row"> <!-- Criterios de Búsqueda-->
                    <div class="form-row">
                      <div class="col col-xs-12 col-md-4 mb-3">
                        <div class="form-group">
                          <div class="btn-group">
                            <div class="col-md-2 col-md-offset" >
                              <a href="ManInCl.php?" class="btn btn-primary">
                                <i class="glyphicon glyphicon-plus"> </i>
                                Nuevo
                              </a>
                            </div>
                            <div class="col-md-2 col-md-offset-3">
                              <a href="javascript:window.location.reload();" class="btn btn-success">
                                <i class="glyphicon glyphicon-refresh"> </i>
                                Actualizar
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div> <!-- Fin Criterios de Búsqueda-->
                </div>



                <div class="panel-body">
                  <div class="row"><!-- Cuerpo de Tabla-->
                    <div class="col-sx-12 col-md-12 table-responsive">


                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php require_once("../../../../Apps/Main/footer.php"); ?>
  <script>
  $(document).ready(function() {
    $('#insumos').DataTable({
      responsive: true
    });
  });
  </script>
</body>
</html>
<script type="text/javascript">
$(".delete-button").click(function(){
  var id = $(this).attr('value');
  var producto = $(this).attr('id');
  //alert("razonSocial del proveedor seleccionado: "+id);
  if(confirm("Estas seguro, deseas elmininar el producto: "+producto.toString()+" ?")){
    $(".delete-button").attr("href", "InterfazProducto.php?idProducto="+id+"&opc=eliminar");
  }
  else{
    return false;
  }
});
</script>
