<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mantenimiento de Usuario</title>

        <?php
         $ruta = "../../../";
         require_once("../../../Apps/Main/head.php");
         require_once('../Controlador/CtrUsuario.php');
        ?>

    </head>
    <body>
        <?php
          require_once("../../../Apps/Main/header.php");
          if (isset($_GET['opc'])) {
              switch ($_GET['opc']) {
               case 'nuevo':
                     # Para nuevo registro
                     $id='';
                     $usuario="";
                     $pass="";
                     $nombre='';
                     $apellido='';
                     $hidden='';
                     $disabled = '';
               break;
               case 'editar':
                     # Para Editar datos
                     $usuario = new CtrUsuario();
                     $registros = $usuario->getUsuario($_GET['usua']);

                     $id=$registros->__get('idLogin');
                     $usuario=$registros->__get('usuLogin');
                     $nombre=$registros->__get('usuNombre');
                     $apellido=$registros->__get('usuApellido');
                     $pass=$registros->__get('usuClave');
                     $hidden='hidden';
                     $disabled = '';
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
                     $hidden='';
                     $disabled = 'disabled';
               break;
             }
          }
        ?>


            <?php require_once("../../../Apps/Main/header.php"); ?>
            <div id="page-wrapper">
                <div class="container-fluid">
                      <div class="row">
                        <div class="col-lg-12">

                          <br> <br>
                          <div class="row-fluid">
                              <div class="span12">
                                  <ul class="breadcrumb">
                                      <li><a href= " <?php echo $ruta;?>Apps/Main/index.php">Inicio</a><span class="divider"></span></li>
                                      <li><a href= " <?php echo $ruta;?>Apps/Seguridad/Vista/ListarUsuarios.php">Seguridad</a><span class="divider"></span></li>
                                      <li><a href="javascript:window.location.reload();" class="active">Mantenimiento Usuario</a> <span class="divider">/</span></li>
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
                                         Registro de usuarios
                                   </div>

                                   <div class="panel-body">
                                     <div class="row">
                                         <div class="col-lg-10">
                                               <form class="form-horizontal" name="frmUsuario"  method="post" action="InterfazUsuario.php">

                                                      <div class="form-group">
                                                          <div class="col-md-9">
                                                              <input type="hidden" class="form-control " name="id" maxlength="45"
                                                                     id="nombre" required="true" value='<?= $id; ?>'>
                                                          </div>
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
                                                                     id="descripcion" value ='<?= $apellido; ?>' required="true" <?php echo $disabled ?>>
                                                          </div>
                                                      </div>
                                                      <div class="form-group">
                                                          <label class="control-label col-md-3">Clave:</label>
                                                          <div class="col-md-9">
                                                              <input type="password" class="form-control " name="clave" maxlength="50"
                                                                     id="clave" value ='<?= $pass; ?>' required="true" <?php echo $disabled ?>>
                                                          </div>
                                                      </div>
                                                      <?php if (isset($_GET['opc']) && ($_GET['opc'] =='nuevo' || $_GET['opc'] =='editar')) {
            ?>
                                                      <div class="btn btn-group col-md-offset-3 ">
                                                          <div class="col-md-2">
                                                              <button type="submit" class=" btn btn-primary "><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
                                                          </div>

                                                          <div class="col-md-2 col-md-offset-3">
                                                              <a href="ListarUsuarios.php" id="btnSalir" class="btn btn-danger"> <i class="glyphicon glyphicon-remove"></i> Cancelar</a>
                                                           </div>
                                                      </div>
                                                      <?php
        } else {
            ?>
                                                          <div class="col-md-2 col-md-offset-3 ">
                                                              <a href="ListarUsuarios.php" id="btnSalir" class="btn btn-primary" <i class="glyphicon glyphicon-remove"></i> Regresar</a>
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


        <?php require_once("../../../Apps/Main/footer.php"); ?>

    </body>
</html>
