
<?php
session_start();
require_once('../Controlador/CtrModulo.php');

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Lista de Proveedores</title>
  <?php
  $rutaValidacion="../../../";
  $rutaFoto="../../";
  $ruraPerfil="../../";
  $rut="../../";
  $ruta = "../../../../";
  require_once("../../../../Apps/Main/head.php");?>

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
                <li><a href= " <?php echo $ruta;?>Apps/main/vista/seguridad.php"> Seguridad</a><span class="divider"></span></li>
                <li><a href="javascript:window.location.reload();" class="active"> Modulos</a> <span class="divider">/</span></li>
              </ul>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <h1 class="page-header">Modulos</h1>
            </div><!-- /.col-lg-12 -->
          </div>

          <div class="container-fluid">
            <div class="row">
              <div class="panel panel-default panel-table panel-danger">



                <div class="panel-body">
                  <div class="row"><!-- Cuerpo de Tabla-->
                    <div class="col-sx-12 col-md-12 table-responsive">

                      <table id="modulos" class="table table-bordered table-hover table-condensed table-fixed" >
                        <thead>
                          <tr >
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Logo</th>
                            <th>Ruta</th>
                            <th>color</th>
                            <th>Acciones</th>

                          </tr>
                        </thead>
                        <tbody>
                          <?php

                          $ctrRol = new CtrModulo();
                          $registros = $ctrRol->getModulos();
                          foreach ($registros as $registro) {
                            ?>
                            <tr>
                              <td><?php echo $registro->__get('idModulo'); ?></td>
                              <td><?php echo $registro->__get('modDescripcion'); ?></td>
                              <td><?php echo $registro->__get('modFoto'); ?></td>
                              <td align='center'><i class="fa <?php echo $registro->__get('codigo').' fa-2x'; ?>"></i></td>
                              <td><?php echo $registro->__get('modNombre'); ?></td>
                              <td><div class="panel panel-<?php echo $registro->__get('color'); ?>"><div class="panel-heading"></div></div></td>

                            </tr>
                            <?php
                          } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
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
    $('#modulos').DataTable({
      responsive: true
    });
  });
</script>
</body>
</html>
