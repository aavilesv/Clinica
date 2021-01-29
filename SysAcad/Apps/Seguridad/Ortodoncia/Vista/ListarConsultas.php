<?php
session_start();
require_once('../Controlador/CtrConsulta.php');

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
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <br> <br>
          <div class="row-fluid">
            <div class="span12">
              <ul class="breadcrumb list-group-item-success">
                <li><a href= " <?php echo $ruta; ?>Apps/Main/vista/menu.php"> Inicio</a><span class="divider"></span></li>
                <li><a href= " <?php echo $ruta;?>Apps/seguridad/Ortodoncia/inicio.php"> Ortodoncia</a><span class="divider"></span></li>
                <li><a href="javascript:window.location.reload();" class="active"> Clinicas</a> <span class="divider">/</span></li>
              </ul>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <h1 class="page-header">Consultas</h1>
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
                              <a href="ManConsulta.php?opc=nuevo" class="btn btn-primary">
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
                      <?php //$_SESSION['id_CabConsulta']='12';
                      //echo $_SESSION['idCabConsulta']; ?>
                      <table id="clinica"class="table table-bordered table-hover table-condensed table-fixed">
                        <thead>
                          <tr >
                            <th>Codigo</th>
                            <th>Paciente</th>
                            <th>Medico</th>
                            <th>Clinica</th>
                            <th>Fecha</th>
                            <th>Accion</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          //equire_once('../Controlador/CtrRol.php');
                          $ctrInsumo = new CtrConsulta();
                          $registros = $ctrInsumo->getConsultas();
                          foreach ($registros as $registro):
                            ?>
                            <tr>
                              <td><?php echo $registro->__get('idCabConsulta'); ?></td>
                              <td><?php echo $registro->__get('PAC_Id'); ?></td>
                              <td><?php echo $registro->__get('PRO_Id'); ?></td>
                              <td><?php echo $registro->__get('CLI_Id'); ?></td>
                              <td><?php echo $registro->__get('fecha'); ?></td>

                              <td >
                                <a href='ManConsulta.php?usua=<?php echo $registro->__get('idCabConsulta'); ?>&opc=editar'
                                  class="btn btn-primary btn-sm glyphicon glyphicon glyphicon-pencil" title="Editar consulta"></a>

                                  <a href='InterfazClinica.php?id=<?php echo $registro->__get('idCabConsulta'); ?>&opc=eliminar'
                                    class="btn btn-danger btn-sm glyphicon glyphicon glyphicon-trash" title="Eliminar consulta"></a>

                                    <a href='ManConsulta.php?usua=<?php echo $registro->__get('idCabConsulta'); ?>&opc=ver'
                                      class="btn btn-info btn-sm glyphicon glyphicon-eye-open" title="Ver Consulta"></a>

                                      <a href='listaInsumos.php?usua=<?php echo $registro->__get('idCabConsulta'); ?>&opc=ver'
                                        class="btn btn-warning btn-sm glyphicon glyphicon-plus" title="Agregar insumo"></a>

                                        <a href='listaInsumos.php?usua=<?php echo $registro->__get('idCabConsulta'); ?>&opc=agregar'
                                          class="btn btn-success btn-sm glyphicon glyphicon-resize-full" title="Eliminar insumo"></a>
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
            <script>
            $(document).ready(function() {
              $('#clinica').DataTable({
                responsive: true
              });
            });
            </script>
          </body>
          </html>
