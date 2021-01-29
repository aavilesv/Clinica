<?php session_start();
require_once('../Controlador/ProveedorCTR.php');?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Lista de Proveedores</title>
  <?php
  $rutaValidacion="../../../../";
  $rutaFoto="../../";
  $ruraPerfil="../../";
  $rut="../../../";
  $ruta = "../../../../";
  require_once("../../../../Apps/Main/head.php");?>
</head>

<body>
  <?php require_once("../../../../Apps/Main/header.php"); ?>
  <div id="page-wrapper">
    <div class="container-fluid bg-info">
      <div class="row">
        <div class="col-lg-12">
          <br> <br>
          <div class="row-fluid">
            <div class="span12">
              <ul class="breadcrumb list-group-item-info">
                <li><a href= " <?php echo $ruta;?>Apps/Main/vista/menu.php"><i class="glyphicon glyphicon-home"></i> Inicio</a><span class="divider"></span></li>
                <li><a href= " <?php echo $ruta;?>Apps/seguridad/farmacia/inicio.php"><i class="glyphicon glyphicon-plus"></i> Farmacia</a><span class="divider"></span></li>
                <li><a href="javascript:window.location.reload();" class="active"><i class="fa fa-ambulance"></i> Proveedores</a> <span class="divider">/</span></li>
              </ul>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <h1 class="page-header"><i class="glyphicon glyphicon-list-alt"></i> Lista de Proveedores</h1>
            </div><!-- /.col-lg-12 -->
          </div><!-- /.row -->

          <div class="container-fluid">
            <div class="row">
              <div class="panel panel-default panel-table panel-info">
                <div class="panel panel-heading">
                  <div class="row"> <!-- Criterios de Búsqueda-->
                    <!--Div separadores-->
                    <div class="col col-md-3 col-xs-0">
                    </div>
                    <div class="col col-md-6 col-xs-0">
                    </div>
                    <!--fin de div separadores-->
                    <div class="col col-md-3 col-xs-3 text-right">
                      <div class="btn-group">
                        <a class="btn btn-success col-md-offset-11" href='ManProveedor.php?prov=0&opc=nuevo' role="button" align="right">
                          <i class="fa fa-group"> </i>
                          Nuevo Proveedor
                        </a>
                        <a href="javascript:window.location.reload();" class="btn btn-primary">
                          <i class="glyphicon glyphicon-refresh"> </i>
                          Actualizar
                        </a>
                      </div>
                    </div>
                  </div> <!-- Fin Criterios de Búsqueda-->
                </div>
                <!-- Cuerpo de panel-->
                <div class="panel-body">
                  <div class="row"><!-- Cuerpo de Tabla-->
                    <div class="col-sx-12 col-md-12 table-responsive">
                      <table class="table table-bordered table-hover table-condensed table-fixed" id="dataTables-example" width=100%>
                        <thead>
                          <tr class="cabecera">
                            <th>RUC</th>
                            <th>Razon Social</th>
                            <th>Telefono</th>
                            <th>Email</th>
                            <th>Direccion</th>
                            <th style="width: 10%">Imagen</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                          </tr>
                        </thead>
                        <tbody class="buscar">
                          <?php
                          $ctrProveedor = new ProveedorCTR();
                          $registros = $ctrProveedor->getMostrar();
                          foreach ($registros as $registro) {
                            ?>
                            <tr>
                              <td><?php echo $registro->__get('ruc'); ?></td>
                              <td><?php echo $registro->__get('razonSocial'); ?></td>
                              <td><?php echo $registro->__get('telefono'); ?></td>
                              <td><?php echo $registro->__get('email'); ?></td>
                              <td><?php echo $registro->__get('direccion'); ?></td>
                              <td><center><img src="../../../img/Proveedores/<?php echo $registro->__get('imagen');?>" alt="" class="img img-circle" width="35%" height="13%" ></center></td>
                              <?php
                              if ($registro->__get('estado') == 1) {
                                echo '<td><center><span class="label label-success" title="Activo">Activo</span></center></td>';
                              } elseif ($registro->__get('estado') == 0) {

                                echo '<td><center><span class="label label-danger" title="Activo">Inactivo</span></center></td>';
                              }
                              ?>
                              <td >
                                <a href='ManProveedor.php?prov=<?php echo $registro->__get('razonSocial'); ?>&opc=editar'
                                  class="btn btn-primary btn-sm glyphicon glyphicon glyphicon-pencil"></a>

                                  <a class="delete-button btn btn-danger btn-sm glyphicon glyphicon-trash"
                                  value="<?php echo $registro->__get('ruc'); ?>" id=<?php echo $registro->__get('razonSocial'); ?>></a>
                                </td>
                              </tr>
                            <?php  } ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div><!--cierra Cuerpo panel-->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php require_once("../../../../Apps/Main/footer.php"); ?>
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
    var proveedor = $(this).attr('id');
    //alert("razonSocial del proveedor seleccionado: "+id);
    if(confirm("Estas seguro, deseas elmininar proveedor: "+proveedor.toString()+" ?")){
      $(".delete-button").attr("href", "InterfazProveedor.php?ruc="+id+"&opc=eliminar");
    }
    else{
      return false;
    }
  });
</script>
