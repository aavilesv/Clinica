<?php
session_start();

require_once('../Controlador/CtrPermisos.php');
$cargarmenu = new CtrPermisos();
$crgrol = $cargarmenu->consultarrolesmodulos($_SESSION['id_rol']);
foreach ($crgrol as $value) {
  if ($value['idModulo'] == $_SESSION['id_modulo']) {
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
  <title>Lista de Usuarios</title>
  <?php
  // $ruta = "../../../../";
  // require_once("../../../../Apps/Main/Login/Vista/head.php");
  $rutaValidacion="../../../../";
  $rutaFoto="../../";
  $ruraPerfil="../../";
  $rut="../../../";
  $ruta = "../../../../";
  require_once("../../../../Apps/Main/head.php");
  ?>

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
                <li><a href="javascript:window.location.reload();" class="active">Consultar permisos</a> <span class="divider">/</span></li>
              </ul>
            </div>
          </div>
          <?php
          echo $_SESSION['id_modulo'].'<br>';
          echo $value['idModulo'].'<br>';
          ?>
          <div class="row">
            <div class="col-lg-12">
              <h1 class="page-header">Permisos</h1>
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
                          <input type="text" class="form-control" name="q" placeholder="Ingrese criterio búsqueda... " value=""
                          id="searchTerm" onkeyup="doSearch()">
                          <span class="input-group-btn">

                          </span>
                        </div>
                      </form>
                    </div>
                    <div class="col col-xs-6 text-right">
                      <div class="btn-group">
                        <a class="btn btn-success col-md-offset-11" href='ManPermisos.php?usua=0&opc=nuevo' role="button" align="right"
                        <?php
                        if ($nuevo != 1) {
                          echo 'style="display:none;"';
                        }
                        ?>>
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
                    <table class="table table-bordered table-hover table-condensed table-fixed display" id="example">
                      <thead>
                        <tr>
                          <th>Codigo</th>
                          <th>Rol</th>
                          <th>Modulo</th>
                          <th>Nuevo</th>
                          <th>Modificar</th>
                          <th>Eliminar</th>
                          <th>Visualizar</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $ctrUsuario = new CtrPermisos();
                        $registros = $ctrUsuario->getPermisos();
                        $estado = '';
                        foreach ($registros as $registro) {
                          $estado = $registro->__get('estado');
                          if ($estado == 1) {
                            ?>
                            <tr>
                              <td><small><?php echo $registro->__get('idRolMod'); ?></small></td>
                              <td><small><?php echo $registro->__get('idRol'); ?></small></td>
                              <td><small><?php echo $registro->__get('idModulo'); ?></small></td>
                              <td><small><?php
                              if ($registro->__get('nuevo') == '1') {
                                echo "<center><span class='label label-success' title='Activo'>Activo</span></center>";
                              } else {
                                echo "<center><span class='label label-danger' title='Activo'>Inactivo</span></center>";
                              }
                              ?></small></td>
                              <td><small><?php
                              if ($registro->__get('modificar') == '1') {
                                echo "<center><span class='label label-success' title='Activo'>Activo</span></center>";
                              } else {
                                echo "<center><span class='label label-danger' title='Activo'>Inactivo</span></center>";
                              }
                              ?></small></td>
                              <td><small><?php
                              if ($registro->__get('eliminar') == '1') {
                                echo "<center><span class='label label-success' title='Activo'>Activo</span></center>";
                              } else {
                                echo "<center><span class='label label-danger' title='Activo'>Inactivo</span></center>";
                              }
                              ?></small></td>
                              <td><small><?php
                              if ($registro->__get('visualizar') == '1') {
                                echo "<center><span class='label label-success' title='Activo'>Activo</span></center>";
                              } else {
                                echo "<center><span class='label label-danger' title='Activo'>Inactivo</span></center>";
                              }
                              ?></small></td>
                              <td><center><small>
                                <a title="Modifica el registro seleccionado" href='ManPermisos.php?usua=<?php echo $registro->__get('idRolMod'); ?>&opc=editar'
                                  class="btn btn-primary btn-sm glyphicon glyphicon glyphicon-pencil"
                                  <?php
                                  if ($modificar != 1) {
                                    echo 'style="display:none;"';
                                  }
                                  ?>></a>
                                  <!--Botón para elimina direcatamente el registro sin preguntar-->
                                  <a title="Elimina el registro seleccionado (sin preguntar)" href='InterfazPermisos.php?id=<?php echo $registro->__get('idRolMod'); ?>&opc=eliminar'
                                    class="btn btn-danger btn-sm glyphicon glyphicon glyphicon-trash"
                                    <?php
                                    if ($eliminar != 1) {
                                      echo 'style="display:none;"';
                                    }
                                    ?>></a>
                                    <!--Botón pregunta antes de  eliminar registro -->
                                    <a title="Elimina el registro seleccionado (preguntando)" class="delete-button btn btn-warning btn-sm glyphicon glyphicon-remove-circle"
                                    value="<?php echo $registro->__get('idRolMod'); ?>" id=<?php echo $registro->__get('idRolMod'); ?>
                                    <?php
                                    if ($eliminar != 1) {
                                      echo 'style="display:none;"';
                                    }
                                    ?>></a>
                                    <!--Botón visualizar registro -->
                                    <a title="Visualizar el registro seleccionado" href='ManPermisos.php?usua=<?php echo $registro->__get('idRolMod'); ?>&opc=ver'
                                      class="btn btn-info btn-sm glyphicon glyphicon-eye-open"  value="<?php $registro->__get('idRolMod'); ?>"
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
      $(".delete-button").attr("href", "InterfazPermisos.php?id=" + id + "&opc=eliminar");
    } else {
      return false;
    }
  });
</script>
