<?php session_start();
require_once('../Controlador/CtrConsulta.php'); ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Lista de Usuarios</title>
        <?php
        $rutaValidacion="../../../../";
        $rutaFoto="../../";
        $ruraPerfil="../../";
        $rut="../../../";
        $ruta = "../../../../";
        require_once("../../../../Apps/Main/head.php");
        ?>

    </head>

    <body>
        <?php
        if (isset($_GET['q'])) {
            if ($_GET['q'] == '') {
                $q = '';
            } else {
                $ctrUsuario = new CtrConsulta();
                $registros = $ctrUsuario->getUsu($_GET["q"]);
                $q = $_GET["q"];
                $desde = $_GET['desde'];
                $hasta = $_GET['hasta'];
                $id = $registros->__get('PAC_Id');
                $nombre = $registros->__get('PAC_Nombre');
                $apellido = $registros->__get('PAC_Apellido');
                  $foto = $registros->__get('PAC_Foto');
            }
        } else {
            if (isset($_GET['usua'])) {
                if ($_GET['usua'] == '') {

                } else {
                    $q = '';
                    $desde='';
                    $hasta='';
                    $ctrUsuario = new CtrConsulta();
                    $registros = $ctrUsuario->getUsu($_GET["usua"]);
                    $id = $registros->__get('PAC_Id');
                    $nombre = $registros->__get('PAC_Nombre');
                    $apellido = $registros->__get('PAC_Apellido');
                      $foto = $registros->__get('PAC_Foto');
                }
            }
        }
        ?>
        <?php require_once("../../../../Apps/Main/header.php"); ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <br> <br>
                        <div class="row-fluid">
                            <div class="span12">
                                <ul class="breadcrumb">
                                    <li><a href= " <?php echo $ruta; ?>Apps/Main/vista/menu.php">Inicio</a><span class="divider"></span></li>
                                    <li><a href= " <?php echo $ruta; ?>Apps/seguridad/HistoriaClinica/Vista/ListarUsuariosCitas.php">Historia Clinica</a><span class="divider"></span></li>
                                    <li><a href="javascript:window.location.reload();" class="active">Historia Clinica Paciente</a> <span class="divider">/</span></li>
                                </ul>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="page-header">Historia Clinica: <small>Citas</small></h1>
                            </div><!-- /.col-lg-12 -->
                        </div><!-- /.row -->
                        <div class="container-fluid">
                            <div class="row">
                                <div class="panel panel-default panel-table panel-success">
                                    <div class="panel-heading">
                                        <div class="row"> <!-- Criterios de Búsqueda-->
                                            <div class="col col-xs-9">
                                                <form method="GET" action="">
                                                  <input type="hidden" name="q" id="q" value=<?= $id; ?>
                                                  <fieldset>
                                                      <div class="col col-xs-1">
                                                          <label for="desde">Desde:</label>
                                                      </div>
                                                      <div class="col col-xs-3">
                                                          <input id="desde" name="desde" class="form-control"  type="date" value='<?= $desde; ?>' >
                                                      </div>
                                                      <div class="col col-xs-2">
                                                          <label for="hasta">Hasta:</label>
                                                      </div>
                                                      <div class="col col-xs-3">
                                                          <input id="hasta" name="hasta" class="form-control" type="date" value='<?= $hasta; ?>' >
                                                      </div>
                                                        <button class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
                                                  </fieldset>
                                            </div>
                                            <div class="col col-xs-3 text-right">
                                                <div class="btn-group">
                                                    <a href="javascript:window.location.reload();" class="btn btn-primary">
                                                        <i class="glyphicon glyphicon-refresh"> </i>
                                                        Actualizar
                                                    </a>
                                                </div>
                                            </div>
                                        </div> <!-- Fin Criterios de Búsqueda-->
                                        <br>
                                        </form>
                                    </div>
                                    <br>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-6" >
                                                <?php ?>
                                                <center>  <img class="img-rounded logomain" alt="Sin imagen" width="400px" height="400px" src="<?php echo $foto; ?>" />
                                                <?php ?>
                                            </div>
                                            <div class="col col-lg-6">
                                                <h1 class="page-header">Datos del Paciente:</h1>

                                                    <h3 class="page-header">Nombre:<small> <?= $nombre; ?></small></h3>
                                                    <h3 class="page-header">Apellido:<small> <?= $apellido; ?></small></h3>
                                                    <h3 class="page-header">H.Clinica:<small> <?= $id; ?></small></h3>



                                            </div>
                                        </div>
                                    </div>


                                    <div class="panel-body">
                                        <div class="row"><!-- Cuerpo de Tabla-->
                                            <div class="col-sx-12 col-md-12 table-responsive">
                                                <table class="table table-bordered table-hover table-condensed table-fixed">
                                                    <thead>
                                                        <tr>
                                                            <th>Numero Cita</th>
                                                            <th>Fecha de Cita</th>
                                                            <th>Doctor</th>
                                                            <th>Duracion</th>
                                                            <th>Estado</th>
                                                            <th>Acción</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        if($q!='' && $desde!=''&&$hasta!=''){
                                                          $ctrUsuario = new CtrConsulta();
                                                          $reg = $ctrUsuario->obtenerCitasFecha($q,$desde,$hasta);
                                                          foreach ($reg as $registro) {
                                                              ?>
                                                              <tr>
                                                                  <td><?php echo $registro->__get('CIT_Id'); ?></td>
                                                                  <td><?php echo $registro->__get('CIT_Fecha'); ?></td>
                                                                  <td><?php echo $registro->__get('PRO_Nombre'); ?> <?php echo $registro->__get('PRO_Apellido'); ?></td>

                                                                  <td><?php echo $registro->__get('CIT_Duracion'); ?></td>
                                                                  <?php
                                                                  if ($registro->__get('CIT_Estado') == 1) {?>
                                                                      <td><center><span class="label label-success" title="Activo">Activo</span></center></td>
                                                                      <?php
                                                                  } elseif ($registro->__get('CIT_Estado') == 0) {?>

                                                                      <td><center><span class="label label-danger" title="Activo">Inactivo</span></center></td>
                                                                      <?php
                                                                  }
                                                                  ?>
                                                                  <td >
                                                                      <!--Botón visualizar registro -->
                                                          <center> <a href='ManUsuario.php?usua=<?php echo $registro->__get('CIT_Id'); ?>&opc=ver'
                                                                      class="btn btn-info btn-sm glyphicon glyphicon-eye-open"  value=""></a></center>
                                                          </td>
                                                          </tr>
                                                        <?php  }

                                                        }else{
                                                        $ctrUsuario = new CtrConsulta();
                                                        $reg = $ctrUsuario->obtenerCitas($id);
                                                        foreach ($reg as $registro) {
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $registro->__get('CIT_Id'); ?></td>
                                                                <td><?php echo $registro->__get('CIT_Fecha'); ?></td>
                                                                <td><?php echo $registro->__get('PRO_Nombre'); ?> <?php echo $registro->__get('PRO_Apellido'); ?></td>

                                                                <td><?php echo $registro->__get('CIT_Duracion'); ?></td>
                                                                <?php
                                                                if ($registro->__get('CIT_Estado') == 1) {?>
                                                                    <td><center><span class="label label-success" title="Activo">Activo</span></center></td>
                                                                    <?php
                                                                } elseif ($registro->__get('CIT_Estado') == 0) {?>

                                                                    <td><center><span class="label label-danger" title="Activo">Inactivo</span></center></td>
                                                                    <?php
                                                                }
                                                                ?>
                                                                <td >
                                                                    <!--Botón visualizar registro -->
                                                        <center> <a href='ManUsuario.php?usua=<?php echo $registro->__get('CIT_Id'); ?>&opc=ver'
                                                                    class="btn btn-info btn-sm glyphicon glyphicon-eye-open"  value=""></a></center>
                                                        </td>
                                                        </tr>
                                                        <?php
                                                      }
                                                    }
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div><!-- fin del body-->

                                    <div class="panel-footer">
                                        <div class="row"> <!-- Paginación de Registros-->
                                            <div class="col col-xs-4">Page 1 of 5 </div>
                                            <div class="col col-xs-8">
                                                <ul class="pagination hidden-xs pull-right">
                                                    <li><a href="#">1</a></li>
                                                    <li><a href="#">2</a></li>
                                                    <li><a href="#">3</a></li>
                                                    <li><a href="#">4</a></li>
                                                    <li><a href="#">5</a></li>
                                                </ul>
                                                <ul class="pagination visible-xs pull-right">
                                                    <li><a href="#">«</a></li>
                                                    <li><a href="#">»</a></li>
                                                </ul>
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
    </body>
</html>
<script type="text/javascript">

    $(".delete-button").click(function () {
        var id = $(this).attr('value');
        var usuario = $(this).attr('id');
        //alert("Codigo del usuario seleccionado: "+id);
        if (confirm("Estas seguro, deseas elmininar usuario: [" + usuario.toUpperCase() + "] ?")) {
            $(".delete-button").attr("href", "InterfazUsuario.php?id=" + id + "&opc=eliminar");
        }
        else {
            return false;
        }
    });
</script>
