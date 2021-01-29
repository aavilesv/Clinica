<?php require_once('../Controlador/CtrUsuario.php');?>
<?php
//session_start();
// if(!isset($_SESSION['n_usuario'])){
//   header('location:../../../main/login.php');
// } ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Lista de Usuarios</title>
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
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <br> <br>
          <div class="row-fluid">
            <div class="span12">
              <ul class="breadcrumb">
                <li><a href= " <?php echo $ruta;?>Apps/Main/vista/menu.php">Inicio</a><span class="divider"></span></li>
                <li><a href= " <?php echo $ruta;?>Apps/Main/vista/seguridad.php">Seguridad</a><span class="divider"></span></li>
                <li><a href="javascript:window.location.reload();" class="active">Usuario</a> <span class="divider">/</span></li>
              </ul>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <h1 class="page-header">Seguridad</h1>
            </div><!-- /.col-lg-12 -->
          </div><!-- /.row -->

          <div class="tab-pane fade in active" id="home-pills">
            <h4>Usuario</h4>
            <div class="btn-group">
              <a class="btn btn-success col-md-offset-11" role="button" align="right" onclick="ventananuevo();">
                <i class="glyphicon glyphicon-plus-sign"> </i>
                Nuevo Usuario
              </a>
              <a href="javascript:window.location.reload();" class="btn btn-primary">
                <i class="glyphicon glyphicon-refresh"> </i>
                Actualizar
              </a>
            </div>
            <!--  -->



            <div class="container-fluid">
              <div class="panel-body">
                <div class="row"><!-- Cuerpo de Tabla-->
                  <div class="col-sx-12 col-md-12 table-responsive">
                    <table class="table table-bordered table-hover table-condensed table-fixed" id="dataTables-example">
                      <thead>
                        <tr>
                          <th>Codigo</th>
                          <th>Usuario</th>
                          <th>Nombre</th>
                          <th>Apellido</th>
                          <th>Email</th>
                          <th>Rol</th>
                          <th>Foto</th>
                          <th>Acción</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $ctrUsuario = new CtrUsuario();
                        $registros = $ctrUsuario->getUsuarios();
                        foreach ($registros as $registro) {
                          ?>
                          <tr>
                            <td><?php echo $registro->__get('idLogin'); ?></td>
                            <td><?php echo $registro->__get('usuLogin'); ?></td>
                            <td><?php echo $registro->__get('usuNombre'); ?></td>
                            <td><?php echo $registro->__get('usuApellido'); ?></td>
                            <td><?php echo $registro->__get('email'); ?></td>
                            <td><?php echo $registro->__get('idRol'); ?></td>
                            <td><center><img class="img img-circle" src="<?php echo $registro->__get('foto'); ?>" height="60px"></center></td>
                            <td >
                              <a href='ManUsuario.php?usua=<?php echo $registro->__get('usuLogin'); ?>&opc=editar&obc=no&per=no'
                                class="btn btn-primary btn-sm glyphicon glyphicon glyphicon-pencil"></a>
                                <!--Botón para elimina direcatamente el registro sin preguntar-->
                                <a href='InterfazUsuario.php?id=<?php echo $registro->__get('idLogin'); ?>&opc=eliminar'
                                  class="btn btn-danger btn-sm glyphicon glyphicon glyphicon-trash"></a>
                                  <!--Botón pregunta antes de  eliminar registro -->
                                  <a class="delete-button btn btn-warning btn-sm glyphicon glyphicon-remove-circle"  value="<?php echo $registro->__get('idLogin'); ?>" id=<?php echo $registro->__get('usuLogin'); ?>></a>
                                  <!--Botón visualizar registro -->
                                  <a href='ManUsuario.php?usua=<?php echo $registro->__get('usuLogin'); ?>&opc=ver&per=no&obc=no'
                                    class="btn btn-info btn-sm glyphicon glyphicon-eye-open"  value="<?php $registro->__get('usuLogin'); ?>"></a>
                                  </td>
                                </tr>
                                <?php
                              } ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <?php //require_once("../../Rol/Vista/ListarRoles.php"); ?>
                  </div>
                </div>



              </div>
            </div>



          </div>
        </div>

        <!--  -->
        <div class="modal fade" tabindex="-1" id="nuevoRegistro" aria-hidden="true">
          <div class="container">
            <div class="row">
              <div class="col-md-5 col-md-offset-4" style="margin-top: 35px;">

                <div class="login-panel panel panel-default">
                  <div class="panel-heading">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="panel-title">Usuario Nuevo</h3>
                  </div>
                  <div class="panel-body" id="conForm">
                    <form role="form" action="InterfazUsuario.php" method="post" id="frmregister" enctype="multipart/form-data">
                      <fieldset>
                        <div class="form-group">
                          <input class="form-control" id="usuario" placeholder="Ingrese Usuario" name="usuario" type="text" autofocus>
                        </div>
                        <div class="form-group">
                          <input class="form-control" id="foto" placeholder="Agregue una foto" name="foto" type="file" autofocus>
                        </div>
                        <div class="form-group">
                          <input class="form-control" id="nombre" placeholder="Ingrese Nombre" name="nombre" type="text" autofocus>
                        </div>
                        <div class="form-group">
                          <input class="form-control" id="apellido" placeholder="Ingrese Apellido" name="apellido" type="text" autofocus>
                        </div>
                        <div class="form-group">
                          <input class="form-control" id="email" placeholder="Ingrese un Email" name="email" type="email" autofocus>
                        </div>
                        <div class="form-group">
                          <input class="form-control" list="especialidades" name="especialidad" id="especialidad" placeholder="Especialidad">
                          <datalist id="especialidades">
                            <option value="Administrador">
                              <option value="Odontologo">
                                <option value="Ginecologo">
                                  <option value="Pediatra">
                                  </datalist>
                                </div>
                                <div class="form-group">
                                  <input class="form-control" id="password1" placeholder="Ingrese Password" name="password1" type="password" value="">
                                </div>
                                <div class="form-group">
                                  <input class="form-control" id="password2" placeholder="Repita Password" name="password2" type="password" value="">
                                </div>

                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class=" btn btn-primary "><span class="glyphicon glyphicon-floppy-disk"></span> Registrarse</button>
                                <!-- <a href="index.php" class="btn btn-lg btn-success btn-block">Registrarse</a> -->
                              </fieldset>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <script type="text/javascript">
                function ventananuevo(){
                  $('#nuevoRegistro').modal('show');
                }
                </script>
                <!--  -->
                <?php require_once("../../../../Apps/Main/footer.php"); ?>
                <!-- <script src="../../../../vendor/jqueryn/jquery.min.js"></script>
                <script scr="../../../../js/datatables/js/jquery.dataTables.min.js"></script>
                <script scr="../../../../js/datatables-plugins/js/dataTables.bootstrap.min.js"></script>
                <script scr="../../../../js/datatables-responsive/js/dataTables.responsive.js"></script> -->
                <script>
                $(document).ready(function() {
                  $('#dataTables-example').DataTable({
                    responsive: true
                  });
                });
                </script>
              </body>

              </html>

              <script type="text/javascript">

              $(".delete-button").click(function(){
                var id = $(this).attr('value');
                var usuario = $(this).attr('id');
                //alert("Codigo del usuario seleccionado: "+id);
                if(confirm("Estas seguro, deseas elmininar usuario: ["+usuario.toUpperCase()+"] ?")){
                  $(".delete-button").attr("href", "InterfazUsuario.php?id="+id+"&opc=eliminar");
                }
                else{
                  return false;
                }
              });
              </script>
              <?php //require_once("../Usuario/Rol/Vista/ListarRoles.php"); ?>
