<?php session_start(); ?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
     <?php
     $rutaValidacion="../../../";
     $rutaFoto="../";
     $ruraPerfil="../";
     $rut="../../";
     $ruta = "../../../";
     require_once("../../main/head.php");
     ?>
  </head>
  <body>

  <?php
   /*session_start();
   $_SESSION['rutaServer']   = "localhost";
   $_SESSION['rutaProyecto'] = $_SESSION['rutaServer']."/PryClasesPOOIII/SysAcad";
   $_SESSION['rutaApps']     = $_SESSION['rutaProyecto']."/Apps";
   $_SESSION['rutaJs']       = $_SESSION['rutaProyecto']."/js";
   $_SESSION['rutaCss']      = $_SESSION['rutaProyecto']."/css";
   $_SESSION['rutaDist']     = $_SESSION['rutaProyecto']."/dist";
   $_SESSION['rutaLess']     = $_SESSION['rutaProyecto']."/less";
   $_SESSION['rutaVendor']   = $_SESSION['rutaProyecto']."/vendor";
   echo $_SESSION['rutaApps'];*/
  ?>
  <?php require_once("../../main/header.php");?>



  <div id="page-wrapper">
      <div class="row">
          <div class="col-lg-12">
              <h1 class="page-header"> <i class="glyphicon glyphicon-plus"></i> Farmacia</h1>
          </div><!-- /.col-lg-12 -->
      </div><!-- /.row -->

      <div class="row">
        <!--Panel de Proveedor-->
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-1">
                            <i class="fa fa-ambulance fa-5x"></i>
                        </div>
                        <div class="col-xs-11 text-right">
                            <div class="huge">Proveedores</div>
                            <div>Nuevos proveedores!</div>
                        </div>
                    </div>
                </div>
                <a <?php echo "href=vista/ListarProveedor.php";?>>
                        <div class="panel-footer">
                        <span class="pull-left"> <i class="fa fa-ambulance"></i> Ver Proveedores</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>

            </div>
        </div>

        <!--Panel de Producto-->
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-1">
                            <i class="fa fa-stethoscope fa-5x"></i>
                        </div>
                        <div class="col-xs-11 text-right">
                            <div class="huge">Productos</div>
                            <div>Nuevos productos!</div>
                        </div>
                    </div>
                </div>
                <a <?php echo "href=Vista/ListarProducto.php";?>>
                        <div class="panel-footer">
                        <span class="pull-left"> <i class="fa fa-stethoscope"></i> Ver Productos</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>

            </div>
        </div>

        <!--Panel de Compra-->
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-1">
                            <i class="fa fa-shopping-cart fa-5x"></i>
                        </div>
                        <div class="col-xs-11 text-right">
                            <div class="huge">Compras</div>
                            <div>Nuevas compras!</div>
                        </div>
                    </div>
                </div>
                <a <?php echo "href=Vista/ListarCompra.php";?>>
                        <div class="panel-footer">
                        <span class="pull-left"> <i class="fa fa-shopping-cart"></i> Ver Compras</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>

            </div>
        </div>

        <!--Panel de DEvoluciones-->
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-1">
                            <i class="fa fa-history fa-5x"></i>
                        </div>
                        <div class="col-xs-11 text-right">
                            <div class="huge">Devoluciones</div>
                            <div>Nuevas Devoluciones!</div>
                        </div>
                    </div>
                </div>
                <a <?php echo "href=Vista/ListarDevolucion.php";?>>
                        <div class="panel-footer">
                        <span class="pull-left"> <i class="fa fa-history"></i> Ver Devoluciones</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>

            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-1">
                            <i class="fa fa-file-o fa-5x"></i>
                        </div>
                        <div class="col-xs-11 text-right">
                            <div class="huge">Facturacion</div>
                            <div>Emitir Facturas</div>
                        </div>
                    </div>
                </div>
                <a <?php echo "href=../modulo/factura/inicio.php";?>>
                        <div class="panel-footer">
                        <span class="pull-left"> <i class="fa fa-file-o"></i> Ver Facturas</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>

            </div>
        </div>


      </div><!-- /.row -->



  </div> <!-- /#page-wrapper -->
  <?php require_once("../../main/footer.php"); ?>
</body>
</html>
