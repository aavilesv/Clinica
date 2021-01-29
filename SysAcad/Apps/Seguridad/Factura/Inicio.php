<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Modulo de Facturacion</title>
     <?php
     $ruta = "../../";
     require_once("../Main/head.php");
     ?>
  </head>
  <body>

  <?php require_once("../Main/header.php");?>



  <div id="page-wrapper">
    <div class="row-fluid">
        <div class="span12">
            <ul class="breadcrumb">
                <li><a href= " <?php echo $ruta;?>Apps/Main/index.php">Inicio</a><span class="divider"></span></li>
                <li><a href="javascript:window.location.reload();" class="active">Facturacion</a> <span class="divider">/</span></li>
            </ul>
        </div>
    </div>

      <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa  fa-save   fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">Factura</div>
                        </div>
                    </div>
                </div>
                <a <?php echo "href=../Factura/Vista/ListarFacturas.php";?>>
                        <div class="panel-footer">
                        <span class="pull-left">Ver Detalles</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary ">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">

                            <i class="fa fa-users fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">Cliente</div>
                        </div>
                    </div>
                </div>
                <a <?php echo "href=../Factura/Vista/ListarCliente.php";?>>
                        <div class="panel-footer">
                        <span class="pull-left">Ver Detalles</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
      </div><!-- /.row -->
  </div> <!-- /#page-wrapper -->
  <?php require_once("../Main/footer.php"); ?>
</body>
</html>
