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
  require_once('../Controlador/ProductoCTR.php');
  ?>

</head>
<body>
  <?php
  require_once("../../../../Apps/Main/header.php");
  if (isset($_GET['opc'])) {
    switch ($_GET['opc']) {
      case 'nuevo':
      # Para nuevo registro
        $producto = new ProductoCTR();
        $idProducto='';
        $nombreProd='';
        $precio='';
        $vencimiento='';
        $elaboracion='';
        $estado=0;
        $hidden='';
        $disabled = '';
        $check = '';
      //$marcado = 'checked';    //la variable que pongas aqui tb tiene que ir abajo
      break;
      case 'editar':
      # Para Editar datos
        $producto = new ProductoCTR();
        $registros = $producto->getBuscar($_GET['prod']);
        $idProducto=$registros->__get('idProducto');
        $nombreProd=$registros->__get('nombreProd');
        $precio=$registros->__get('precio');
        $vencimiento=$registros->__get('vencimiento');
        $elaboracion=$registros->__get('elaboracion');
        $imagen=$registros->__get('imagen');
        $estado = ($registros->__get('estado')==1) ? 'checked': '';
        //$estado=$registros->__get('estado');
        $hidden='hidden';
        $disabled = '';
        $check = '';
      //$marcado = 'checked';
      break;
      case 'ver':
      # Para Visualizar los datos
        $producto = new ProductoCTR();
        $registros = $producto->getBuscar($_GET['prod']);
        $ruc=$registros->__get('nombreProd');
        $razonSocial=$registros->__get('razonSocial');
        $telefono=$registros->__get('telefono');
        $email=$registros->__get('email');
        $direccion=$registros->__get('direccion');
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
                <li><a href= " <?php echo $ruta;?>Apps/Seguridad/farmacia/Vista/ListarProducto.php"><i class="glyphicon glyphicon-list-alt"></i> Lista de Productos</a><span class="divider"></span></li>
                <?php if ($hidden!=''): ?><li><a href="javascript:window.location.reload();" class="active"><i class="glyphicon glyphicon-pencil "></i> Editar Productos</a> <span class="divider">/</span></li> <?php endif ?>
                <?php if ($hidden!='hidden'): ?><li><a href="javascript:window.location.reload();" class="active"><i class="fa fa-stethoscope"></i> Nuevo Producto</a> <span class="divider">/</span></li> <?php endif ?>
              </ul>
            </div>
          </div>
          <div class="row-fluid">
            <div class="col-lg-12">
              <?php if ($hidden!='hidden'): ?><h1 class="page-header"><i class="fa fa-stethoscope"></i> Nuevo Producto</h1><?php endif; ?>
              <?php if ($hidden!=''): ?><h1 class="page-header"><i class="glyphicon glyphicon-pencil"></i>Mantenimiento de Productos</h1><?php endif; ?>
            </div><!-- /.col-lg-12 -->
          </div><!-- /.row -->
          <div class="container-fluid">
            <div class="col-xs-12 col-md-2"></div>
            <div class="col-xs-12 col-md-7">
              <br>
              <div class="panel panel-green">
                <div class="panel-heading">
                  <?php if ($hidden!='hidden'): ?>Registro de Productos<?php endif; ?>
                  <?php if ($hidden!=''): ?>Editar Productos<?php endif; ?>
                </div>

                <div class="panel-body">
                  <div class="row">
                    <div class="col-xs-12 col-lg-10">
                      <form id="formProd" class="form-horizontal" name="frmProducto"  method="post" action="InterfazProducto.php">
                        <!-- Text Box Id Producto -->
                        <div class="form-group">
                          <label class="control-label col-md-3"></label>
                          <div class="col-md-9">
                            <input type="hidden" class="form-control " name="idProducto" maxlength="50"
                            id="idProducto" value ='<?= $idProducto; ?>'>
                          </div>
                        </div>
                        <!-- Text Box Nombre Producto -->
                        <div class="form-group">
                          <label class="control-label col-md-3">Nombre del Producto:</label>
                          <div class="col-md-9">
                            <input type="text" class="form-control " name="nombreProd" maxlength="50"
                            id="nombreProd" value ='<?= $nombreProd; ?>' <?php echo $disabled ?> >
                            <?php if ($hidden!='hidden'): ?><small id="nombreProd_help" class="text-muted">Ingrese el Nombre.</small><?php endif; ?>
                          </div>
                        </div>
                        <!-- Text Box Precio Producto -->
                        <div class="form-group">
                          <label class="control-label col-md-3">Precio:</label>
                          <div class="col-md-4">
                            <input type="text" class="form-control " name="precio" maxlength="20" onkeypress="return validarprecio(event)"
                            id="precio" value ='<?= $precio; ?>' <?php echo $disabled ?> >
                            <?php if ($hidden!='hidden'): ?><small id="precio_help" class="text-muted">Ingrese el precio.</small><?php endif; ?>
                          </div>
                        </div>
                        <!-- Imagen de Producto -->
                        <div class="form-group">
                          <label class="control-label col-md-3">Imagen:</label>
                          <div class="col-md-9">
                            <input id="input-b1" name="imagen" type="file" class="form-control" onchange="ValidarImagen(this)">
                            <?php if ($hidden!='hidden'): ?><small id="imagen_help" class="text-muted">Seleccione una imagen.</small><?php endif; ?>
                          </div>
                        </div>
                        <!-- Fecha elaboracion Producto -->
                        <div class="form-group">
                          <label class="control-label col-md-3">Fecha de Elaboracion:</label>
                          <div class="col-md-4">
                            <input type="date" class="form-control " name="elaboracion" maxlength="50"
                            id="elaboracion" value ='<?= $elaboracion; ?>' required="true" <?php echo $disabled ?> required>
                            <?php if ($hidden!='hidden'): ?><small id="elaboracion_help" class="text-muted">Seleccione la Fecha de Elaboracion.</small><?php endif; ?>
                          </div>
                        </div>
                        <!-- Fecha de vencimiento Producto -->
                        <div class="form-group">
                          <label class="control-label col-md-3">Fecha de Vencimiento:</label>
                          <div class="col-md-4">
                            <input type="date" class="form-control " name="vencimiento" maxlength="50"
                            id="vencimiento" value ='<?= $vencimiento; ?>' required="true" <?php echo $disabled ?> required>
                            <?php if ($hidden!='hidden'): ?><small id="vencimiento_help" class="text-muted">Seleccione la Fecha de Vencimiento.</small><?php endif; ?>
                          </div>
                        </div>
                        <!-- Check Box Estado Producto -->
                        <div class="form-group">
                          <?php if ($hidden!=''): ?><label class="control-label col-md-3">Estado:</label><?php endif;  ?>
                          <div class="col-md-9">
                            <?php if ($hidden!=''): ?><input type="checkbox" class="form-control " name="estado"
                              id="estado"  <?php echo $check ?> <?php echo $estado ?>><?php endif;  ?>
                            </div>
                          </div>

                        <div class="form-group">
                          <?php if (isset($_GET['opc']) && ($_GET['opc'] =='nuevo' || $_GET['opc'] =='editar')) { ?>
                            <!-- Opcion guardar -->
                            <div class="btn btn-group ">
                              <div class="col-md-2 col-md-offset-3" >
                                <button id="btnEnviar" type="submit" class=" btn btn-primary "><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
                              </div>
                              <!-- Cancelar Producto -->
                              <div class="col-md-2 col-md-offset-3">
                                <a href="ListarProducto.php" id="btnSalir" class="btn btn-danger"> <i class="glyphicon glyphicon-remove"></i> Cancelar</a>
                              </div>
                            </div>
                          <?php } else { ?>
                            <div class="col-md-2 col-md-offset-3 ">
                              <a href="ListarProducto.php" id="btnSalir" class="btn btn-primary" <i class="glyphicon glyphicon-remove"></i> Regresar</a>
                            </div>
                          <?php } ?>
                          <input type="hidden"  name="opc" id="opc" value='<?=$_GET['opc'];?>' /><br>
                        </div>
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
