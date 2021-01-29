<?php session_start();   ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Mantenimiento de Usuario</title>

  <?php
  $rutaValidacion="../../../../";
  $rutaFoto="../../";
  $ruraPerfil="../../";
  $rut="../../../";
  $ruta = "../../../../";
  require_once("../../../../Apps/Main/head.php");
  require_once('../Controlador/CtrPermisos.php');
  ?>

</head>
<body>
  <?php
  require_once("../../../../Apps/Main/header.php");
  if (isset($_GET['opc'])) {
    switch ($_GET['opc']) {
      case 'nuevo':
      $roles = '';
      $modulo = '';
      $disabled = '';
      $idrolmod = '';
      $nuevocheck = '';
      $modificarcheck = '';
      $eliminarcheck = '';
      $visualizarcheck = '';
      $Nuevo = '';
      $Modificar = '';
      $Eliminar = '';
      $Visualizar = '';
      $disabled = '';
      break;
      case 'editar':
      # Para Editar datos
      $usuario = new CtrPermisos();
      $registros = $usuario->getPermiso($_GET['usua']);
      foreach ($registros as $registro) {
        $idrolmod = $registro->__get('idRolMod');
        $roles = $registro->__get('idRol');
        $Moduloc = $registro->__get('idModulo');
        $Nuevo = $registro->__get('nuevo');
        $Modificar = $registro->__get('modificar');
        $Eliminar = $registro->__get('eliminar');
        $Visualizar = $registro->__get('visualizar');
      }
      $disabled = '';
      break;
      case 'ver':
      $usuario = new CtrPermisos();
      $registros = $usuario->getPermiso($_GET['usua']);
      foreach ($registros as $registro) {
        $idrolmod = $registro->__get('idRolMod');
        $roles = $registro->__get('idRol');
        $Moduloc = $registro->__get('idModulo');
        $Nuevo = $registro->__get('nuevo');
        $Modificar = $registro->__get('modificar');
        $Eliminar = $registro->__get('eliminar');
        $Visualizar = $registro->__get('visualizar');
      }
      $disabled = 'disabled';
      break;
    }
  }
  ?>
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">

          <br> <br>
          <div class="row-fluid">
            <div class="span12">
              <ul class="breadcrumb">
                <li><a href= " <?php echo $ruta; ?>Apps/Main/Login/Vista/Menu.php">Inicio</a><span class="divider"></span></li>
                <li><a href= " <?php echo $ruta; ?>Apps/Main/Login/Vista/Seguridad.php">Seguridad</a><span class="divider"></span></li>
                <li><a href= " <?php echo $ruta; ?>Apps/Seguridad/Permisos/Vista/ListarPermisos.php">Consultar permisos</a><span class="divider"></span></li>
                <li><a href="javascript:window.location.reload();" class="active">Mantenimiento permisos</a> <span class="divider">/</span></li>
              </ul>
            </div>
          </div>

          <div class="row-fluid">

            <div class="col-lg-12">
              <h1 class="page-header">Mantenimiento Usuario</h1>
            </div><!-- /.col-lg-12 -->
          </div><!-- /.row -->

          <div class="container-fluid">
            <div class="col-xs-12 col-md-2"></div>
            <div class="col-xs-12 col-md-7">
              <br>
              <div class="panel panel-default">
                <div class="panel-heading">
                  Registro de permisos
                </div>
                <div class="col-md-2"></div>
                <div class="panel-body">

                  <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-lg-8">
                      <form class="form-horizontal" id="frmManPermisos"  name="frmManPermisos"  method="post" action="InterfazPermisos.php">
                        <!--aki va el select de el rol-->
                        <div class="form-group">
                          <div class="col-md-12">
                            <label for="">Rol: </label>
                            <select class="form-control" id="rol" name="rol" class="form-control" <?php echo $disabled; ?>>
                              <option value="0">Ninguno</option>
                              <?php
                              //Cargar los roles del sistema
                              $rols = new CtrPermisos();
                              $rol = $rols->getRol();
                              foreach ($rol as $key => $values) {
                                if ($values['estado'] != 5) {
                                  if ($values['idRol'] != '') {
                                    if ($values['idRol'] == $roles) {
                                      echo "<option selected value=" . $values['idRol'] . ">" . $values['rolDescripcion'] . "</option>";
                                    } else {
                                      echo "<option  value=" . $values['idRol'] . ">" . $values['rolDescripcion'] . "</option>";
                                    }
                                  }
                                }
                              }
                              //fin de carga.
                              ?>
                            </select>
                          </div>
                        </div>
                        <!--aki va el select de el modulo-->
                        <div class="form-group">

                          <div class="col-md-12">
                            <label for="">Modulo: </label>
                            <select class="form-control" name="modulo" class="form-control " <?php echo $disabled; ?>>
                              <option value="0">Ninguno</option>
                              <?php
                              $moduls = new CtrPermisos();
                              $modulos = $moduls->getModulos();
                              foreach ($modulos as $key => $values) {
                                if ($values['idModulo'] != '') {
                                  if ($values['idModulo'] == $Moduloc) {
                                    echo "<option selected value=" . $values['idModulo'] . ">" . $values['modNombre'] . "</option>";
                                  } else {
                                    echo "<option  value=" . $values['idModulo'] . ">" . $values['modNombre'] . "</option>";
                                  }
                                }
                              }
                              ?>
                            </select>
                          </div>
                        </div>
                        <!--aki van los checkbox nuevo,editar,eliminar,visualizar-->
                        <div class="form-inline">
                          <div class="col-md-12">
                            <div class="col-md-3">
                              <div class="checkbox">
                                <?php if ($Nuevo == 1) {
                                  $nuevocheck = 'checked';
                                } else {
                                  $nuevocheck = '';
                                } ?>
                                <label for=""><input type="checkbox" name="Nuevo" id="Nuevo" <?php echo $nuevocheck; ?> <?php echo $disabled; ?>> Nuevo
                                </label>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="checkbox">
                                <?php if ($Modificar == 1) {
                                  $modificarcheck = 'checked';
                                } else {
                                  $modificarcheck = '';
                                } ?>
                                <label for=""><input type="checkbox" name="Modificar" id="Modificar" <?php echo $modificarcheck; ?> <?php echo $disabled; ?>> Modificar
                                </label>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="checkbox">
                                <?php if ($Eliminar == '1') {
                                  $eliminarcheck = 'checked';
                                } else {
                                  $eliminarcheck = '';
                                } ?>
                                <label for=""><input type="checkbox" name="Eliminar" id="Eliminar" <?php echo $eliminarcheck; ?> <?php echo $disabled; ?>> Eliminar
                                </label>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="checkbox">
                                <?php if ($Visualizar == '1') {
                                  $visualizarcheck = 'checked';
                                } else {
                                  $visualizarcheck = '';
                                } ?>
                                <label for=""><input type="checkbox" name="Visualizar" id="Visualizar" <?php echo $visualizarcheck; ?> <?php echo $disabled; ?>> Visualizar
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <br>
                        <br>
                        <?php if (isset($_GET['opc']) && ($_GET['opc'] == 'nuevo' || $_GET['opc'] == 'editar')) {
                          ?>
                          <div class="btn btn-group col-md-offset-3 ">
                            <div class="col-md-2">
                              <button type="submit" class=" btn btn-primary "><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
                            </div>

                            <div class="col-md-2 col-md-offset-3">
                              <a href="ListarPermisos.php" id="btnSalir" class="btn btn-danger"> <i class="glyphicon glyphicon-remove"></i> Cancelar</a>
                            </div>
                          </div>
                          <?php
                        } else {
                          ?>
                          <div class="col-md-2 col-md-offset-5">
                            <a href="ListarPermisos.php" id="btnSalir" class="btn btn-primary" <i class="glyphicon glyphicon-remove"></i> Regresar</a>
                          </div>
                        <?php }
                        ?>
                        <input type="hidden"  name="opc" id="opc" value='<?= $_GET['opc']; ?>' /><br>
                        <input type="hidden"  name="id" id="id" value='<?php echo $idrolmod; ?>' /><br>
                      </form>
                    </div>
                    <div class="col-md-2"></div>
                  </div>

                </div>
                <div class="col-md-2"></div>
                <div class="panel-footer">
                  <div class="row"> <!-- Paginación de Registros-->
                    <br>
                  </div>
                </div>
                <div class="col-xs-12 col-md-3"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php require_once("../../../../Apps/Main/footer.php"); ?>
    </body>
    </html>
