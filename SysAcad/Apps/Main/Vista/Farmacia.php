<?php
require_once("../Controlador/CtrLogin.php"); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <?php
  $rutaFoto="../";
  $ruraPerfil="../../seguridad/";
  $rut="../../";
  $ruta = "../../../";
  $u = "../../../";
  //require_once("validarsession.php");
  // if (empty($_SESSION['id_modulo'])) {
    $_SESSION['id_modulo'] = $_GET['id'];
  // }
  require_once("../head.php");
  $cargarmenu = new CtrLogin();
  $crgrol = $cargarmenu->consultarrolesmodulos($_SESSION['id_rol']);
  ?>
</head>
<body>

  <?php

  require_once("../header.php");
  ?>
  <div id="page-wrapper">
    <div class="row-fluid">
      <div class="span12">
        <ul class="breadcrumb">
          <li><a href= " <?php echo $ruta; ?>Apps/Main/Vista/Menu.php">Inicio</a><span class="divider"></span></li>
          <li><a href= " <?php echo $ruta; ?>Apps/Main/Vista/Farmacia.php">Farmacia</a><span class="divider"></span></li>
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Farmacia</h1>
      </div><!-- /.col-lg-12 -->
    </div><!-- /.row -->
    <div class="row">
      <div class="col-lg-12">
        <?php
        foreach ($crgrol as $crgrolvalue) {
          if ($crgrolvalue != '') {
            $cargarmenu1 = new CtrLogin();
            $modul = $cargarmenu1->getmodulos($crgrolvalue['idModulo'], 1);
            foreach ($modul as $modulvalue) {
              if ($modulvalue != '') {
                if (($crgrolvalue['estado'] == 1 ||$crgrolvalue['estado'] == 5)  && $_SESSION['id_modulo'] == $modulvalue['modPadre']) {
                  ?>
                  <div class="col-lg-4 col-md-6">
                    <div class="panel panel-<?php echo $modulvalue['color']; ?>">
                      <div class="panel-heading">
                        <div class="row">
                          <div class="col-xs-6" style="height:100px">
                            <!--aki se edita los iconos guardados-->
                            <i class='<?php echo "fa " . $modulvalue['modFoto'] . " fa-5x"; ?>'></i>
                          </div>
                          <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $modulvalue['modNombre'] ?></div>
                            <div><?php echo $modulvalue['modDescripcion'] ?></div>
                          </div>
                        </div>
                      </div>
                      <a   <?php echo "href=$ruta" . $modulvalue['codigo'] . "?id=" . $modulvalue['idModulo']; ?>>
                        <div class="panel-footer">
                          <span class="pull-left">Ver</span>
                          <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                          <div class="clearfix"></div>
                        </div>
                      </a>
                    </div>
                  </div>
                  <?php
                }
              }
            }
          }
        }
        ?>

      </div><!-- /.row -->
    </div> <!-- /#page-wrapper -->
  </div>
  <?php require_once("../footer.php"); ?>
</body>
</html>
