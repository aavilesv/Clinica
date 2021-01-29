<?php
session_start();
 ?><!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Registro de Cliente</title>

  <?php
  $rutaValidacion="../../../../../";
  $rutaFoto="../../../";
  $ruraPerfil="../../../";
  $rut="../../../../";
  $ruta = "../../../../../";
  require_once("../../../../../Apps/Main/head.php");
  require_once('../Controlador/CtrCliente.php');
  ?>

</head>
<body>
  <?php
  require_once("../../../../../Apps/Main/header.php");
  if (isset($_GET['opc'])) {
    switch ($_GET['opc']) {
      case 'nuevo':
      # Para nuevo registro
      $FACCliId='';
      $FACCliNombre="";
      $FACCliApellido="";
      $FACCliCedula='';
      $FACCliDireccion='';
      $FACCliCelular='';
      $FACCliEmail='';
      $FACCliUsuarioCrea = '';
      $FACCliUsuaModif="";
      $FACCliEstado='';
      $FACCliFechaCrea='';
      $FACCliFechaFechaUltima='';
      $hidden='';
      $disabled = '';
      break;
      case 'editar':
      # Para Editar datos
      $Cliente = new CtrCliente();
      $registros = $Cliente->getCliente($_GET['usua']);
      $FACCliId=$registros->__get('FACCliId');
      $FACCliNombre=$registros->__get('FACCliNombre');
      $FACCliApellido=$registros->__get('FACCliApellido');
      $FACCliCedula=$registros->__get('FACCliCedula');
      $FACCliDireccion=$registros->__get('FACCliDireccion');
      $FACCliCelular=$registros->__get('FACCliCelular');
      $FACCliEmail=$registros->__get('FACCliEmail');
      $FACCliUsuarioCrea = $registros->__get('FACCliUsuarioCrea');
      $FACCliUsuaModif=$registros->__get('FACCliUsuaModif');
      $FACCliEstado=$registros->__get('FACCliEstado');
      $FACCliFechaCrea=$registros->__get('FACCliFechaCrea');
      $FACCliFechaFechaUltima=$registros->__get('FACCliFechaFechaUltima');
      $hidden='hidden';
      $disabled = '';
      break;
      case 'ver':
      # Para Visualizar los datos
      $Cliente = new CtrCliente();


      $registros = $Cliente->getCliente($_GET['usua']);
      $FACCliId=$registros->__get('FACCliId');
      $FACCliNombre=$registros->__get('FACCliNombre');
      $FACCliApellido=$registros->__get('FACCliApellido');
      $FACCliCedula=$registros->__get('FACCliCedula');
      $FACCliDireccion=$registros->__get('FACCliDireccion');
      $FACCliCelular=$registros->__get('FACCliCelular');
      $FACCliEmail=$registros->__get('FACCliEmail');
      $FACCliUsuarioCrea = $registros->__get('FACCliUsuarioCrea');
      $FACCliUsuaModif=$registros->__get('FACCliUsuaModif');
      $FACCliEstado=$registros->__get('FACCliEstado');
      $FACCliFechaCrea=$registros->__get('FACCliFechaCrea');
      $FACCliFechaFechaUltima=$registros->__get('FACCliFechaFechaUltima');

      $hidden='';
      $disabled = 'disabled';
      break;
    }
  }
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
                <li><a href= " <?php echo $ruta;?>Apps/seguridad/farmacia/inicio.php">Farmacia</a><span class="divider"></span></li>
                <li><a href= " <?php echo $ruta;?>Apps/Factura/Inicio.php">Facturacion</a><span class="divider"></span></li>
                <li><a href= " <?php echo $ruta;?>Apps/Seguridad/modulo/Factura/Vista/ListarCliente.php">Cliente</a><span class="divider"></span></li>
                <li><a href="javascript:window.location.reload();" class="active">Registro de Cliente</a> <span class="divider">/</span></li>
              </ul>
            </div>
          </div>

          <div class="row-fluid">
            <div class="col-lg-12">
              <h1 class="page-header">Registro  de Cliente</h1>
            </div><!-- /.col-lg-12 -->
          </div><!-- /.row -->

          <div class="container-fluid">
            <div class="col-xs-12 col-md-2"></div>
            <div class="col-xs-12 col-md-7">
              <br>
              <div class="panel panel-default">
                <div class="panel-heading">
                  Registro de Cliente
                </div>

                <div class="panel-body">
                  <div class="row">
                    <div class="col-lg-10">
                      <form class="form-horizontal" name="frmUsuario"  method="post" action="InterfazCliente.php">
                        <div class="form-group">
                          <div class="col-md-9">
                            <input type="hidden" class="form-control " name="FACCliFechaCrea" maxlength="45"
                            id="FACCliFechaCre" required="true" value='<?= $FACCliFechaCrea; ?>'>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-9">
                            <input type="hidden" class="form-control " name="FACCliId" maxlength="45"
                            id="FACCliId" required="true" value='<?= $FACCliId; ?>'>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="col-md-9">
                            <input type="hidden" class="form-control " name="FACCliFechaFechaUltima" maxlength="45"
                            id="FACCliFechaFechaUltim" required="true" value='<?= $FACCliFechaFechaUltima; ?>'>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Nombre:</label>
                          <div class="col-md-9">
                            <input type="text" class="form-control " name="FACCliNombre" maxlength="20"
                            id="Nombre" value ='<?= $FACCliNombre; ?>' required="true" <?php echo $disabled ?>>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Apellido:</label>
                          <div class="col-md-9">
                            <input type="text" class="form-control " name="FACCliApellido" maxlength="50"
                            id="Apellido" value ='<?= $FACCliApellido; ?>' required="true" <?php echo $disabled ?>>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Cedula:</label>
                          <div class="col-md-9">
                            <input type="text" class="form-control " name="FACCliCedula" maxlength="20"
                            id="Cedula" value ='<?= $FACCliCedula; ?>' required="true" <?php echo $disabled ?>>
                          </div>
                        </div>



                        <div class="form-group">
                          <label class="control-label col-md-3">Dirección:</label>
                          <div class="col-md-9">
                            <input type="text" class="form-control " name="FACCliDireccion" maxlength="50"
                            id="Direccion" value ='<?= $FACCliDireccion; ?>' required="true" <?php echo $disabled ?>>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Celular:</label>
                          <div class="col-md-9">
                            <input type="text" class="form-control " name="FACCliCelular" maxlength="50"
                            id="Celular" value ='<?= $FACCliCelular; ?>' required="true" <?php echo $disabled ?>>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3">Email:</label>
                          <div class="col-md-9">
                            <input type="text" class="form-control " name="FACCliEmail" maxlength="50"
                            id="Email" value ='<?= $FACCliEmail; ?>' required="true" <?php echo $disabled ?>>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-9">
                            <input type="hidden" class="form-control " name="FACCliUsuarioCrea" maxlength="45"
                            id="FACCliUsuarioCre" required="true" value='<?= $FACCliUsuarioCrea; ?>'>
                            <input type="hidden" class="form-control " name="FACCliUsuaModif" maxlength="45"
                            id="FACCliUsuaModi" required="true" value='<?= $FACCliUsuaModif; ?>'>

                            <input type="hidden" class="form-control " name="FACCliEstado" maxlength="45"
                            id="FACCliEstad" required="true" value='<?= $FACCliEstado; ?>'>
                          </div>
                        </div>


                        <?php if (isset($_GET['opc']) && ($_GET['opc'] =='nuevo' || $_GET['opc'] =='editar')) {
                          ?>
                          <div class="btn btn-group col-md-offset-3 ">
                            <div class="col-md-2">
                              <button type="submit" class=" btn btn-primary "><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
                            </div>

                            <div class="col-md-2 col-md-offset-3">
                              <a href="ListarCliente.php" id="btnSalir" class="btn btn-danger"> <i class="glyphicon glyphicon-remove"></i> Cancelar</a>
                            </div>
                          </div>
                          <?php
                        } else {
                          ?>
                          <div class="col-md-2 col-md-offset-3 ">
                            <a href="ListarCliente.php" id="btnSalir" class="btn btn-primary" <i class="glyphicon glyphicon-remove"></i> Regresar</a>
                          </div>
                          <?php
                        } ?>
                        <input type="hidden"  name="opc" id="opc" value='<?=$_GET['opc'];?>' /><br>
                      </form>
                    </div>
                  </div>
                </div>
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


      <?php require_once("../../../../../Apps/Main/footer.php"); ?>

    </body>
    </html>
