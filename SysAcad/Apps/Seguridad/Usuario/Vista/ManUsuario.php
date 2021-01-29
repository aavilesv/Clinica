<!DOCTYPE html>
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
  require_once('../Controlador/CtrUsuario.php');
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
  // require_once("../../../../Apps/Main/vista/header.php");

  if($_GET['per']=='si'){
    $titulo="Perfil";
    $href="../../../main/vista/menu.php";
    $espe='modal';

  }else{
    $titulo="Mantenimiento de Usuario";
    $href="ListarUsuarios.php";
    $espe='';
  }
  if (isset($_GET['opc'])) {
    switch ($_GET['opc']) {

      case 'editar':
      # Para Editar datos
      $usuario = new CtrUsuario();
      $registros = $usuario->getUsuario($_GET['usua']);

      $id=$registros->__get('idLogin');
      $usuario=$registros->__get('usuLogin');
      $nombre=$registros->__get('usuNombre');
      $apellido=$registros->__get('usuApellido');
      $pass=$registros->__get('usuClave');
      $fotos=$registros->__get('foto');
      $idRol=$registros->__get('idRol');
      $email=$registros->__get('email');
      $hidden='hidden';
      $foto='file';
      $disabled = '';
      $verfoto=true;
      $verRol=true;

      break;

      case 'ver':
      # Para Visualizar los datos
      $usuario = new CtrUsuario();
      $registros = $usuario->getUsuario($_GET['usua']);

      $id=$registros->__get('idLogin');
      $usuario=$registros->__get('usuLogin');
      $nombre=$registros->__get('usuNombre');
      $apellido=$registros->__get('usuApellido');
      $pass=$registros->__get('usuClave');
      $fotos=$registros->__get('foto');
      $idRol=$registros->__get('idRol');
      $email=$registros->__get('email');
      $hidden='';
      $foto='hidden';
      $disabled = 'disabled';
      $verfoto=true;
      $verRol=false;

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
                <?php if($espe!="modal"): ?>
                <li><a href= " <?php echo $ruta;?>Apps/Seguridad/usuario/Vista/ListarUsuarios.php">Seguridad</a><span class="divider"></span></li>
              <?php endif ?>
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
                  Registro de usuarios

                </div>

                <div class="panel-body">
                  <div class="row">
                    <div class="col-lg-10">
                      <form class="form-horizontal" name="frmUsuario"  method="post" action="InterfazUsuario.php" enctype="multipart/form-data">
                        <div class="form-group">
                          <div class="col-md-9">
                            <input type="hidden" class="form-control " name="id" maxlength="45"
                            id="nombre" required="true" value='<?= $id; ?>'>
                          </div>
                        </div>
                        <input type="hidden" name="obc" value="<?php echo $_GET['obc']; ?>">
                        <!-- <?php $obc = isset($_GET['obc'])?$_GET['obc']:'';
                        echo $_GET['obc']; ?> -->
                        <div class="form-group">
                          <div class="col-md-10">
                            <?php
                            if($verfoto){?>
                              <img class="img img-thumbnail col-sm-offset-4" src="<?php echo $fotos ?>" height="150px">
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
                          <?php if ($hidden!='hidden'): ?><label class="control-label col-md-3">Usuario:</label><?php endif;  ?>
                          <div class="col-md-9">
                            <input type="<?= $hidden; ?>" class="form-control " name="usuario" maxlength="20"
                            id="usuario" value ='<?= $usuario; ?>' required="true" <?php echo $disabled ?>>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Nombre:</label>
                          <div class="col-md-9">
                            <input type="text" class="form-control " name="nombre" maxlength="50"
                            id="nombre" value ='<?= $nombre; ?>' required="true" <?php echo $disabled ?>>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Apellido:</label>
                          <div class="col-md-9">
                            <input type="text" class="form-control " name="apellido" maxlength="50"
                            id="apellido" value ='<?= $apellido; ?>' required="true" <?php echo $disabled ?>>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3">Email:</label>
                          <div class="col-md-9">
                            <input type="email" class="form-control " name="email" maxlength="50"
                            id="email" value ='<?= $email; ?>' required="true" <?php echo $disabled ?>>
                          </div>
                        </div>

                        <?php if($verRol){ ?>
                          <div class="form-group <?php echo $espe; ?>">
                            <label class="control-label col-md-3">Especialidad:</label>
                            <div class="col-md-9 ">
                              <input class="form-control" list="especialidades" name="especialidad" id="especialidad" value="<?php echo $idRol ?>"placeholder="Especialidad">
                              <datalist id="especialidades">
                                <option value="Administrador">
                                  <option value="Odontologo">
                                    <option value="Ginecologo">
                                      <option value="Pediatra">
                                      </datalist>
                                    </div>

                                  </div>
                                <?php }else{ ?>
                                  <div class="form-group">
                                    <label class="control-label col-md-3">Rol:</label>
                                    <div class="col-md-9">
                                      <input type="text" class="form-control " name="rol" maxlength="50"
                                      id="rol" value ='<?= $idRol; ?>' required="true" <?php echo $disabled ?>>
                                    </div>
                                  </div>
                                <?php } ?>
                                <?php if($verRol){ ?>
                                  <div class="form-group">
                                    <label class="control-label col-md-3">Clave:</label>
                                    <div class="col-md-9">
                                      <input type="password" class="form-control " name="password1" maxlength="50"
                                      id="clave" value ='<?= $pass; ?>' required="true" <?php echo $disabled ?>>
                                    </div>
                                  </div>
                                <?php } ?>
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
