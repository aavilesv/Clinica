<?php session_start();
require_once('../Controlador/CtrCita.php'); ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Citas Medicas</title>
        <?php
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
                                    <li><a href= " <?php echo $ruta; ?>Apps/Main/vista/menu.php">Inicio</a><span class="divider"></span></li>
                                    <li><a href="ListarCita.php?q=" class="active">Citas Medicas</a> <span class="divider">/</span></li>
                                </ul>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="page-header">Citas Pasadas</h1>
                            </div><!-- /.col-lg-12 -->
                        </div><!-- /.row -->

                        <?php
                        if (!isset($q)) {
                            $q = '';
                        }if (!isset($q1)) {
                            $q1 = '';
                        }
                        ?>

                        <div style="position: relative; top: -14px; right: 43px;" class="row">
                            <a class="btn btn-success col-md-offset-11" href='ManCita.php?usua=0&opc=nuevo&pac=&pacNo=&pro=&proNo=' role="button" align="right">
                                <i class="glyphicon glyphicon-plus-sign"> </i>
                                Nueva Cita
                            </a>
                        </div>


                        <div class="container-fluid">
                            <div class="row">
                                <div class="panel panel-default panel-table panel-success">
                                    <div style=" height: 60px; float: left;" class="panel-heading">
                                        <div class="row"> <!-- Criterios de Búsqueda-->
                                            <div class="col col-xs-6">

                                                <form style="position: relative; right: 23px;" method="GET" action="ListarCitasPasada.php" class="col-xs-8">
                                                    <div class="input-group">
                                                        <div class="input-group-btn search-panel">
                                                            <button type="button" class="btn btn-info">
                                                                <span id="search_concept">Buscar</span> <span class="caret"></span>
                                                            </button>
                                                        </div>
                                                        <input type="text" class="form-control" name="q" placeholder="Por Paciente... " value="<?= $q ?>">
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
                                                        </span>
                                                    </div>
                                                </form>

                                                <form style="position: relative; top: -33px; left: 270px;" method="GET" action="ListarCitasPasada.php" class="col-xs-5">
                                                    <div class="input-group">
                                                        <input  type="text" class="form-control" name="q1" placeholder="Por Profesion... " value="<?= $q1 ?>">
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
                                                        </span>
                                                    </div>
                                                </form>


                                            </div>
                                            <div class="col col-xs-6 text-right">
                                                <div class="btn-group">
                                                    <a class="btn btn-success col-md-offset-5" href='ListarCita.php' role="button" align="right">
                                                        Citas Actuales
                                                    </a>
                                                    <a class="btn btn-info col-md-offset-5" href='ListarCitasFuturas.php' role="button" align="right">
                                                        Citas Futuras
                                                    </a>
                                                    <a href="ListarCitasPasada.php?q=" class="btn btn-primary">
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
                                                <?php
                                                $ctrCita = new CtrCita();
                                                $registros = $ctrCita->getCitas1();
                                                if (count($registros) > 0) {
                                                    ?>


                                                     <table id="example" class="table  table-bordered" cellspacing="0" width="100%">
                                                         <br>     <thead>
                                                            <tr>
                                                                <th>Paciente</th>
                                                                <th>Profesional</th>
                                                                <th>Fecha Cita</th>
                                                                <th>Turno</th>
                                                                <th>Duracion</th>
                                                                <th>Estado</th>
                                                                <th>Acción</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            foreach ($registros as $registro) {
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $registro->__get('PAC_Id'); ?></td>
                                                                    <td><?php echo $registro->__get('PRO_Id'); ?></td>
                                                                    <td><?php echo $registro->__get('CIT_Fecha'); ?></td>
                                                                    <td><?php echo $registro->__get('CIT_Turno'); ?></td>
                                                                    <td><?php echo $registro->__get('CIT_Duracion'); ?></td>
                                                                    <?php
                                                                    if ($registro->__get('CIT_Estado') == 1) {
                                                                        echo '<td><center><span class="label label-success" title="Activo">Activo</span></center></td>';
                                                                    } elseif ($registro->__get('CIT_Estado') == 0) {

                                                                        echo '<td><center><span class="label label-danger" title="Activo">Inactivo</span></center></td>';
                                                                    }
                                                                    ?>
                                                                    <td>
                                                                        <a  rel="tooltip" title="Ver Registro" href='ManCita.php?usua=<?php echo $registro->__get('CIT_Id'); ?>&opc=ver1&pac=<?php echo $registro->__get('aux'); ?>&pacNo=<?php echo $registro->__get('PAC_Id'); ?>&pro=<?php echo $registro->__get('aux1'); ?>&proNo=<?php echo $registro->__get('PRO_Id'); ?>'
                                                                            class="btn btn-info btn-sm glyphicon glyphicon-eye-open"  value="<?php $registro->__get('CIT_Id'); ?>"></a>
                                                                            <!--Botón pregunta antes de  eliminar registro -->
                                                                            <a rel="tooltip" title="Eliminar Cita" class="delete-button btn btn-danger btn-sm glyphicon glyphicon-trash"  value="<?php echo $registro->__get('CIT_Id'); ?>" id=<?php echo $registro->__get('PAC_Id'); ?>></a>


                                                                </tr>
                                                            <?php }
                                                            ?>
                                                        </tbody>
                                                        <?php
                                                        ?>
                                                    </table>
                                                    <?php
                                                } else {
                                                    echo "<br><p class='alert alert-danger'>No hay registro de citas pasadas</p>";
                                                }
                                                ?>
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
        <script>
        $(document).ready(function() {
          $('#example').DataTable({
            responsive: true
          });
        });
        </script>
    </body>
</html>
<script type="text/javascript">

    $(".delete-button").click(function () {
        var Id = $(this).attr('value');
        var ficha = $(this).attr('Id');
        //alert("Codigo del usuario seleccionado: "+id);
        if (confirm("Estas seguro, deseas eliminar este registro -> " + ficha.toUpperCase() + " <- ?")) {
            $(".delete-button").attr("href", "InterfazCita.php?id=" + Id + "&opc=eliminarCompleto1");
        } else {
            return false;
        }
    });
</script>
