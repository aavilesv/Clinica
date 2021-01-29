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
                                 <div class="panel panel-default panel-table panel-success">
                                      <div class="panel-heading">
                                          <div class="row"> <!-- Criterios de Búsqueda-->
                                              <div class="col col-xs-6">
                                                  <form method="GET" action="ListarUsuarios.php">
                                                      <div class="input-group">
                                                          <div class="input-group-btn search-panel">
                                                              <button type="button" class="btn btn-info">
                                                                  <span id="search_concept">Buscar Por </span> <span class="caret"></span>
                                                              </button>
                                                          </div>
                                                          <input type="text" class="form-control" name="q" placeholder="Ingrese criterio búsqueda... " value="">
                                                          <span class="input-group-btn">
                                                              <button class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
                                                          </span>
                                                      </div>
                                                  </form>
                                              </div>
                                              <div class="col col-xs-6 text-right">
                                                  <div class="btn-group">
                                                      <a class="btn btn-success col-md-offset-11" href='ManUsuario.php?usua=0&opc=nuevo' role="button" align="right">
                                                          <i class="glyphicon glyphicon-plus-sign"> </i>
                                                          Nuevo Usuario
                                                      </a>
                                                      <a href="javascript:window.location.reload();" class="btn btn-primary">
                                                          <i class="glyphicon glyphicon-refresh"> </i>
                                                          Actualizar
                                                      </a>
                                                  </div>
                                              </div>
                                          </div> <!-- Fin Criterios de Búsqueda-->
                                      </div>

                                      <div class="panel-body">
                                        <div class="row"><!-- Cuerpo de Tabla-->
                                          <div class="col-sx-12 col-md-12 table-responsive">
                                              <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Usuario</th>
                                                            <th>Nombre</th>
                                                            <th>Apellido</th>
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
                                                            <td><?php echo $registro->__get('usuario'); ?></td>
                                                            <td><?php echo $registro->__get('nombre'); ?></td>
                                                            <td><?php echo $registro->__get('apellido'); ?></td>
                                                            <td >
                                                                 <a href='ManUsuario.php?usua=<?php echo $registro->__get('usuario'); ?>&opc=editar'
                                                                  class="btn btn-primary btn-sm glyphicon glyphicon glyphicon-pencil"></a>
                                                                  <!--Botón para elimina direcatamente el registro sin preguntar-->
                                                                  <a href='InterfazUsuario.php?id=<?php echo $registro->__get('id'); ?>&opc=eliminar'
                                                                  class="btn btn-danger btn-sm glyphicon glyphicon glyphicon-trash"></a>
                                                                  <!--Botón pregunta antes de  eliminar registro -->
                                                                  <a class="delete-button btn btn-warning btn-sm glyphicon glyphicon-remove-circle"  value="<?php echo $registro->__get('id'); ?>" id=<?php echo $registro->__get('usuario'); ?>></a>
                                                                  <!--Botón visualizar registro -->
                                                                  <a href='ManUsuario.php?usua=<?php echo $registro->__get('usuario'); ?>&opc=ver'
                                                                  class="btn btn-info btn-sm glyphicon glyphicon-eye-open"  value="<?php $registro->__get('usuario'); ?>"></a>
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
