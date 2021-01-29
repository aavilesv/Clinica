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

  <?php
  $idCabConsulta=$_GET['usua'];
  $ctrInsumo = new CtrOrtodoncia();
  $registros = $ctrInsumo->getInsumosCab($idCabConsulta);
  if (isset($_GET['opc'])) {
    switch ($_GET['opc']) {
      case 'ver':
      $registros = $ctrInsumo->getInsumos();
      $ver=true;
      break;
      case 'agregar':
      $registros = $ctrInsumo->getInsumosCab($idCabConsulta);
        $ver=false;
      break;
    }
  } ?>
  <div id="page-wrapper">
    <div class="container-fluid ">
      <div class="row">
        <div class="col-lg-12">
          <br> <br>
          <div class="row-fluid">
            <div class="span12">
              <ul class="breadcrumb list-group-item-success">
                <li><a href= " <?php echo $ruta; ?>Apps/Main/vista/menu.php"> Inicio</a><span class="divider"></span></li>
                <li><a href= " <?php echo $ruta;?>Apps/main/vista/Ortodoncia.php"> Ortodoncia</a><span class="divider"></span></li>
                <li><a href="<?php echo $ruta;?>Apps/seguridad/Ortodoncia/vista/ListarConsultas.php"> Listar Consultas</a> <span class="divider">/</span></li>
                <li><a href="javascript:window.location.reload();" class="active"> Listar de Insumos</a> <span class="divider">/</span></li>
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

                        </div>
                      </div>
                    </div>
                  </div> <!-- Fin Criterios de Búsqueda-->
                </div>



                <div class="panel-body">
                  <div class="row"><!-- Cuerpo de Tabla-->
                    <div class="col-sx-12 col-md-12 table-responsive">

                      <table id="insumos"class="table table-bordered table-hover table-condensed table-fixed" style="width:80%">
                        <thead>
                          <tr >
                            <th>Codigo</th>
                            <th>Insumo</th>
                            <th>foto</th>
                            <th>Accion</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php

                          //equire_once('../Controlador/CtrRol.php');

                          foreach ($registros as $registro):
                            ?>
                            <tr>
                              <td><?php echo $registro->__get('idInsumos'); ?></td>
                              <td><?php echo $registro->__get('Insumoscol'); ?></td>
                              <td><center><img class="img img-circle" src="<?php echo $registro->__get('fotoInsumo'); ?>" height="40px"></center></td>

                              <td align='center'>
                                <?php if($ver){ ?>
                                <a href='InterfazInsumo.php?id=<?php echo $idCabConsulta ?>&insumo=<?php echo $registro->__get('idInsumos'); ?>&opc=insumo'
                                  class="btn btn-primary btn-sm glyphicon glyphicon glyphicon-plus"></a>
                                <?php }else{ ?>
                                <a href='InterfazInsumo.php?id=<?php echo $idCabConsulta ?>&insumo=<?php echo $registro->__get('idInsumos'); ?>&opc=eliminsumo'
                                  class="btn btn-danger btn-sm glyphicon glyphicon glyphicon-minus"></a>
                                <?php } ?>
                                </td>
                                  </tr>
                                  <?php
                                  endforeach ?>
                                </tbody>
                              </table>
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
