<?php require_once('../Controlador/CtrUsuario.php');?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Lista de Usuarios</title>
    <?php
     $ruta = "../../../";
     require_once("../../../Apps/Main/head.php");?>

  </head>

  <body>
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
                                      <li><a href="javascript:window.location.reload();" class="active">Seguridad</a> <span class="divider">/</span></li>
                                  </ul>
                              </div>
                          </div>

                          <div class="row">
                              <div class="col-lg-12">
                                  <h1 class="page-header">Seguridad</h1>
                              </div><!-- /.col-lg-12 -->
                          </div><!-- /.row -->

                            <div class="container-fluid">
                            <div class="row">
                               <!-- Fin Criterios de Búsqueda-->
                                      </div>

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
                                                            <th>Rol</th>
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
                                                            <td><?php echo $registro->__get('idRol'); ?></td>
                                                            <td >
                                                                 <a href='ManUsuario.php?usua=<?php echo $registro->__get('usuLogin'); ?>&opc=editar'
                                                                  class="btn btn-primary btn-sm glyphicon glyphicon glyphicon-pencil"></a>
                                                                  <!--Botón para elimina direcatamente el registro sin preguntar-->
                                                                  <a href='InterfazUsuario.php?id=<?php echo $registro->__get('idLogin'); ?>&opc=eliminar'
                                                                  class="btn btn-danger btn-sm glyphicon glyphicon glyphicon-trash"></a>
                                                                  <!--Botón pregunta antes de  eliminar registro -->
                                                                  <a class="delete-button btn btn-warning btn-sm glyphicon glyphicon-remove-circle"  value="<?php echo $registro->__get('idLogin'); ?>" id=<?php echo $registro->__get('usuLogin'); ?>></a>
                                                                  <!--Botón visualizar registro -->
                                                                  <a href='ManUsuario.php?usua=<?php echo $registro->__get('usuLogin'); ?>&opc=ver'
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


                                  </div>
                            </div>
                        </div>
                      </div>
                  </div>
            </div>
        </div>
 <?php require_once("../../../Apps/Main/footer.php"); ?>
 <script src="jquery/jquery.min.js"></script>


   <!-- DataTables JavaScript -->
   <script src="datatables/js/jquery.dataTables.min.js"></script>
   <script src="datatables-plugins/dataTables.bootstrap.min.js"></script>
   <script src="datatables-responsive/dataTables.responsive.js"></script>


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
