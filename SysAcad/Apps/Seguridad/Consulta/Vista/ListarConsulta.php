<?php session_start();
require_once('../Controlador/CtrConsulta.php'); ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Consultas</title>
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
                                    <li><a href="ListarConsulta.php?q=" class="active">Consulta</a> <span class="divider">/</span></li>
                                </ul>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="page-header">Consulta</h1>
                            </div><!-- /.col-lg-12 -->
                        </div><!-- /.row -->

                        <?php
                        if (!isset($q)) {
                            $q = '';
                        }if (!isset($q1)) {
                            $q1 = '';
                        }if (!isset($q2)) {
                            $q2 = '';
                        }
                        ?>

                        <div class="container-fluid">
                            <div class="row">
                                <div class="panel panel-default panel-table panel-info">
                                    <div style=" height: 60px; float: left;" class="panel-heading">
                                        <div class="row"> <!-- Criterios de Búsqueda-->
                                            <div class="col col-xs-6">


                                                <form style="position: relative; right: 23px;" method="GET" action="ListarConsulta.php" class="col-xs-7">
                                                    <div class="input-group">
                                                        <div class="input-group-btn search-panel">
                                                            <button type="button" class="btn btn-info">
                                                                <span id="search_concept">Buscar</span> <span class="caret"></span>
                                                            </button>
                                                        </div>
                                                        <input type="text" class="form-control" name="q" placeholder="Por Paciente.. " value="<?= $q ?>">
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
                                                        </span>
                                                    </div>
                                                </form>


                                                <form style="position: relative; top: 1px; left: 145px;" method="GET" action="ListarConsulta.php" class="col-xs-5">
                                                    <div class="input-group">
                                                        <input  type="text" class="form-control" name="q1" placeholder="Por Enfermedad.. " value="<?= $q1 ?>">
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
                                                        </span>
                                                    </div>
                                                </form>

                                                <form style="position: relative; top: -33px; left: 240px;" method="GET" action="ListarConsulta.php" class="col-xs-5">
                                                    <div class="input-group">
                                                        <input  type="text" class="form-control" name="q2" placeholder="Por Profesional.. " value="<?= $q2 ?>">
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
                                                        </span>
                                                    </div>
                                                </form>

                                            </div>
                                            <div class="col col-xs-6 text-right">
                                                <div class="btn-group">
                                                    <a class="btn btn-success col-md-offset-11" href='ManConsulta.php?usua=0&opc=nuevo' role="button" align="right">
                                                        <i class="glyphicon glyphicon-plus-sign"> </i>
                                                        Nuevo Registro
                                                    </a>
                                                    <a href="javascript:window.location.reload();" class="btn btn-primary">
                                                        <i class="glyphicon glyphicon-refresh"> </i>
                                                        Actualizar
                                                    </a>

                                                    <button value="cargar" id="cargar" rel="tooltip" title="Ver estadisticas de los pacientes"  type="button" class="btn btn-warning btn-ms" data-toggle="modal" data-target="#myModal"><i  class='fa fa-user'></i>&nbsp;Biometría</button>

                                                </div>
                                            </div>
                                        </div> <!-- Fin Criterios de Búsqueda-->
                                    </div>

                                    <div class="panel-body">
                                        <div class="row"><!-- Cuerpo de Tabla-->
                                            <div class="col-sx-12 col-md-12 table-responsive">
                                                <?php
                                                $ctrFicha = new CtrConsulta;
                                                $registros = $ctrFicha->getConsultas();
                                                if (count($registros) > 0) {
                                                    ?>

                                                    <table id="example" class="table  table-bordered" cellspacing="0" width="100%">
                                                        <br>    <thead>
                                                            <tr>
                                                                <th>Profesional</th>
                                                                <th>Enfermedades</th>
                                                                <th>Paciente</th>
                                                                <th>Diagnostico</th>
                                                                <th>Receta</th>
                                                                <th>Tratamiento</th>
                                                                <th>Fecha</th>
                                                                <th>Estado</th>
                                                                <th>Acción</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            foreach ($registros as $registro) {
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $registro->__get('PRO_Id'); ?></td>
                                                                    <td><?php echo $registro->__get('ENF_Id'); ?></td>
                                                                    <td><?php echo $registro->__get('FIC_Id'); ?></td>
                                                                    <td><center>
                                                                <a rel="tooltip" title="Ver Diagnostico" class="vermas-button btn btn-info"  value="<?php echo $registro->__get('CON_Diagnostico'); ?>">Ver mas</a>
                                                            </center></td>
                                                            <td><center>
                                                                <a rel="tooltip" title="Ver Receta" class="vermas1-button btn btn-info"  value="<?php echo $registro->__get('CON_Receta'); ?>">Ver mas</a>
                                                            </center></td>
                                                            <td><center>
                                                                <a rel="tooltip" title="Ver Tratamiento" class="vermas2-button btn btn-info"  value="<?php echo $registro->__get('CON_Trat') ."\nMedicacion: ". $registro->__get('idKardex'); ?>"> Ver mas</a>

                                                            </center></td>
                                                            <td><?php echo $registro->__get('CON_Fecha'); ?></td>

                                                            <?php
                                                            if ($registro->__get('CON_Estado') == 1) {
                                                                echo '<td><center><span class="label label-success" title="Activo">Activo</span></center></td>';
                                                            } elseif ($registro->__get('CON_Estado') == 0) {

                                                                echo '<td><center><span class="label label-danger" title="Activo">Inactivo</span></center></td>';
                                                            }
                                                            ?>

                                                            <td>

                                                                <?php if ($registro->__get('CON_Estado') == 1) { ?>
                                                                    <!--Botón para deshabilitar direcatamente el registro sin preguntar-->
                                                                    <a rel="tooltip" title="Desactivar Registro"  href='InterfazConsulta.php?id=<?php echo $registro->__get('CON_Id'); ?>&opc=eliminar'
                                                                       class="btn btn-danger btn-sm glyphicon glyphicon  glyphicon-check"></a>

                                                                    <a rel="tooltip" title="Ver Registro"  href='ManConsulta.php?usua=<?php echo $registro->__get('CON_Id'); ?>&opc=ver'
                                                                       class="btn btn-info btn-sm glyphicon glyphicon-eye-open"  value="<?php $registro->__get('CON_Id'); ?>"></a>

                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    <a rel="tooltip" title="Activar Registro" href='InterfazConsulta.php?id=<?php echo $registro->__get('CON_Id'); ?>&opc=eliminar1'
                                                                       class="btn btn-success btn-sm glyphicon glyphicon  glyphicon-check"></a>

                                                                    <a rel="tooltip" title="Eliminar Registro" href='InterfazConsulta.php?id=<?php echo $registro->__get('CON_Id'); ?>&opc=eliminarCompleto'
                                                                       class="btn btn-danger btn-sm glyphicon glyphicon glyphicon-trash"></a>
                                                                    <!--Botón pregunta antes de  eliminar registro -->

                                                                    <a  rel="tooltip" title="Eliminar Registro" class="delete-button btn btn-warning btn-sm glyphicon glyphicon-remove-circle"  value="<?php echo $registro->__get('FIC_Id'); ?>" id=<?php echo $registro->__get('CON_Id'); ?>></a>
                                                                    <!--Botón visualizar registro -->

                                                                    <a rel="tooltip" title="Ver Registro"  href='ManConsulta.php?usua=<?php echo $registro->__get('CON_Id'); ?>&opc=ver'
                                                                       class="btn btn-info btn-sm glyphicon glyphicon-eye-open"  value="<?php $registro->__get('CON_Id'); ?>"></a>
                                                                   <?php }
                                                                   ?>
                                                            </td>
                                                            </tr>
                                                        <?php }
                                                        ?>
                                                        </tbody>
                                                        <?php
                                                        ?>
                                                    </table>
                                                    <?php
                                                } else {
                                                    echo " <br> <p class='alert alert-danger'>No existen consultas registradas</p>";
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


        <!-- Modal -->

        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div  class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Biometria de Pacientes</h4>
                    </div>

                    <div class=" col-md-14 table-responsive" style="text-align:center;" >
                        <table id="example" class="table  table-bordered" cellspacing="0" width="100%">
                            <br>
                            <thead>
                                <tr>
                                    <th style="background-color: #F8F9F9;">Paciente</th>
                                    <th>Presión Arterial</th>
                                    <th style="background-color: #F8F9F9;">Pulsaciones</th>
                                    <th>Ritmo Respiratorio</th>
                                    <th style="background-color: #F8F9F9;">Temperatura</th>
                                    <th>Altura</th>
                                    <th style="background-color: #F8F9F9;">Peso</th>
                                    <th>Masa Corporal</th>
                                    <th style="background-color: #F8F9F9;">Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($registros as $registro) {
                                    ?>
                                    <tr>
                                        <td style="background-color: #F8F9F9;"><?php echo $registro->__get('FIC_Id'); ?></td>
                                        <td><?php echo $registro->__get('CON_Parte'); ?> mmHg</td>
                                        <td style="background-color: #F8F9F9;"><?php echo $registro->__get('CON_Pulsa'); ?> x/Seg</td>
                                        <td><?php echo $registro->__get('CON_RRespi'); ?></td>
                                        <td style="background-color: #F8F9F9;"><?php echo $registro->__get('CON_Temp'); ?> Grados</td>
                                        <td><?php echo $registro->__get('CON_Altura'); ?> Cm</td>
                                        <td style="background-color: #F8F9F9;"><?php echo $registro->__get('CON_Peso'); ?> Kg</td>
                                        <td><?php echo $registro->__get('CON_Imc'); ?> %</td>
                                        <td style="background-color: #F8F9F9;"><?php echo $registro->__get('CON_Fecha'); ?></td>

                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>





        <?php require_once("../../../../Apps/Main/footer.php"); ?>
    </body>

</html>
<script type="text/javascript">

    $(".delete-button").click(function () {
        var Id = $(this).attr('id');
        var ficha = $(this).attr('value');
        //alert("Codigo del usuario seleccionado: "+id);
        if (confirm("Estas seguro, deseas eliminar este registro -> " + ficha.toUpperCase() + " <- ?")) {
            $(".delete-button").attr("href", "InterfazConsulta.php?id=" + Id + "&opc=eliminarCompleto");
        } else {
            return false;
        }
    });


    $(".vermas-button").click(function () {
        var Ficha = $(this).attr('value');
        swal("Diagnostico: " + Ficha);
    });

    $(".vermas1-button").click(function () {
        var Ficha = $(this).attr('value');
        swal("Receta: " + Ficha);
    });

    $(".vermas2-button").click(function () {
        var Ficha = $(this).attr('value');
        swal("Tratamiento: " + Ficha);
    });

    $(".vermas3-button").click(function () {
        var Ficha = $(this).attr('value');
        swal("Medicamento: " + Ficha);
    });



</script>
