<?php
session_start();
// $_SESSION['id_rol']=$_GET['rol'];
// $_SESSION['n_usuario']=$_GET['usua'];
// $_SESSION['foto']=$_GET['imagen'];
 ?>
<?php require_once('../Controlador/CtrCabFactura.php');?>
<?php require_once('../Controlador/CtrCliente.php'); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Lista de Facturas</title>
    <?php
    $rutaValidacion="../../../../../";
    $rutaFoto="../../../";
    $ruraPerfil="../../../";
    $rut="../../../../";
     $ruta = "../../../../../";
     require_once("../../../../../Apps/Main/head.php");?>
     <!-- <link rel="stylesheet" href="../css/w3.css"> -->

  </head>

  <body>
    <?php

    // if(isset($_SESSION['n_usuario'])){
    //   //echo "sesion exitosa";
    // }else{
    //     header('location:../../../../../apps/main/vista/login.php');
    // }

      ?>
        <?php require_once("../../../../../Apps/Main/header.php"); ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                  <div class="row">
                      <div class="col-lg-12">
                          <br> <br>
                          <div class="row-fluid">
                              <div class="span12">
                                  <ul class="breadcrumb">
                                      <li><a href= " <?php echo $ruta;?>Apps/Main/vista/menu.php">Inicio</a><span class="divider"></span></li>
                                      <li><a href= " <?php echo $ruta;?>Apps/main/vista/farmacia.php">Farmacia</a><span class="divider"></span></li>
                                      <!-- <li><a href= " <?php echo $ruta;?>Apps/Seguridad/modulo/Factura/Inicio.php">Facturacion</a><span class="divider"></span></li> -->
                                      <li><a href="javascript:window.location.reload();" class="active">Lista de Facturas</a> <span class="divider">/</span></li>
                                  </ul>
                              </div>
                          </div>

                          <div class="row">
                              <div class="col-lg-12">
                                  <h1 class="page-header">Facturacion</h1>

                              </div><!-- /.col-lg-12 -->
                          </div><!-- /.row -->

                          <div class="container-fluid">
                            <div class="row">
                                 <div class="panel panel-default panel-table panel-success">
                                      <div class="panel-heading">
                                          <div class="row"> <!-- Criterios de Búsqueda-->
                                              <div class="col col-xs-6">
                                                  <!-- <form method="GET" action="ListarFacturas.php">
                                                    <div class="input-group">
                                                        <div class="input-group-btn search-panel">
                                                            <button type="button" class="btn btn-info">
                                                                <span id="search_concept">Buscar </span> <span class="caret"></span>
                                                            </button>
                                                        </div>
                                                        <input id="bus" type="text" class="form-control" name="q" placeholder="Ingrese criterio búsqueda... ">
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
                                                        </span>
                                                    </div>
                                                  </form> -->
                                              </div>
                                              <div class="col col-xs-6 text-right">
                                                  <div class="btn-group">
                                                      <a class="btn btn-success col-md-offset-11" href='ManFactura.php?fac=0&opc=nuevo' role="button" align="right">
                                                          <i class="glyphicon glyphicon-plus-sign"> </i>
                                                          Nueva Factura
                                                      </a>
                                                      <a href="javascript:window.location.reload();" class="btn btn-primary">
                                                          <i class="glyphicon glyphicon-refresh"> </i>
                                                          Actualizar
                                                      </a>
                                                  </div>
                                              </div>
                                          </div> <!-- Fin Criterios de Búsqueda-->
                                      </div>

                                      <div class="panel-body">
                                        <div class="row"><!-- Cuerpo de Tabla-->
                                          <div class="col-sx-12 col-md-12 table-responsive">
                                              <table id="datos" class="table table-bordered table-hover table-condensed table-fixed" >
                                                    <thead>
                                                        <tr class="w3-green">
                                                            <th># Factura</th>
                                                            <th>Cliente</th>
                                                            <th>Fecha</th>
                                                            <th>Total</th>
                                                            <th>Estado</th>
                                                            <th>Accion</th>
                                                         </tr>
                                                    </thead>
                                                    <tbody id="detalle">
                                                       <?php
                                                            $ctrFactura = new CtrCabFactura();
                                                            $registros = $ctrFactura->getFacturas();
                                                            $Cliente = new CtrCliente();
                                                            foreach ($registros as $registro) {
                                                            if($registro->__get('FACCabTipCli') == 'Cliente'){
                                                              $cli = $Cliente->getTipoClientes();
                                                            }else {
                                                              $cli = $Cliente->getPacientes();
                                                            }
                                                      ?>
                                                       <tr>
                                                            <td><?php echo $registro->__get('FACCabId'); ?></td>
                                                            <td><?php echo $cli[0]['name'] ?></td>
                                                            <td><?php echo $registro->__get('FACabFec'); ?></td>
                                                            <td><?php echo $registro->__get('FACCabTotal'); ?></td>
                                                            <td><?php $status=$registro->__get('FACCabEst');
                                                                 if ($status!='1') {
                                                                  echo '  <button type="button" class="btn btn-danger btn-xs"> <span class="glyphicon glyphicon-remove"></span>&nbsp;Inactivo</button>';
                                                                 }else{
                                                                   echo '  <button type="button" class="btn btn-success btn-xs"> <span class="glyphicon glyphicon-ok"></span>&nbsp;Activo</button>';
                                                                 } ?></td>
                                                            <td >
                                                                  <a class="delete-button btn btn-danger btn-sm glyphicon glyphicon-remove-circle"  value="<?php echo $registro->__get('FACCabId'); ?>"></a>
                                                                  <a href='ManFactura.php?fac=<?php echo $registro->__get('FACCabId'); ?>&opc=ver'
                                                                  class="btn btn-info btn-sm glyphicon glyphicon-eye-open"  value="<?php $registro->__get('FACCabId'); ?>"></a>
                                                                  <a class="update-button btn btn-success btn-sm glyphicon glyphicon-save-file"  value="<?php echo $registro->__get('FACCabId'); ?>" ></a>
                                                            </td>
                                                       </tr>
                                                       <?php
                                                            } ?>
                                                      </tbody>
                                                  </table>

                                          </div>

                                        </div>
                                        <a href="../Inicio.php" id="btnSalir" class="btn btn-primary"> <i class="glyphicon glyphicon-remove"></i> Regresar</a>
                                      </div>


                                  </div>
                            </div>
                        </div>
                      </div>
                  </div>
            </div>
        </div>

 <?php require_once("../../../../../Apps/Main/footer.php"); ?>
 <?php require_once("../paginacion.php"); ?>
 </body>
</html>
<!-- <script type="text/javascript" src="../../../../js/jquery.min.js"></script> -->
<script type="text/javascript">

    $(".delete-button").click(function(){
      var id = $(this).attr('value');
      //alert("Codigo del usuario seleccionado: "+id);
      if(confirm("Estas seguro, deseas anular factura?")){
          $(".delete-button").attr("href", "InterfazCabFactura.php?id="+id+"&est=0&opc=eliminar");
      }
      else{
          return false;
      }
    });

    $(".update-button").click(function() {
      var id = $(this).attr('value');
      //alert("Codigo del usuario seleccionado: "+id);
      if(confirm("¿Desea generar PDF de la Factura "+id+" ?")){
        $(".update-button").attr("href", "pdf.php?id="+id);
          /*$.ajax({
            url: 'pdf.php',
            type: 'POST',
            data: {'id': id}
          })
          .done(function() {
            console.log("success");
          })
          .fail(function() {
            console.log("error");
          })*/
      }
    });
</script>
