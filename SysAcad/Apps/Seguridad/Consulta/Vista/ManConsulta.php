<?php session_start(); ?><!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mantenimiento de Consulta</title>

        <?php
        $rutaValidacion="../../../../";
        $rutaFoto="../../";
        $ruraPerfil="../../";
        $rut="../../../";
        $ruta = "../../../../";
        require_once("../../../../Apps/Main/head.php");
        require_once('../Controlador/CtrConsulta.php');
        ?>

    </head>
    <body>
        <?php
        require_once("../../../../Apps/Main/header.php");
        if (isset($_GET['opc'])) {
            switch ($_GET['opc']) {
                case 'nuevo':
                    # Para nuevo registro

                    $CON_Id = 0;
                    $PRO_Id = "";
                    $ENF_Id = "";
                    $FIC_Id = "";
                    $CON_Diagnostico = "";
                    $CON_Receta = "";
                    $CON_Trat = "";
                    $idKardex = "";
                    $CON_Estado = "";
                    $CON_Parte = "";
                    $CON_Pulsa = "";
                    $CON_RRespi = "";
                    $CON_Temp = "";
                    $CON_Altura = "";
                    $CON_Peso = "";
                    $CON_Imc = "";
                    $CON_Fecha = "";
                    $hidden = '';
                    $disabled = '';
                    break;
                case 'editar':

                    $ficha = new CtrConsulta();
                    $registros = $ficha->getConsulta($_GET['usua']);

                    $CON_Id = $registros->__get('CON_Id');
                    $PRO_Id = $registros->__get('PRO_Id');
                    $ENF_Id = $registros->__get('ENF_Id');
                    $FIC_Id = $registros->__get('FIC_Id');
                    $CON_Diagnostico = $registros->__get('CON_Diagnostico');
                    $CON_Receta = $registros->__get('CON_Receta');
                    $CON_Trat = $registros->__get('CON_Trat');
                    $idKardex = $registros->__get('idKardex');
                    $CON_Estado = $registros->__get('CON_Estado');
                    $CON_Parte = $registros->__get('CON_Parte');
                    $CON_Pulsa = $registros->__get('CON_Pulsa');
                    $CON_RRespi = $registros->__get('CON_RRespi');
                    $CON_Temp = $registros->__get('CON_Temp');
                    $CON_Altura = $registros->__get('CON_Altura');
                    $CON_Peso = $registros->__get('CON_Peso');
                    $CON_Imc = $registros->__get('CON_Imc');
                    $CON_Fecha = $registros->__get('CON_Fecha');

                    $hidden = 'hidden';
                    $disabled = '';


                    break;
                case 'ver':
                    # Para Visualizar los datos
                    $ficha = new CtrConsulta();
                    $registros = $ficha->getConsulta($_GET['usua']);

                    $CON_Id = $registros->__get('CON_Id');
                    $PRO_Id = $registros->__get('PRO_Id');
                    $ENF_Id = $registros->__get('ENF_Id');
                    $FIC_Id = $registros->__get('FIC_Id');
                    $CON_Diagnostico = $registros->__get('CON_Diagnostico');
                    $CON_Receta = $registros->__get('CON_Receta');
                    $CON_Trat = $registros->__get('CON_Trat');
                    $idKardex = $registros->__get('idKardex');
                    $CON_Estado = $registros->__get('CON_Estado');
                    $CON_Parte = $registros->__get('CON_Parte');
                    $CON_Pulsa = $registros->__get('CON_Pulsa');
                    $CON_RRespi = $registros->__get('CON_RRespi');
                    $CON_Temp = $registros->__get('CON_Temp');
                    $CON_Altura = $registros->__get('CON_Altura');
                    $CON_Peso = $registros->__get('CON_Peso');
                    $CON_Imc = $registros->__get('CON_Imc');
                    $CON_Fecha = $registros->__get('CON_Fecha');
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

                                    <li><a href= " <?php echo $ruta; ?>Apps/seguridad/Consulta/Vista/ListarConsulta.php">Consulta</a><span class="divider"></span></li>
                                    <li><a href="javascript:window.location.reload();" class="active">Mantenimiento Consulta</a> <span class="divider">/</span></li>
                                </ul>
                            </div>
                        </div>

                        <div class="row-fluid">
                            <div class="col-lg-12">
                                <h1 class="page-header">Mantenimiento Consulta</h1>
                            </div><!-- /.col-lg-12 -->
                        </div><!-- /.row -->

                        <div class="container-fluid">
                            <div class="col-xs-12 col-xs-15">
                                <br>
                                <div class="panel panel-cyan">
                                    <div class="panel-heading">
                                        Registro de Consulta
                                    </div>

                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-11">
                                                <form class="form-horizontal" name="frmUsuario"  method="post" action="InterfazConsulta.php">
                                                    <div class='col-sm-6'>
                                                        <div class="form-group">
                                                            <div class="col-md-9">
                                                                <input type="hidden" class="form-control " name="id" maxlength="45"
                                                                       id="CAR_Id" required="true" value='<?= $CON_Id; ?>'>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Profesional:</label>
                                                            <div class="col-md-9">
                                                                <?php
                                                                $ficha = new CtrConsulta();
                                                                $registros = $ficha->getProfesional();
                                                                ?>
                                                                <SELECT class="form-control" NAME="PRO_Id" id="PRO_Id" onChange="" <?php echo $disabled ?>>
                                                                    <?php foreach ($registros as $registro): ?>
                                                                        <option value="<?php echo $registro->__get('PRO_Id') ?>" <?php echo ($registro->__get('PRO_Id') === $PRO_Id) ? "selected" : "deselected"; ?>><?php echo $registro->__get('PRO_Nombre') . " " . $registro->__get('PRO_Apellido') ?></option>
                                                                    <?php endforeach; ?>
                                                                </SELECT>
                                                            </div>
                                                            <div class="col-md-offset-12">
                                                                <a style="position: relative;" target="_blank" href="../../Profesional/Vista/ManProfesional.php?usua=0&opc=nuevo" rel="tooltip" title="Ingresar mas profesionales" class="btn btn-simple btn-info btn-vk">
                                                                    <i  class='fa fa-user-md'></i>
                                                                </a>
                                                            </div>

                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Enfermedades:</label>
                                                            <div class="col-md-9">
                                                                <?php
                                                                $ficha = new CtrConsulta();
                                                                $registros = $ficha->getEnfermedades();
                                                                ?>
                                                                <SELECT class="form-control" NAME="ENF_Id" id="ENF_Id" onChange="" <?php echo $disabled ?>>
                                                                    <?php foreach ($registros as $registro): ?>
                                                                        <option value="<?php echo $registro->__get('ENF_Id') ?>" <?php echo ($registro->__get('ENF_Id') === $ENF_Id) ? "selected" : "deselected"; ?>><?php echo $registro->__get('ENF_Descripcion') ?></option>
                                                                    <?php endforeach; ?>
                                                                </SELECT>
                                                            </div>

                                                            <div class="col-md-offset-12">
                                                                <a style="position: relative;" target="_blank" href="../../Enfermedad/Vista/ManEnfermedades.php?usua=0&opc=nuevo" rel="tooltip" title="Ingresar mas enfermedades" class="btn btn-simple btn-info btn-vk">
                                                                    <i  class='fa fa-ambulance'></i>
                                                                </a>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">FichaMedica:</label>
                                                            <div class="col-md-9">
                                                                <?php
                                                                $ficha = new CtrConsulta();
                                                                $registros = $ficha->getFicha();
                                                                ?>
                                                                <SELECT class="form-control" NAME="FIC_Id" id="FIC_Id" onChange="" <?php echo $disabled ?>>
                                                                    <?php foreach ($registros as $registro): ?>
                                                                        <option value="<?php echo $registro->__get('FIC_Id') ?>" <?php echo ($registro->__get('FIC_Id') === $FIC_Id) ? "selected" : "deselected"; ?>><?php echo $registro->__get('PAC_Id') ?></option>
                                                                    <?php endforeach; ?>
                                                                </SELECT>
                                                            </div>

                                                            <div class="col-md-offset-12">
                                                                <a style="position: relative;" target="_blank" href="../../FichaMedica/Vista/ManFicha.php?usua=0&opc=nuevo" rel="tooltip" title="Ingresar mas fichas medicas" class="btn btn-simple btn-info btn-vk">
                                                                    <i  class='fa fa-bookmark'></i>
                                                                </a>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Diagnostico:</label>
                                                            <div class="col-md-9">

                                                                <textarea type="text" class="form-control " name="CON_Diagnostico" maxlength="50"
                                                                          id="CON_Diagnostico" value ='' required="true" <?php echo $disabled ?>><?= $CON_Diagnostico; ?></textarea>

                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Receta:</label>
                                                            <div class="col-md-9">

                                                                <textarea type="text" class="form-control " name="CON_Receta" maxlength="50"
                                                                          id="CON_Receta" value ='' required="true" <?php echo $disabled ?>><?= $CON_Receta; ?></textarea>

                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Tratamiento:</label>
                                                            <div class="col-md-9">

                                                                <textarea type="text" class="form-control " name="CON_Trat" maxlength="50"
                                                                          id="CON_Trat" value ='' required="true" <?php echo $disabled ?>><?= $CON_Trat; ?></textarea>

                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Medicamento:</label>
                                                            <div class="col-md-9">
                                                                <?php
                                                                $ficha = new CtrConsulta();
                                                                $registros = $ficha->getKardex();
                                                                ?>
                                                                <SELECT class="form-control" NAME="idKardex" id="idKardex" onChange="" <?php echo $disabled ?>>
                                                                    <?php foreach ($registros as $registro): ?>
                                                                        <option value="<?php echo $registro->__get('idKardex') ?>" <?php echo ($registro->__get('idKardex') === $idKardex) ? "selected" : "deselected"; ?>><?php echo $registro->__get('idProducto')." - Stock - ". $registro->__get('stock') ?></option>
                                                                    <?php endforeach; ?>
                                                                </SELECT>
                                                            </div>
                                                        </div>


                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Estado:</label>
                                                            <div class="col-md-9 text-center" >
                                                                <label class="checkbox form-control"><input  id="CON_Estado" type="checkbox" name="CON_Estado" <?= ($CON_Estado == 1 ? "checked" : "notchecked") ?> <?php echo $disabled ?>>Activo</label>

                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class='col-sm-6' style="position: relative; left: 54px; top:12px;">

                                                        <div class="form-group">
                                                            <label class="control-label col-md-4">Presión Arterial:</label>
                                                            <div class="col-md-6">
                                                                <input type="number" max="1000" min="0" class="form-control " name="CON_Parte" maxlength="10"
                                                                       id="CON_Parte" value ='<?= $CON_Parte ?>' required="true" <?php echo $disabled ?>>
                                                            </div>
                                                            <label class="control-label">mmHg</label>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-4">Ritmo Respiratorio:</label>
                                                            <div class="col-md-6">
                                                                <input type="number" max="1000" min="0" class="form-control " name="CON_RRespi" maxlength="10"
                                                                       id="CON_RRespi" value ='<?= $CON_RRespi ?>' required="true" <?php echo $disabled ?>>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-4">Pulsaciones:</label>
                                                            <div class="col-md-6">
                                                                <input type="number" max="1000" min="0" class="form-control " name="CON_Pulsa" maxlength="10"
                                                                       id="CON_Pulsa" value ='<?= $CON_Pulsa ?>' required="true" <?php echo $disabled ?>>
                                                            </div>
                                                            <label class="control-label">x/Seg</label>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-4">Temperatura:</label>
                                                            <div class="col-md-6">
                                                                <input type="text"  class="form-control " name="CON_Temp" maxlength="10"  onKeyPress="return soloNumeros1(event)"
                                                                       id="CON_Temp" value ='<?= $CON_Temp ?>' required="true" <?php echo $disabled ?>>
                                                            </div>
                                                            <label class="control-label">grados</label>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-4">Altura:</label>
                                                            <div class="col-md-6">
                                                                <input type="text"  class="form-control " name="CON_Altura" maxlength="10"  onKeyPress="return soloNumeros1(event)"
                                                                       id="CON_Altura" value ='<?= $CON_Altura ?>' required="true" <?php echo $disabled ?>>
                                                            </div>
                                                            <label class="control-label">Cm</label>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-4">Peso:</label>
                                                            <div class="col-md-6">
                                                                <input type="text"  class="form-control " name="CON_Peso" maxlength="10"  onKeyPress="return soloNumeros1(event)"
                                                                       id="CON_Peso" value ='<?= $CON_Peso ?>' required="true" <?php echo $disabled ?>>
                                                            </div>
                                                            <label class="control-label">Kg</label>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-4">Masa Corporal:</label>
                                                            <div class="col-md-6">
                                                                <input type="number"  class="form-control " name="CON_Imc" maxlength="10"  onKeyPress="return soloNumeros1(event)"
                                                                       id="CON_Imc" value ='<?= $CON_Imc ?>' required="true" <?php echo $disabled ?>>
                                                            </div>
                                                            <label class="control-label">%</label>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-4">Fecha:</label>
                                                            <div class="col-md-6">
                                                                <input type="date" class="form-control " name="CON_Fecha"
                                                                       id="CON_FecNac" value ='<?= $CON_Fecha ?>' required="true" <?php echo $disabled ?>>
                                                            </div>
                                                        </div>


                                                    </div>


                                                    <?php if (isset($_GET['opc']) && ($_GET['opc'] == 'nuevo' || $_GET['opc'] == 'editar')) {
                                                        ?>
                                                        <div class="btn btn-group col-md-offset-3 ">
                                                            <div class="col-md-2">
                                                                <button type="submit" class=" btn btn-success "><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
                                                            </div>

                                                            <div class="col-md-2 col-md-offset-3">
                                                                <a href="ListarConsulta.php" id="btnSalir" class="btn btn-danger"> <i class="glyphicon glyphicon-remove"></i> Cancelar</a>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <div class="col-md-2 col-md-offset-3 ">
                                                            <a href="ListarConsulta.php" id="btnSalir" class="btn btn-primary" <i class="glyphicon glyphicon-remove"></i> Regresar</a>
                                                        </div>
                                                    <?php }
                                                    ?>
                                                    <input type="hidden"  name="opc" id="opc" value='<?= $_GET['opc']; ?>' /><br></form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-md-3"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <?php require_once("../../../../Apps/Main/footer.php"); ?>

                </body>
                </html>
