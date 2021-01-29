<?php session_start(); ?><!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Mantenimiento de Proveedores</title>

  <?php
  $rutaValidacion="../../../../";
  $rutaFoto="../../";
  $ruraPerfil="../../";
  $rut="../../../";
  $ruta = "../../../../";
  require_once("../../../../Apps/Main/head.php");
  require_once('../Controlador/ProveedorCTR.php');
  ?>

</head>
<body>
  <?php
  require_once("../../../../Apps/Main/header.php");
  if (isset($_GET['opc'])) {
    switch ($_GET['opc']) {
      case 'nuevo':
      # Para nuevo registro
        $ruc='';
        $razonSocial="";
        $telefono="";
        $email='';
        $direccion='';
        $imagen = '';
        $estado='';
        $hidden='';
        $disabled = '';
        $check = '';
      //$marcado = 'checked';    //la variable que pongas aqui tb tiene que ir abajo
        break;
      case 'editar':
      # Para Editar datos
        $proveedor = new ProveedorCTR();
        $registros = $proveedor->getBuscar($_GET['prov']);
        $ruc=$registros->__get('ruc');
        $razonSocial=$registros->__get('razonSocial');
        $telefono=$registros->__get('telefono');
        $email=$registros->__get('email');
        $direccion=$registros->__get('direccion');
        $imagen=$registros->__get('imagen');
        $estado = ($registros->__get('estado') == 1) ? 'checked': '';
        //$estado=$registros->__get('estado');
        $hidden='hidden';
        $disabled = '';
        $check = '';
      //$marcado = 'checked';
        break;
      case 'ver':
      # Para Visualizar los datos
        $proveedor = new ProveedorCTR();
        $registros = $proveedor->getBuscar($_GET['prov']);
        $ruc=$registros->__get('ruc');
        $razonSocial=$registros->__get('razonSocial');
        $telefono=$registros->__get('telefono');
        $email=$registros->__get('email');
        $direccion=$registros->__get('direccion');
        $imagen=$registros->__get('imagen');
        $estado=$registros->__get('estado');
        $hidden='';
        $disabled = 'disabled';
        break;
    }
  }
 require_once("../../../../Apps/Main/header.php"); ?>
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <br> <br>
          <div class="row-fluid">
            <div class="span12">
              <ul class="breadcrumb">
                <li><a href= " <?php echo $ruta;?>Apps/Main/vista/menu.php"><i class="glyphicon glyphicon-home"></i> Inicio</a><span class="divider"></span></li>
                <li><a href= " <?php echo $ruta;?>Apps/seguridad/farmacia/inicio.php"><i class="glyphicon glyphicon-plus"></i> Farmacia</a><span class="divider"></span></li>
                <li><a href= " <?php echo $ruta;?>Apps/Seguridad/Vista/ListarProveedor.php"><i class="glyphicon glyphicon-list-alt"></i> Lista de Proveedores</a><span class="divider"></span></li>
                <?php if ($hidden!=''): ?><li><a href="javascript:window.location.reload();" class="active"><i class="glyphicon glyphicon-pencil "></i> Editar Proveedor</a> <span class="divider">/</span></li> <?php endif ?>
                <?php if ($hidden!='hidden'): ?><li><a href="javascript:window.location.reload();" class="active"><i class="glyphicon glyphicon-shopping-cart"></i> Nuevo Proveedor</a> <span class="divider">/</span></li> <?php endif ?>
              </ul>
            </div>
          </div>
          <div class="row-fluid">
            <div class="col-lg-12">
              <?php if ($hidden!='hidden'): ?><h1 class="page-header"><i class="glyphicon glyphicon'shopping-cart"></i>Nuevo Proveedor</h1><?php endif; ?>
              <?php if ($hidden!=''): ?><h1 class="page-header"><i class="glyphicon glyphicon-pencil"></i>Mantenimiento de Proveedores</h1><?php endif; ?>
            </div><!-- /.col-lg-12 -->
          </div><!-- /.row -->

          <div class="container-fluid">
            <div class="col-xs-12 col-md-2"></div>
            <div class="col-xs-12 col-md-7">
              <br>
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <?php if ($hidden!='hidden'): ?>Registro de Proveedores<?php endif; ?>
                  <?php if ($hidden!=''): ?>Editar Proveedores<?php endif; ?>
                </div>

                <div class="panel-body">
                  <div class="row">
                    <div class="col-lg-10">
                      <form id="formProv" class="form-horizontal" name="frmProveedor"  method="post" action="InterfazProveedor.php">
                        <!-- Text Box Ruc Proveedor -->
                        <div class="form-group">
                          <?php if ($hidden!='hidden'): ?><label class="control-label col-md-3">RUC:</label><?php endif;  ?>
                          <div class="col-md-9">
                            <input type="<?= $hidden; ?>" class="form-control " name="ruc" maxlength="13" onkeypress="return validanum(event)"
                            id="ruc" value ='<?= $ruc; ?>' <?php echo $disabled ?> >
                            <?php if ($hidden!='hidden'): ?><small id="ruc_help" class="text-muted">Ingrese el RUC.</small><?php endif; ?>
                          </div>
                        </div>
                        <!-- Text Box Razon Social Proveedor -->
                        <div class="form-group">
                          <label class="control-label col-md-3">Razon Social:</label>
                          <div class="col-md-9">
                            <input type="text" class="form-control " name="razonSocial" maxlength="50" onkeypress="return validaletras(event)"
                            id="razonSocial" value ='<?= $razonSocial; ?>' <?php echo $disabled ?> >
                            <?php if ($hidden!='hidden'): ?><small id="razonSocial_help" class="text-muted">Ingrese la Razon Social.</small><?php endif; ?>
                          </div>
                        </div>
                        <!-- Text Box Telefono Proveedor -->
                        <div class="form-group">
                          <label class="control-label col-md-3">Telefono:</label>
                          <div class="col-md-9">
                            <input type="text" class="form-control" name="telefono" minlength="8" maxlength="10" onkeypress="return validanum(event)"
                            id="telefono" value ='<?= $telefono; ?>' <?php echo $disabled ?> >
                            <?php if ($hidden!='hidden'): ?><small id="telefono_help" class="text-muted">Ingrese el numero de telefono.</small><?php endif; ?>
                          </div>
                        </div>
                        <!-- Imagen Proveedor -->
                        <div class="form-group">
                          <label class="control-label col-md-3">Imagen:</label>
                          <div class="col-md-9">
                            <input id="input-b1" name="imagen" type="file" class="form-control" onchange="ValidarImagen(this)">
                            <?php if ($hidden!='hidden'): ?><small id="imagen_help" class="text-muted">Seleccione una imagen.</small><?php endif; ?>
                          </div>
                        </div>
                        <!-- Email Proveedor -->
                        <div class="form-group">
                          <label class="control-label col-md-3">Email:</label>
                          <div class="col-md-9">
                            <input type="email" class="form-control " name="email" maxlength="50"
                            id="email" value ='<?= $email; ?>'  <?php echo $disabled ?>>
                            <?php if ($hidden!='hidden'): ?><small id="email_help" class="text-muted">Ingrese el email.</small><?php endif; ?>
                          </div>
                        </div>
                        <!-- Text Box Direccion Proveedor -->
                        <div class="form-group">
                          <label class="control-label col-md-3">Direccion:</label>
                          <div class="col-md-9">
                            <input type="text" class="form-control " name="direccion" maxlength="50"
                            id="direccion" value ='<?= $direccion; ?>' <?php echo $disabled ?> >
                            <?php if ($hidden!='hidden'): ?><small id="direccion_help" class="text-muted">Ingrese la direccion.</small><?php endif; ?>
                          </div>
                        </div>
                        <!-- Check Box Proveedor -->
                        <div class="form-group">
                          <?php if ($hidden!=''): ?><label class="control-label col-md-3">Estado:</label><?php endif;  ?>
                          <div class="col-md-9">
                            <?php if ($hidden!=''): ?><input type="checkbox" class="form-control " name="estado"
                              id="estado"  <?php echo $check ?> <?php echo $estado ?>><?php endif;  ?>
                            </div>
                          </div>

                          <?php if (isset($_GET['opc']) && ($_GET['opc'] =='nuevo' || $_GET['opc'] =='editar')) {
                            ?>
                            <div class="btn btn-group col-md-offset-3 ">
                              <div class="col-md-2">
                                <button id="btnEnviar" type="submit" class=" btn btn-primary "><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
                              </div>

                              <div class="col-md-2 col-md-offset-3">
                                <a href="ListarProveedor.php" id="btnSalir" class="btn btn-danger"> <i class="glyphicon glyphicon-remove"></i> Cancelar</a>
                              </div>
                            </div>
                            <?php
                          } else {
                            ?>
                            <div class="col-md-2 col-md-offset-3 ">
                              <a href="ListarProveedor.php" id="btnSalir" class="btn btn-primary" <i class="glyphicon glyphicon-remove"></i> Regresar</a>
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
        <?php require_once("../../../../Apps/Main/footer.php"); ?>
      </body>
      </html>
