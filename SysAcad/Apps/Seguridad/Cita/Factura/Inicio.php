<?php
session_start();
// $_SESSION['id_rol']=$_GET['rol'];
// $_SESSION['n_usuario']=$_GET['usua'];
// $_SESSION['foto']=$_GET['imagen'];
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Modulo de Facturacion</title>
     <?php
     $rutaValidacion="../../../../";
     $rutaFoto="../../";
     $ruraPerfil="../../";
     $rut="../../../";
     $ruta = "../../../../";
     require_once("../../../Main/head.php");
     ?>
  </head>
  <body>

  <?php require_once("../../../Main/header.php");?>

  <div id="page-wrapper">
    <div class="row-fluid">
        <div class="span12">
            <ul class="breadcrumb">
                <li><a href= " <?php echo $ruta;?>Apps/Main/vista/menu.php">Inicio</a><span class="divider"></span></li>
                <li><a href= " <?php echo $ruta;?>Apps/seguridad/farmacia/inicio.php">Farmacia</a><span class="divider"></span></li>
                <li><a href="javascript:window.location.reload();" class="active">Facturacion</a> <span class="divider">/</span></li>
            </ul>
        </div>
    </div>


        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <i class="fa fa-save fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">Factura</div>
                            <div>Grupos Facturas</div>
                        </div>
                    </div>
                </div>
                <!-- <a href="../Factura/Vista/ListarFacturas.php?usua=<?php echo $_SESSION['n_usuario'];?>&rol=<?php echo $_SESSION['id_rol'];?>&imagen=<?php echo $_SESSION['foto'];?>"> -->

                <a href="../Factura/Vista/ListarFacturas.php">
                        <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <!-- <?php echo $_SESSION['n_usuario']; ?> -->
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow ">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <i class="fa  fa-users   fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">Cliente</div>
                            <div>Grupos Clientes</div>
                        </div>
                    </div>
                </div>
                <a  href="../Factura/Vista/ListarCliente.php">
                        <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

  </div> <!-- /#page-wrapper -->
  <?php require_once("../../../Main/footer.php"); ?>
</body>
</html>
