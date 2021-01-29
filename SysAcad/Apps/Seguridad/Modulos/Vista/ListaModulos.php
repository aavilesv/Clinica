<?php
session_start();
//$_SESSION['id_modulo']=$_GET['id'];
$rutaValidacion="../../../";
$rutaFoto="../../";
$ruraPerfil="../../";
$rut="../../";
$ruta = "../../../../";
  require_once("../../../../Apps/Main/head.php");
//require_once($u . "Apps/Main/Login/Vista/validarsession.php");
//incluyo en el ctrmodulo de la clase la manera de habilitar o desabilitar los botones
require_once('../Controlador/CtrModulo.php');
$cargarmenu = new CtrModulo();
$crgrol = $cargarmenu->consultarrolesmodulos($_SESSION['id_rol']);
foreach ($crgrol as $value) {
  if ($value['idModulo'] == $_SESSION['id_modulo']) {
    //echo $value['idModulo'];
    $nuevo = $value['nuevo'];
    $modificar = $value['modificar'];
    $eliminar = $value['eliminar'];
    //este ultimo todavia no se pone.
    $visualizar = $value['visualizar'];
  }
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Lista de Modulos registrados</title>
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
                <li><a href= " <?php echo $ruta; ?>Apps/Main/Login/Vista/Menu.php">Inicio</a><span class="divider"></span></li>
                <li><a href= " <?php echo $ruta; ?>Apps/Main/Login/Vista/Seguridad.php">Seguridad</a><span class="divider"></span></li>
                <li><a href="javascript:window.location.reload();" class="active">Consultar Modulo</a> <span class="divider">/</span></li>
              </ul>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <!--podria poner un nombre aki-->
              <h1 class="page-header">Modulos</h1>
            </div><!-- /.col-lg-12 -->
          </div><!-- /.row -->

          <div class="container-fluid">
            <div class="row">
              <div class="panel panel-default panel-table panel-success">
                <div class="panel-heading">
                  <div class="row"> <!-- Criterios de Búsqueda-->
                    <div class="col col-xs-6">
                      <form method="GET" action="ListarModulo.php">
                        <div class="input-group">
                          <div class="input-group-btn search-panel">
                            <button type="button" class="btn btn-info">
                              <span id="search_concept">Buscar Por </span> <span class="caret"></span>
                            </button>
                          </div>
                          <?php
                          if (!isset($busqueda)) {
                            $busqueda = '';
                          }
                          ?>
                          <input type="text" class="form-control" name="busqueda" placeholder="Ingrese criterio búsqueda... "
                          value="<?= $busqueda ?>" id="searchTerm" onkeyup="doSearch()">
                          <span class="input-group-btn">

                          </span>
                        </div>
                      </form>
                    </div>
                    <div class="col col-xs-6 text-right">
                      <div class="btn-group">
                        <a class="btn btn-success col-md-offset-11" href='ManModulo.php?usua=0&opc=nuevo' role="button" align="right"
                        <?php
                        if ($nuevo != 1) {
                          echo 'style="display:none;"';
                        }
                        ?>  >
                        <i class="glyphicon glyphicon-plus-sign" > </i>
                        Registrar modulo
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
                    <table class="table table-bordered table-hover table-condensed table-fixed display" id="example">
                      <!-- <?php foreach ($crgrol as $value) {
                        //if ($value['idModulo'] == $_SESSION['id_modulo']) {
                          echo 'idModulo: '.$_SESSION['id_modulo'].'<br>';
                          echo  'nuevo: '.$value['nuevo'].'<br>';
                          echo 'modifica: '.$value['modificar'].'<br>';
                          echo 'eliminar: '.$value['eliminar'].'<br>';
                          echo 'idModulo: '.$value['idModulo'].'<br>';
                          echo 'visualizar: '.$value['visualizar'].'<br>';

                        //}
                      } ?> -->
                      <thead>
                        <tr>
                          <?php echo $_SESSION['id_rol'];
                          echo $_SESSION['id_modulo'];?>
                          <th>Titulo</th>
                          <th>Detalle</th>
                          <th>Ruta</th>
                          <th>Imagen</th>
                          <th style="width: 1%">Color</th>
                          <th>Modulo Principal</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $ctrModulo = new CtrModulo();
                        $registros = $ctrModulo->getModulos();
                        foreach ($registros as $registro) {
                          $estado = $registro->__get('estado');
                          if ($estado != 0 && $estado != 3) {
                            ?>
                            <tr>
                              <td><small><?php echo $registro->__get('modNombre'); ?></small></td>
                              <td><small><?php echo $registro->__get('modDescripcion'); ?></small></td>
                              <td><small><?php echo $registro->__get('codigo'); ?></small></td>
                              <td align='center'><i class="fa <?php echo $registro->__get('modFoto').' fa-2x'; ?>"></i></td>
                              <td><div class="panel panel-<?php echo $registro->__get('color'); ?>"><div class="panel-heading"></div></div></td>
                              <?php
                              $cargarnombrepadre = new CtrModulo();
                              $idnombrepadre = $registro->__get('modPadre');
                              $registros1 = $ctrModulo->getModulo($idnombrepadre);
                              ?>
                              <td><small><?php echo $registros1->__get('modNombre'); ?></small></td>
                              <td><center><small>
                                <a title="Modifica el registro seleccionado" href='ManModulo.php?usua=<?php echo $registro->__get('idModulo'); ?>&opc=editar'
                                  class="btn btn-primary btn-sm glyphicon glyphicon glyphicon-pencil"
                                  <?php
                                  if ($modificar != 1) {
                                    echo 'style="display:none;"';
                                  }
                                  ?>></a>
                                  <!--Botón para elimina direcatamente el registro sin preguntar-->
                                  <a title="Elimina el registro seleccionado (sin preguntar)" href='InterfazModulo.php?id=<?php echo $registro->__get('idModulo'); ?>&opc=eliminar'
                                    class="btn btn-danger btn-sm glyphicon glyphicon glyphicon-trash"
                                    <?php
                                    if ($eliminar != 1) {
                                      echo 'style="display:none;"';
                                    }
                                    ?> ></a>
                                    <!--Botón pregunta antes de  eliminar registro -->
                                    <a title="Elimina el registro seleccionado (preguntando)" class="delete-button btn btn-warning btn-sm glyphicon glyphicon-remove-circle"
                                    value="<?php echo $registro->__get('idModulo'); ?>"id=<?php echo $registro->__get('modNombre'); ?>
                                    <?php
                                    if ($eliminar != 1) {
                                      echo 'style="display:none;"';
                                    }
                                    ?>></a>
                                    <!--Botón visualizar registro -->
                                    <!--title="Visualizar el registro seleccionado"-->
                                    <a href='ManModulo.php?usua=<?php echo $registro->__get('idModulo'); ?>&opc=ver'
                                      class="btn btn-info btn-sm glyphicon glyphicon-eye-open"  value="<?php $registro->__get('idModulo'); ?>"
                                      <?php
                                      if ($visualizar != 1) {
                                        echo 'style="display:none;"';
                                      }
                                      ?>></a>
                                    </small></center></td>
                                  </tr>
                                  <?php
                                }
                              }
                              ?>
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
    <?php require_once("../../../../Apps/Main/footer.php"); ?>
    </body>
    </html>
    <script language="javascript">

    function doSearch()

    {

      var tableReg = document.getElementById('example');

      var searchText = document.getElementById('searchTerm').value.toLowerCase();

      var cellsOfRow = "";

      var found = false;

      var compareWith = "";



      // Recorremos todas las filas con contenido de la tabla

      for (var i = 1; i < tableReg.rows.length; i++)

      {

        cellsOfRow = tableReg.rows[i].getElementsByTagName('td');

        found = false;

        // Recorremos todas las celdas

        for (var j = 0; j < cellsOfRow.length && !found; j++)

        {

          compareWith = cellsOfRow[j].innerHTML.toLowerCase();

          // Buscamos el texto en el contenido de la celda

          if (searchText.length == 0 || (compareWith.indexOf(searchText) > -1))

          {

            found = true;

          }

        }

        if (found)

        {

          tableReg.rows[i].style.display = '';

        } else {

          // si no ha encontrado ninguna coincidencia, esconde la

          // fila de la tabla

          tableReg.rows[i].style.display = 'none';

        }

      }

    }

  </script>
  <script type="text/javascript">

  $(".delete-button").click(function () {
    var id = $(this).attr('value');
    var usuario = $(this).attr('id');
    //alert("Codigo del usuario seleccionado: "+id);
    if (confirm("¿Estas seguro, deseas eliminar modulo: " + usuario.toUpperCase() + " ?")) {
      $(".delete-button").attr("href", "InterfazModulo.php?id=" + id + "&opc=eliminar");
    } else {
      return false;
    }
  });
</script>
