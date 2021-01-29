<?php session_start(); ?><!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Mantenimiento de Usuario</title>

  <?php
  $rutaValidacion="../../../../../";
  $rutaFoto="../";
  $ruraPerfil="../../";
  $rut="../../";
  $ruta = "../../../../";
  require_once("../../../../Apps/Main/head.php");
  require_once('../Controlador/CtrOrtodoncia.php');
  ?>
  <style media="screen">
  div#div_file{
    position: relative;
    margin: 50px;
    padding: 10px;
    width: 200px;
    height: 50px;
    background-color: green;
  }
  input#foto{
    position: absolute;
    top: 0px;
    left: 0px;
    right: 0px;
    bottom: 0px;
    width: 100%;
    height: 100%;
    opacity: 0;
  }
  </style>
</head>
<body>
  <?php
  require_once("../../../../Apps/Main/header.php");


  if($_GET['tipo']=='insumo'){
    $nom='Insumo';
    $titulo="Mantenimiento de Insumo";
    $href="ListarInsumos.php";
    $action='InterfazInsumo.php';
  }else{
    $nom='Clinica';
    $titulo="Mantenimiento de Clinica";
    $href="ListarClinicas.php";
    $action='InterfazClinica.php';
  }

  if (isset($_GET['opc'])) {
    switch ($_GET['opc']) {
      case 'nuevo':
      $insumo = new CtrOrtodoncia();
      if($_GET['tipo']=='insumo'){
        $id='';
        $InCl='';
        $fotos='';
      }else{
        $id='';
        $InCl='';
        $fotos='';
      }
      $hidden='hidden';
      $foto='file';
      $disabled = '';
      $verfoto=true;
      $verRol=true;

      break;

      case 'editar':
      $insumo = new CtrOrtodoncia();
      if($_GET['tipo']=='insumo'){
        $registros = $insumo->getInsumo($_GET['usua']);
        $id=$registros->__get('idInsumos');
        $InCl=$registros->__get('Insumoscol');
        $fotos=$registros->__get('fotoInsumo');
      }else{
        $registros = $insumo->getClinica($_GET['usua']);
        $id=$registros->__get('CLI_Id');
        $InCl=$registros->__get('CLI_Nombre');
        $fotos=$registros->__get('CLI_Foto');
      }
      $hidden='hidden';
      $foto='file';
      $disabled = '';
      $verfoto=true;
      $verRol=true;
      break;
      case 'ver':
      $insumo = new CtrOrtodoncia();
      if($_GET['tipo']=='insumo'){
        $registros = $insumo->getInsumo($_GET['usua']);
        $id=$registros->__get('idInsumos');
        $InCl=$registros->__get('Insumoscol');
        $fotos=$registros->__get('fotoInsumo');
      }else{
        $registros = $insumo->getClinica($_GET['usua']);
        $id=$registros->__get('CLI_Id');
        $InCl=$registros->__get('CLI_Nombre');
        $fotos=$registros->__get('CLI_Foto');
      }
      $hidden='';
      $foto='hidden';
      $disabled = 'disabled';
      $verfoto=true;
      $verRol=true;

      break;
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
                <li><a href= " <?php echo $ruta;?>Apps/Main/vista/menu.php">Inicio</a><span class="divider"></span></li>

                  <li><a href= " <?php echo $ruta;?>Apps/Seguridad/usuario/Vista/ListarUsuarios.php"><?php echo $nom;?></a><span class="divider"></span></li>

                <li><a href="javascript:window.location.reload();" class="active"><?php echo $titulo; ?></a> <span class="divider">/</span></li>
              </ul>
            </div>
          </div>

          <div class="row-fluid">
            <div class="col-lg-12">
              <h1 class="page-header"><?php echo $titulo; ?></h1>
            </div><!-- /.col-lg-12 -->
          </div><!-- /.row -->

          <div class="container-fluid">
            <div class="col-xs-12 col-md-2"></div>
            <div class="col-xs-12 col-md-7">
              <br>
              <div class="panel panel-default">
                <div class="panel-heading">
                  Registro de <?php echo $nom;?>

                </div>

                <div class="panel-body">
                  <div class="row">
                    <div class="col-lg-10">
                      <form class="form-horizontal" name="frmUsuario"  method="post" action="<?php echo $action;?>" enctype="multipart/form-data">
                        <div class="form-group">
                          <div class="col-md-9">
                            <input type="hidden" class="form-control " name="id" maxlength="45"
                            id="id" required="true" value='<?= $id; ?>'>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="col-md-10">
                            <?php
                            if($verfoto){?>
                              <img class="img img-thumbnail col-sm-offset-3" src="<?php echo $fotos ?>" height="100px">
                            <?php  }
                            ?>
                            <?php if ($foto!='hidden'): ?>
                              <div class="col-md-offset-5 ">
                                <center>
                                  <a class="btn btn-success " id="div_file"aria-label="Subir foto" data-action-type="upload_photo" role="button">
                                    <i class="glyphicon glyphicon-camera"></i>  Subir foto
                                    <input type="<?= $foto; ?>" class="form-control " accept="image/*" name="foto" maxlength="200"
                                    id="foto"  title="Elige una imagen para subir" >
                                  </a>
                                </center>
                              </div>
                            <?php endif;  ?>
                          </div>
                          <input type="hidden" name="fotoR" value="<?= $fotos; ?>">
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3"><?php echo $nom;?>:</label>
                          <div class="col-md-9">
                            <input type="text" class="form-control " name="incl" maxlength="50"
                            id="incl" value ='<?= $InCl; ?>' required="true" <?php echo $disabled ?>>
                          </div>
                        </div>

                        <?php if (isset($_GET['opc']) && ($_GET['opc'] =='nuevo' || $_GET['opc'] =='editar')) {
                          ?>
                          <div class="btn btn-group col-md-offset-3 ">
                            <div class="col-md-2">
                              <button type="submit" class=" btn btn-primary "><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
                            </div>

                            <div class="col-md-2 col-md-offset-3">
                              <a href="<?php echo $href ?>" id="btnSalir" class="btn btn-danger"> <i class="glyphicon glyphicon-remove"></i> Cancelar</a>
                            </div>
                          </div>
                          <?php
                        } else {
                          ?>
                          <div class="col-md-2 col-md-offset-3 ">
                            <a href="<?php echo $href ?>" id="btnSalir" class="btn btn-primary" <i class="glyphicon glyphicon-remove"></i> Regresar</a>
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
      <script type="text/javascript">
      function ventananuevo(){
        $('#cambiarImagen').modal('show');
      }
      </script>
      <script type="application/javascript">
      jQuery('input[type=file]').change(function(){
        var filename = jQuery(this).val().split('\\').pop();
        var idname = jQuery(this).attr('id');
        console.log(jQuery(this));
        console.log(filename);
        console.log(idname);
        jQuery('span.'+idname).next().find('span').html(filename);
      });
      </script>
    </body>
    </html>
