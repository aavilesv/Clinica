<?php session_start();
require_once('../Controlador/CtrCliente.php');?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Lista de Clientes</title>
    <?php
     $ruta = "../../../../";
     require_once("../../../../Apps/Main/head.php");?>

  </head>

  <body>
        <?php  require_once("../../../../Apps/Main/header.php"); ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                  <div class="row">
                      <div class="col-lg-12">
                          <br> <br>

                          <div class="row">
                              <div class="col-lg-12">
                                  <h1 class="page-header">Cliente</h1>
                              </div><!-- /.col-lg-12 -->
                          </div><!-- /.row -->
                          <div class="tab-content">
                            <div class="tab-pane fade in active" >
                              <div class="btn-group">
                                <a class="btn btn-success col-md-offset-11" role="button" align="right" href='ManCliente.php?usua=0&opc=nuevo'>
                                  <i class="glyphicon glyphicon-plus-sign"> </i>
                                  Nuevo Cliente
                                </a>
                                <a href="javascript:window.location.reload();" class="btn btn-primary">
                                  <i class="glyphicon glyphicon-refresh"> </i>
                                  Actualizar
                                </a>
                              </div>
                              <!--  -->
                    </div>


<div class="container-fluid">
                                      <div class="panel-body">
                                        <div class="row"><!-- Cuerpo de Tabla-->
                                          <div class="col-sx-12 col-md-12 table-responsive">

                                              <table id="datos1" class="table table-bordered table-hover table-condensed table-fixed">

                                                    <thead>
                                                        <tr>

                                                            <th>Apellido</th>
                                                            <th>Nombre</th>
                                                            <th>Cedula</th>
                                                            <th>Dirección</th>
                                                            <th>Celular</th>
                                                            <th>Email</th>
                                                            <th>Estado</th>
                                                            <th>Accion</th>
                                                         </tr>
                                                    </thead>
                                                    <tbody>
                                                       <?php

                                                            $ctrCliente = new CtrCliente();
                                                            $registros = $ctrCliente->getClientes();
                                                            foreach ($registros as $registro) {
                                                                ?>
                                                       <tr>


                                                            <td><?php echo $registro->__get('FACCliApellido'); ?></td>
                                                              <td><?php echo $registro->__get('FACCliNombre'); ?></td>
                                                            <td><?php echo $registro->__get('FACCliCedula'); ?></td>
                                                            <td><?php echo $registro->__get('FACCliDireccion'); ?></td>
                                                            <td><?php echo $registro->__get('FACCliCelular'); ?></td>
                                                            <td><?php echo $registro->__get('FACCliEmail'); ?></td>
                                                            <td><?php $status=$registro->__get('FACCliEstado');
                                                                 if ($status!='1') {
                                                                  echo '  <button type="button" class="btn btn-danger btn-xs"> <span class="glyphicon glyphicon-remove"></span>&nbsp;Inactivo</button>';
                                                                 }else{
                                                                   echo '  <button type="button" class="btn btn-success btn-xs"> <span class="glyphicon glyphicon-ok"></span>&nbsp;Activo</button>';
                                                                 } ?></td>
                                                            <td >
                                                                 <a href='ManCliente.php?usua=<?php echo $registro->__get('FACCliId'); ?>&opc=editar'
                                                                  class="btn btn-primary btn-sm glyphicon glyphicon glyphicon-pencil"></a>
                                                                  <!--Botón para elimina direcatamente el registro sin preguntar-->
                                                                  <a href='InterfazCliente.php?id=<?php echo $registro->__get('FACCliId'); ?>&opc=eliminar'
                                                                  class="btn btn-danger btn-sm glyphicon glyphicon glyphicon-trash"></a>
                                                                  <!--Botón pregunta antes de  eliminar registro -->
                                                              <!--    <a class="delete-button btn btn-warning btn-sm glyphicon glyphicon-remove-circle"  value="<?php
                                                                /*  echo $registro->__get('FACCliIdCliente'); ?>" id=<?php echo $registro->__get('FACCliApellido')*/; ?>></a> -->
                                                                  <!--Botón visualizar registro -->
                                                                  <a href='ManCliente.php?usua=<?php echo $registro->__get('FACCliId'); ?>&opc=ver'
                                                                  class="btn btn-info btn-sm glyphicon glyphicon-eye-open"  value="<?php $registro->__get('FACCliId'); ?>"></a>
                                                            </td>
                                                       </tr>
                                                       <?php
                                                            } ?>
                                                      </tbody>
                                                  </table>
                                          </div>
                                        </div>
                                        <a href="../../../main/vista/menu.php" id="btnSalir" class="btn btn-primary"> <i class="glyphicon glyphicon-remove"></i> Regresar</a>
                                      </div>
                                         </div>

                                  </div>
                            </div>
                        </div>
                      </div>
                  </div>
            </div>
        </div>
 <?php require_once("../../../../Apps/Main/footer.php");
  ?>
 <?php require_once("../paginacion.php"); ?>
 </body>
</html>
<script type="text/javascript">

$(".delete-button").click(function(){
      var horario1 = $(this).attr('value');
      //alert("Codigo del usuario seleccionado: "+usuario);
      if(confirm("Estas seguro, deseas eliminar horario: ["+horario1.toUpperCase()+"] ?")){
          $(".delete-button").attr("href", "../Controlador/UsuarioController.php?horario="+horario1+" &opc=eliminar ");
      }
      else{
          return false;
      }
    });

</script>
