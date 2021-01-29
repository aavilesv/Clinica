<?php session_start(); ?><!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mantenimiento de Cita</title>

        <?php
        $rutaValidacion="../../../../";
        $rutaFoto="../../";
        $ruraPerfil="../../";
        $rut="../../../";
        $ruta = "../../../../";
        require_once("../../../../Apps/Main/head.php");
        require_once('../Controlador/CtrCita.php');
        ?>

    </head>
    <body>
        <?php
        require_once("../../../../Apps/Main/header.php");
        if (isset($_GET['opc'])) {
            switch ($_GET['opc']) {
                case 'nuevo':
                    # Para nuevo registro

                    $CIT_Id = 0;
                    $PAC_Id = "";
                    $PRO_Id = "";
                    $CIT_Fecha = "";
                    $CIT_Turno = "";
                    $CIT_Duracion = "";
                    $CIT_Estado = "";
                    $hidden = '';
                    $disabled = '';
                    break;
                case 'editar':
                    $ficha = new CtrCita();
                    $registros = $ficha->getCita($_GET['usua']);

                    $CIT_Id = $registros->__get('CIT_Id');
                    $PAC_Id = $registros->__get('PAC_Id');
                    $PRO_Id = $registros->__get('PRO_Id');
                    $CIT_Fecha = $registros->__get('CIT_Fecha');
                    $CIT_Turno = $registros->__get('CIT_Turno');
                    $CIT_Duracion = $registros->__get('CIT_Duracion');
                    $CIT_Estado = $registros->__get('CIT_Estado');
                    $hidden = 'hidden';
                    $disabled = '';

                    break;
                case 'editar1':
                    $ficha = new CtrCita();
                    $registros = $ficha->getCita($_GET['usua']);

                    $CIT_Id = $registros->__get('CIT_Id');
                    $PAC_Id = $registros->__get('PAC_Id');
                    $PRO_Id = $registros->__get('PRO_Id');
                    $CIT_Fecha = $registros->__get('CIT_Fecha');
                    $CIT_Turno = $registros->__get('CIT_Turno');
                    $CIT_Duracion = $registros->__get('CIT_Duracion');
                    $CIT_Estado = $registros->__get('CIT_Estado');
                    $hidden = 'hidden';
                    $disabled = '';

                    break;
                case 'ver':
                    $ficha = new CtrCita();
                    $registros = $ficha->getCita($_GET['usua']);

                    $CIT_Id = $registros->__get('CIT_Id');
                    $PAC_Id = $registros->__get('PAC_Id');
                    $PRO_Id = $registros->__get('PRO_Id');
                    $CIT_Fecha = $registros->__get('CIT_Fecha');
                    $CIT_Turno = $registros->__get('CIT_Turno');
                    $CIT_Duracion = $registros->__get('CIT_Duracion');
                    $CIT_Estado = $registros->__get('CIT_Estado');

                    $hidden = '';
                    $disabled = 'disabled';

                    break;
                case 'ver1':
                    $ficha = new CtrCita();
                    $registros = $ficha->getCita($_GET['usua']);

                    $CIT_Id = $registros->__get('CIT_Id');
                    $PAC_Id = $registros->__get('PAC_Id');
                    $PRO_Id = $registros->__get('PRO_Id');
                    $CIT_Fecha = $registros->__get('CIT_Fecha');
                    $CIT_Turno = $registros->__get('CIT_Turno');
                    $CIT_Duracion = $registros->__get('CIT_Duracion');
                    $CIT_Estado = $registros->__get('CIT_Estado');

                    $hidden = '';
                    $disabled = 'disabled';

                    break;
                case 'ver2':
                    $ficha = new CtrCita();
                    $registros = $ficha->getCita($_GET['usua']);

                    $CIT_Id = $registros->__get('CIT_Id');
                    $PAC_Id = $registros->__get('PAC_Id');
                    $PRO_Id = $registros->__get('PRO_Id');
                    $CIT_Fecha = $registros->__get('CIT_Fecha');
                    $CIT_Turno = $registros->__get('CIT_Turno');
                    $CIT_Duracion = $registros->__get('CIT_Duracion');
                    $CIT_Estado = $registros->__get('CIT_Estado');

                    $hidden = '';
                    $disabled = 'disabled';

                    break;
            }
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
                                    <li><a href= " <?php echo $ruta; ?>Apps/seguridad/Cita/Vista/ListarCita.php">Cita</a><span class="divider"></span></li>
                                    <li><a href="javascript:window.location.reload();" class="active">Mantenimiento Cita</a> <span class="divider">/</span></li>
                                </ul>
                            </div>
                        </div>



                        <?php if (isset($_GET['opc']) && ($_GET['opc'] == 'nuevo' || $_GET['opc'] == 'editar')) {
                            ?>
                            <div class="row-fluid">
                                <div class="col-lg-12">
                                    <h1 class="page-header">Ingreso Cita</h1>
                                </div><!-- /.col-lg-12 -->
                            </div>

                        <?php } if (isset($_GET['opc']) && ($_GET['opc'] == 'editar1')) {
                            ?>
                            <div class="row-fluid">
                                <div class="col-lg-12">
                                    <h1 class="page-header">Editar Cita Futura</h1>
                                </div><!-- /.col-lg-12 -->
                            </div>

                        <?php } if (isset($_GET['opc']) && ($_GET['opc'] == 'ver')) {
                            ?>

                            <div class="row-fluid">
                                <div class="col-lg-12">
                                    <h1 class="page-header">Mantenimiento Cita Actuales</h1>
                                </div><!-- /.col-lg-12 -->
                            </div>

                        <?php } if (($_GET['opc'] == 'ver1')) {
                            ?>

                            <div class="row-fluid">
                                <div class="col-lg-12">
                                    <h1 class="page-header">Mantenimiento Cita Pasadas</h1>
                                </div><!-- /.col-lg-12 -->
                            </div>

                            <?php
                        } if (($_GET['opc'] == 'ver2')) {
                            ?><div class="row-fluid">
                                <div class="col-lg-12">
                                    <h1 class="page-header">Mantenimiento Citas Futuras</h1>
                                </div><!-- /.col-lg-12 -->
                            </div>
                        <?php }
                        ?>

                        <!-- /.row -->

                        <div class="container-fluid">
                            <div class="col-xs-12 col-md-2"></div>
                            <div class="col-xs-12 col-md-7">
                                <br>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Registro de Cita
                                    </div>

                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-10">
                                                <form class="form-horizontal" name="frmUsuario"  method="post" action="InterfazCita.php">

                                                    <div class="form-group">
                                                        <div class="col-md-9">
                                                            <input type="hidden" class="form-control " name="id" maxlength="45"
                                                                   id="CAR_Id" required="true" value='<?= $CIT_Id; ?>'>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Paciente:</label>

                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="PAC_Id" maxlength="50"
                                                                   id="PAC_Id" value ='<?php echo $_GET['pacNo'] ?>' required="true" disabled="">

                                                            <input  type="hidden" class="form-control" name="PAC_Id" maxlength="45" id="PAC_Id"
                                                                    required="true" value='<?php echo $_GET['pac'] ?>'>
                                                        </div>

                                                        <button rel="tooltip" title="Seleccionar Paciente" style="position: absolute; top:15px; left: 440px;" type="button" class="btn btn-info btn-ms" data-toggle="modal" data-target="#myModal"><i  class='fa fa-user'></i></button>

                                                        <a style="position: absolute; top:15px; left: 485px;" target="_blank" href="../../Paciente/Vista/ManPaciente.php?usua=0&opc=nuevo" rel="tooltip" title="Ingresar mas pacientes" class="btn btn-success btn-success btn-ms">
                                                            <i  class='fa fa-plus'></i>
                                                        </a>

                                                    </div>



                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Profesional:</label>


                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control pac_Edad " name="PRO_Id" maxlength="50"
                                                                   id="PRO_Id" value ='<?php echo $_GET['proNo'] ?>' required="true" disabled="">

                                                            <input  type="hidden" class="form-control preciop" name="PRO_Id" maxlength="45" id="PRO_Id1"
                                                                    required="true" value='<?php echo $_GET['pro'] ?>'>
                                                        </div>

                                                        <button rel="tooltip" title="Seleccionar Profesional" style="position: absolute; top:65px; left: 440px;" type="button" class="btn btn-info btn-ms" data-toggle="modal" data-target="#myModal1"><i  class='fa fa-user'></i></button>

                                                        <a style="position: absolute; top:65px; left: 485px;" target="_blank" href="../../Profesional/Vista/ManProfesional.php?usua=0&opc=nuevo" rel="tooltip" title="Ingresar mas profesionales" class="btn btn-success btn-success btn-ms">
                                                            <i  class='fa fa-plus'></i>
                                                        </a>

                                                    </div>


                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Fecha de Cita:</label>
                                                        <div class="col-md-9">
                                                            <input type="date" class="form-control " name="CIT_Fecha"
                                                                   id="CIT_Fecha" value ='<?= $CIT_Fecha ?>' required="true" <?php echo $disabled ?>>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Turno:</label>
                                                        <div class="col-md-9">
                                                            <input type="time" class="form-control " name="CIT_Turno" max="1000"
                                                                   id="CIT_Turno" value ='<?= $CIT_Turno; ?>' required="true" min="1" <?php echo $disabled ?>>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Duracion:</label>
                                                        <div class="col-md-9 text-center" >
                                                            <select name="CIT_Duracion" class="form-control">
                                                                <option value="15 Minutos" <?= $CIT_Duracion == '15 Minutos' ? 'selected' : '' ?>>15 Minutos</option>
                                                                <option value="30 Minutos" <?= $CIT_Duracion == '30 Minutos' ? 'selected' : '' ?>>30 Minutos</option>
                                                                <option value="45 Minutos" <?= $CIT_Duracion == '45 Minutos' ? 'selected' : '' ?>>45 Minutos</option>
                                                                <option value="1 Hora" <?= $CIT_Duracion == '1 Hora' ? 'selected' : '' ?>>1 Hora</option>
                                                                <option value="2 Horas" <?= $CIT_Duracion == '2 Horas' ? 'selected' : '' ?>>2 Horas</option>
                                                                <option value="3 Horas" <?= $CIT_Duracion == '3 Horas' ? 'selected' : '' ?>>3 Horas</option>
                                                                <option value="4 Horas" <?= $CIT_Duracion == '4 Horas' ? 'selected' : '' ?>>4 Horas</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Estado:</label>
                                                        <div class="col-md-9 text-center" >
                                                            <label class="checkbox form-control"><input  id="CIT_Estado" type="checkbox" name="CIT_Estado" <?= ($CIT_Estado == 1 ? "checked" : "notchecked") ?> <?php echo $disabled ?>>Activo</label>

                                                        </div>
                                                    </div>


                                                    <?php if (isset($_GET['opc']) && ($_GET['opc'] == 'nuevo' || $_GET['opc'] == 'editar')) {
                                                        ?>
                                                        <div class="btn btn-group col-md-offset-3 ">
                                                            <div class="col-md-2">
                                                                <button type="submit" class=" btn btn-success "><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
                                                            </div>

                                                            <div class="col-md-2 col-md-offset-3">
                                                                <a href="ListarCita.php" id="btnSalir" class="btn btn-danger"> <i class="glyphicon glyphicon-remove"></i> Cancelar</a>
                                                            </div>
                                                        </div>

                                                    <?php } if (($_GET['opc'] == 'editar1')) {
                                                        ?>

                                                        <div class="btn btn-group col-md-offset-3 ">
                                                            <div class="col-md-2">
                                                                <button type="submit" class=" btn btn-success "><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
                                                            </div>

                                                            <div class="col-md-2 col-md-offset-3">
                                                                <a href="ListarCitasFuturas.php" id="btnSalir" class="btn btn-danger"> <i class="glyphicon glyphicon-remove"></i> Cancelar</a>
                                                            </div>
                                                        </div>


                                                    <?php } if (isset($_GET['opc']) && ($_GET['opc'] == 'ver')) {
                                                        ?>

                                                        <div class="col-md-2 col-md-offset-3 ">
                                                            <a href="ListarCita.php" id="btnSalir" class="btn btn-primary" <i class="glyphicon glyphicon-remove"></i> Regresar</a>
                                                        </div>


                                                    <?php } if (($_GET['opc'] == 'ver1')) {
                                                        ?>

                                                        <div class="col-md-2 col-md-offset-3 ">
                                                            <a href="ListarCitasPasada.php" id="btnSalir" class="btn btn-primary" <i class="glyphicon glyphicon-remove"></i> Regresar</a>
                                                        </div>

                                                        <?php
                                                    } if (($_GET['opc'] == 'ver2')) {
                                                        ?>
                                                        <div class="col-md-2 col-md-offset-3 ">
                                                            <a href="ListarCitasFuturas.php" id="btnSalir" class="btn btn-primary" <i class="glyphicon glyphicon-remove"></i> Regresar</a>
                                                        </div>
                                                    <?php }
                                                        ?>
                                                        <input type="hidden"  name="opc" id="opc" value='<?= $_GET['opc']; ?>' /><br>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-footer">
                                        <div class="row"> <!-- Paginación de Registros-->
                                            <br>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-3"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-------------------------------------- PACIENTES ---------------------------------->

                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-lg-5">

                        <!-- Modal content-->
                        <div  class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Lista de Pacientes</h4>
                            </div>

                            <div id="example1" class=" col-md-14 table-responsive" style="text-align:center;">
                                <table id="" class="table table-striped table-hover responsive "><br>
                                    <thead>
                                        <tr>
                                            <th>Foto</th>
                                            <th>Cedula</th>
                                            <th>Nombre</th>
                                            <th>Sexo</th>
                                            <th>Edad</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $ficha = new CtrCita();
                                        $registros = $ficha->getPaciente();
                                        foreach ($registros as $registro) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <img src="<?= $registro->__get('PAC_Foto'); ?>" height="60px" width="80px"  >
                                                </td>
                                                <td><?php echo $registro->__get('PAC_Cedula'); ?></td>
                                                <td><?php echo $registro->__get('PAC_Nombre') . " " . $registro->__get('PAC_Apellido'); ?></td>
                                                <td><?php echo $registro->__get('PAC_Sexo'); ?></td>
                                                <td><?php echo $registro->__get('PAC_Edad'); ?></td>
                                                <td>
                                                    <a  rel="tooltip" title="Agregar Paciente" href='ManCita.php?usua=<?php echo $_GET['usua'] ?>&opc=<?php echo $_GET['opc'] ?>&pac=<?php echo $registro->__get('PAC_Id'); ?>&pacNo=<?php echo $registro->__get('PAC_Nombre') . " " . $registro->__get('PAC_Apellido'); ?>&pro=<?php echo $_GET['pro'] ?>&proNo=<?php echo $_GET['proNo'] ?>'
                                                        class="btn btn-success btn-sm glyphicon glyphicon glyphicon-plus"></a>
                                                </td>
                                            </tr>
                                        <?php }
                                        ?>
                                    </tbody>
                                </table>
                            </div>

                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>


                <!------------------------------- PROFESIONALES ------------------->


                <div id="myModal1" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-lg-5">

                        <!-- Modal content-->
                        <div  class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Lista de Profesionales</h4>
                            </div>

                            <div id="example1" class=" col-md-14 table-responsive" style="text-align:center;">
                                 <table id="" class="table table-striped table-hover responsive"><br>
                                    <thead>
                                        <tr>
                                            <th>Foto</th>
                                            <th>Cedula</th>
                                            <th>Nombre</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $ficha = new CtrCita();
                                        $registros = $ficha->getProfesional();
                                        foreach ($registros as $registro) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <img src="<?= $registro->__get('PRO_Foto'); ?>" height="50">
                                                </td>
                                                <td><?php echo $registro->__get('PRO_Cedula'); ?></td>
                                                <td><?php echo $registro->__get('PRO_Nombre') . " " . $registro->__get('PRO_Apellido'); ?></td>
                                                <td>
                                                    <a  rel="tooltip" title="Agregar Profesional" href='ManCita.php?usua=<?php echo $_GET['usua'] ?>&opc=<?php echo $_GET['opc'] ?>&pac=<?php echo $_GET['pac'] ?>&pacNo=<?php echo $_GET['pacNo'] ?>&pro=<?php echo $registro->__get('PRO_Id'); ?>&proNo=<?php echo $registro->__get('PRO_Nombre') . " " . $registro->__get('PRO_Apellido'); ?>'
                                                        class="btn btn-success btn-sm glyphicon glyphicon glyphicon-plus"></a>
                                                </td>
                                            </tr>
                                        <?php }
                                        ?>
                                    </tbody>
                                </table>




                            </div>
                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>




                <?php require_once("../../../../Apps/Main/footer.php"); ?>

                </body>
                </html>
