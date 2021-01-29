<?php
session_start();
require_once('../Controlador/CtrConsulta.php'); ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">

  <title>Lista de Usuarios</title>
  <?php
  $rutaValidacion="../../../../";
  $rutaFoto="../../";
  $ruraPerfil="../../";
  $rut="../../../";
  $ruta = "../../../../";
  require_once("../../../../Apps/Main/head.php");
  ?>
  <script type="text/javascript">
  // Solo permite ingresar numeros.
  function numeros(e) {
    var key = window.Event ? e.which : e.keyCode
    return (key >= 48 && key <= 57)
  }

  function sololetras(e) {
    key = e.keyCode || e.which;
    teclado = String.fromCharCode(key).toLowerCase();
    letras = " abcdefghijklmnñopqrstuvwxyz";
    especiales = "8-37-39-46-164";
    tteclado_especial = false;
    for (var i in especiales)
    {
      if (key == especiales[i]) {
        tteclado_especial = true;
        break;
      }
    }
    if (letras.indexOf(teclado) == -1 && !tteclado_especial) {
      return false;
    }



  }
  </script>
</head>

<body>
  <?php
  if (isset($_GET['q'])) {
    if ($_GET['q'] == '') {
      $q = '';
    } else {
      $q = $_GET["q"];
    }
  } else {
    $q = '';
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
                <li><a href= " <?php echo $ruta; ?>Apps/Main/vista/menu.php">Inicio</a><span class="divider"></span></li>
                <li><a href="javascript:window.location.reload();" class="active">Historia Clinica</a> <span class="divider">/</span></li>
              </ul>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <h1 class="page-header">Historia Clinica: <small>Pacientes</small></h1>
            </div><!-- /.col-lg-12 -->
          </div><!-- /.row -->
          <div class="container-fluid">
            <div class="row">
              <div class="panel panel-default panel-table panel-success">
                <div class="panel-heading">
                  <div class="row"> <!-- Criterios de Búsqueda-->
                    <div class="col col-xs-6">
                      <form method="GET" action="">
                        <div class="input-group">
                          <div class="input-group-btn search-panel">

                            <select onchange="this.form.submit()" name="search_concept" type="button" class="btn btn-info" id="search_concept">
                              <?php
                              if($_GET['search_concept']==0){
                                $q='';
                                ?>
                                <option value="0" selected>BUSCAR POR</option>
                                <option value="1"  >N° HISTORA</option>
                                <option value="2">N° CEDULA</option>
                                <option value="3">NOMBRE</option>
                                <?php
                              }
                              ?>
                              <?php
                              if($_GET['search_concept']==1){
                                ?>
                                <option value="0" >BUSCAR POR</option>
                                <option value="1" selected >N° HISTORA</option>
                                <option value="2">N° CEDULA</option>
                                <option value="3">NOMBRE</option>
                                <?php
                              }
                              ?>
                              <?php
                              if($_GET['search_concept']==2){
                                ?>
                                <option value="0" >BUSCAR POR</option>
                                <option value="1" >N° HISTORA</option>
                                <option value="2" selected>N° CEDULA</option>
                                <option value="3">NOMBRE</option>
                                <?php
                              }
                              ?>
                              <?php
                              if($_GET['search_concept']==3){
                                ?>
                                <option value="0" >BUSCAR POR</option>
                                <option value="1" >N° HISTORA</option>
                                <option value="2">N° CEDULA</option>
                                <option value="3" selected>NOMBRE</option>
                                <?php
                              }
                              ?>
                            </select>

                          </div>
                          <?php
                          $res = $_GET;

                          $busq = isset($res['search_concept']) ? $res['search_concept'] : '';

                          if ($busq == 1) {
                            ?>
                            <input type="text" class="form-control" name="q" placeholder="Ingrese el Numero de historia clinica... " value='<?= $q; ?>'  onkeypress="return numeros(event)">
                            <span class="input-group-btn">
                              <?php
                            } elseif ($busq == 2) {
                              ?>
                              <input type="text" class="form-control" name="q" placeholder="Ingrese el Numero de cedula... " value='<?= $q; ?>'  onkeypress="return numeros(event)">
                              <span class="input-group-btn">
                                <?php
                              } elseif ($busq == 3) {
                                ?>
                                <input type="text" class="form-control" name="q" placeholder="Ingrese el Nombre... "  value='<?= $q; ?>'  onkeypress="return sololetras(event)">
                                <span class="input-group-btn">
                                <?php } elseif ($busq == 0||$busq=='') {
                                  ?>
                                  <input type="text" class="form-control" name="q" placeholder="Ingrese unCriterio de Busqueda... "  value='<?= $q; ?>' disabled>
                                  <span class="input-group-btn">
                                  <?php }
                                  ?>

                                  <button class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
                                </span>
                              </div>

                            </div>
                            <div class="col col-xs-6 text-right">
                              <div class="btn-group">
                                <a href="javascript:window.location.reload();" class="btn btn-primary">
                                  <i class="glyphicon glyphicon-refresh"> </i>
                                  Actualizar
                                </a>
                              </div>
                            </div>
                          </div> <!-- Fin Criterios de Búsqueda-->
                          <br>

                        </form>
                      </div>
                      <br>

                      <?php ?>


                      <div class="panel-body">
                        <div class="row"><!-- Cuerpo de Tabla-->
                          <div class="col-sx-12 col-md-12 table-responsive">
                            <table class="table table-bordered table-hover table-condensed table-fixed">
                              <thead>
                                <tr>
                                  <th>N° Historia Clinica</th>
                                  <th>Nombre</th>
                                  <th>Apellido</th>
                                  <th>Cedula</th>
                                  <th>Tipo de Sangre</th>
                                  <th>Sexo</th>
                                  <th>Estado</th>
                                  <th>Acción</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                if ($q != '') {
                                  $ctrUsuario = new CtrConsulta();
                                  $reg = $ctrUsuario->obtenerPaciente($_GET['q'], $_GET['search_concept']);
                                  foreach ($reg as $registro) {
                                    ?>
                                    <tr>
                                      <td><?php echo $registro->__get('PAC_Id'); ?></td>
                                      <td><?php echo $registro->__get('PAC_Nombre'); ?></td>
                                      <td><?php echo $registro->__get('PAC_Apellido'); ?></td>
                                      <td><?php echo $registro->__get('PAC_Cedula'); ?></td>
                                      <td><CENTER><span class="label label-danger" title="O+"><?php echo $registro->__get('PAC_TipSangre'); ?></span></CENTER></td>
                                      <td><?php echo $registro->__get('PAC_Sexo'); ?></td>
                                      <?php
                                      if ($registro->__get('PAC_Estado') == 1) {
                                        echo '<td><center><span class="label label-success" title="Activo">Activo</span></center></td>';
                                      } elseif ($registro->__get('PAC_Estado') == 0) {

                                        echo '<td><center><span class="label label-danger" title="Activo">Inactivo</span></center></td>';
                                      }
                                      ?>
                                      <td >
                                        <!--Botón visualizar registro -->
                                        <center> <a href='ListarUsuarios.php?usua=<?php echo $registro->__get('PAC_Id'); ?>&opc=ver'
                                          class="btn btn-info btn-sm glyphicon glyphicon-eye-open"  value=""></a></center>
                                        </td>
                                      </tr>
                                      <?php
                                    }
                                  } else {
                                    $ctrUsuario = new CtrConsulta();
                                    $reg = $ctrUsuario->obtenerPacientes();
                                    foreach ($reg as $registro) {
                                      ?>
                                      <tr>
                                        <td><?php echo $registro->__get('PAC_Id'); ?></td>
                                        <td><?php echo $registro->__get('PAC_Nombre'); ?></td>
                                        <td><?php echo $registro->__get('PAC_Apellido'); ?></td>
                                        <td><?php echo $registro->__get('PAC_Cedula'); ?></td>
                                        <td><CENTER><span class="label label-danger" title="O+"><?php echo $registro->__get('PAC_TipSangre'); ?></span></CENTER></td>

                                        <td><?php echo $registro->__get('PAC_Sexo'); ?></td>
                                        <?php
                                        if ($registro->__get('PAC_Estado') == 1) {
                                          echo '<td><center><span class="label label-success" title="Activo">Activo</span></center></td>';
                                        } elseif ($registro->__get('PAC_Estado') == 0) {

                                          echo '<td><center><span class="label label-danger" title="Activo">Inactivo</span></center></td>';
                                        }
                                        ?>
                                        <td >
                                          <!--Botón visualizar registro -->
                                          <center> <a href='ListarUsuarios.php?usua=<?php echo $registro->__get('PAC_Id'); ?>&opc=ver'
                                            class="btn btn-info btn-sm glyphicon glyphicon-eye-open"  value=""></a></center>
                                          </td>
                                        </tr>

                                        <?php
                                      }
                                    }
                                    ?>

                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div><!-- fin del body-->

                          <div class="panel-footer">
                            <div class="row"> <!-- Paginación de Registros-->
                              <div class="col col-xs-4">Page 1 of 5 </div>
                              <div class="col col-xs-8">
                                <ul class="pagination hidden-xs pull-right">
                                  <li><a href="#">1</a></li>
                                  <li><a href="#">2</a></li>
                                  <li><a href="#">3</a></li>
                                  <li><a href="#">4</a></li>
                                  <li><a href="#">5</a></li>
                                </ul>
                                <ul class="pagination visible-xs pull-right">
                                  <li><a href="#">«</a></li>
                                  <li><a href="#">»</a></li>
                                </ul>
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
            <?php require_once("../../../../Apps/Main/footer.php"); ?>
          </body>
          </html>
          <script type="text/javascript">

          $(".delete-button").click(function () {
            var id = $(this).attr('value');
            var usuario = $(this).attr('id');
            //alert("Codigo del usuario seleccionado: "+id);
            if (confirm("Estas seguro, deseas elmininar usuario: [" + usuario.toUpperCase() + "] ?")) {
              $(".delete-button").attr("href", "InterfazUsuario.php?id=" + id + "&opc=eliminar");
            }
            else {
              return false;
            }
          });
          </script>
