<?php session_start(); ?><!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Vista consulta</title>

        <?php
        $rutaValidacion="../../../../";
        $rutaFoto="../../";
        $ruraPerfil="../../";
        $rut="../../../";
        $ruta = "../../../../";
        require_once("../../../../Apps/Main/head.php");
        require_once('../Controlador/CtrConsulta.php');
        ?>
<script type="text/javascript">
<!--
function procesar(xform){
window.open(xform, 'nventana', 'width=450,height=300,status=yes,resizable=yes,scrollbars=yes');
}
-->
</script>
    </head>
    <body>
        <?php
        require_once("../../../../Apps/Main/header.php");
        if (isset($_GET['opc'])) {
            switch ($_GET['opc']) {

                case 'ver':
                    $usuario = new CtrConsulta();
                    $registros = $usuario->getUsuario($_GET['usua']);
                    $CON_Id = $registros->__get('CON_Id');
                    $PRO_Id = $registros->__get('PRO_Id');
                    $FIC_Id = $registros->__get('FIC_Id');
                    $CIT_Id = $registros->__get('CIT_Id');
                    $PRO_Nombre = $registros->__get('PRO_Nombre');
                    $PRO_Apellido = $registros->__get('PRO_Apellido');
                    $PRO_Cedula = $registros->__get('PRO_Cedula');
                    $ENF_Descripcion = $registros->__get('ENF_Descripcion');
                    $CON_Diagnostico = $registros->__get('CON_Diagnostico');
                    $CON_Receta = $registros->__get('CON_Receta');
                    $CON_PArte = $registros->__get('CON_PArte');
                    $CON_Pulsa = $registros->__get('CON_Pulsa');
                    $CON_RRespi = $registros->__get('CON_RRespi');
                    $CON_Temp = $registros->__get('CON_Temp');
                    $CON_Altura = $registros->__get('CON_Altura');
                    $CON_Peso = $registros->__get('CON_Peso');
                    $CON_Imc = $registros->__get('CON_Imc');
                    $CON_Edad = $registros->__get('CON_Edad');
                    $CON_Estado = $registros->__get('CON_Estado');
                    $CIT_Fecha = $registros->__get('CIT_Fecha');

                    $paciente = new CtrConsulta();
                    $pac = $paciente->obtenerCitaPaciente($CIT_Id);

                    $PAC_Id = $pac->__get('PAC_Id');
                    $PAC_Nombre = $pac->__get('PAC_Nombre');
                    $PAC_Apellido = $pac->__get('PAC_Apellido');

                    $ficha = new CtrConsulta();
                    $fichaMedica = $ficha->obtenerFichaMedica($FIC_Id);

                    $FIC_Antecedentes=$fichaMedica->__get('FIC_Antecedentes');
                    $FIC_Alergias=$fichaMedica->__get('FIC_Alergias');
                    $FIC_Tratamiento=$fichaMedica->__get('FIC_Tratamiento');
                    $FIC_Familiares=$fichaMedica->__get('FIC_Familiares');
                    $FIC_Estado=$fichaMedica->__get('FIC_Estado');

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
                                    <li><a href= " <?php echo $ruta; ?>Apps/seguridad/HistoriaClinica/Vista/ListarUsuariosCitas.php">Historia Clinica</a><span class="divider"></span></li>
                                    <li><a href="javascript:window.location.reload();" class="active">Historia Clinica Consulta</a> <span class="divider">/</span></li>
                                </ul>
                            </div>
                        </div>

                        <div class="row page-header">
                            <div class="col-lg-4">
                                <h1>Historia Clinica</h1>

                            </div><!-- /.col-lg-4 -->
                             <div class="col-lg-4">
                                <h1 ></h1>

                            </div><!-- /.col-lg-4 -->

                                <div class="col-lg-4 " align="right">
                                <form method="POST" action="mostrar.php" target="nventana" onsubmit="procesar(this.action);">
                                <input type='hidden'  name="titulo"  value='Programación Orientada a Objetos 3'>

                            <input type='hidden'  name="nomMedico"  value='<?= $PRO_Nombre; ?> <?= $PRO_Apellido; ?>'>
                             <input type='hidden'  name="cedulaMedico" value ='<?= $PRO_Cedula; ?>'>

                            <input type='hidden'  name="nomPaciente" value='<?= $PAC_Nombre; ?> <?= $PAC_Apellido; ?>' >
                            <input type='hidden'  name="nh" value='<?= $PAC_Id; ?>' >

                            <input type='hidden'  name="nficha" value ='<?= $FIC_Id; ?>'>
                            <input type='hidden'  name="antecedentes" value ='<?= $FIC_Antecedentes; ?>'>
                            <input type='hidden'  name="alergias" value ='<?= $FIC_Alergias; ?>'>
                            <input type='hidden' name="familiares" value ='<?= $FIC_Familiares; ?>'>

                            <input type='hidden' name="puls" value ='<?= $CON_Pulsa; ?>'>
                            <input type='hidden' name="alt" value ='<?= $CON_Altura; ?>'>
                            <input type='hidden' name="peso" value ='<?= $CON_Peso; ?>'>
                            <input type='hidden' name="temp" value ='<?= $CON_Temp; ?>'>
                            <input type='hidden' name="resp" value ='<?= $CON_RRespi; ?>'>

                            <input type='hidden'  name="consulta" value='<?= $CON_Diagnostico; ?>' >
                            <input type='hidden'  name="receta" value='<?=  $CON_Receta; ?>' >

                            <input class="btn btn-primary" type="submit" value="Generar PDF">
                        </form>
                                </div><!-- /.col-lg-4 -->
                        </div><!-- /.row -->
                        <div class="container-fluid">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    <h2>Datos de Consulta:</h2>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col col-lg-10">
                                            <div class="form-group">
                                                <h2 class="page-header">Datos del Medico:</h2>
                                                <label class="control-label col-md-3">Nombres:</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control " name="PRO_Nombre"
                                                           id="PRO_Nombre" value ='<?= $PRO_Nombre; ?> <?= $PRO_Apellido; ?>' required="true" <?php echo $disabled ?>>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col col-lg-10">
                                             <div class="form-group">
                                                <label class="control-label col-md-3">Cedula:</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control " name="PRO_Cedula"
                                                           id="PRO_Cedula" value ='<?= $PRO_Cedula; ?>' required="true" <?php echo $disabled ?>>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col col-lg-10">
                                            <div class="form-group">
                                                <h2 class="page-header">Datos del Paciente:</h2>
                                                <label class="control-label col-md-3">Nombres:</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control " name="PAC_Nombre"
                                                           id="PAC_Nombre" value ='<?= $PAC_Nombre; ?> <?= $PAC_Apellido; ?>' required="true" <?php echo $disabled ?>>
                                                </div>
                                            </div>
                                            <br>

                                        </div>
                                         <div class="col col-lg-10">
                                             <div class="form-group">
                                                <label class="control-label col-md-3">H.Clinica:</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control " name="PAC_Id"
                                                           id="PAC_Id" value ='<?= $PAC_Id; ?>' required="true" <?php echo $disabled ?>>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col col-lg-10">
                                            <div class="form-group">
                                                <h2 class="page-header">Ficha Medica:</h2>
                                                <label class="control-label col-md-3">N° Ficha:</label>
                                                <div class="col-md-2">
                                                    <input type="text" class="form-control " name="FIC_Id"
                                                           id="FIC_Id" value ='<?= $FIC_Id; ?> ' required="true" <?php echo $disabled ?>>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col col-lg-10">
                                             <div class="form-group">
                                                <label class="control-label col-md-3">Antecedentes:</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control " name="FIC_Antecedentes"
                                                           id="FIC_Antecedentes" value ='<?= $FIC_Antecedentes; ?>' required="true" <?php echo $disabled ?>>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col col-lg-10">
                                             <div class="form-group">
                                                <label class="control-label col-md-3">Alergias:</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control " name="FIC_Alergias"
                                                           id="FIC_Alergias" value ='<?= $FIC_Alergias; ?>' required="true" <?php echo $disabled ?>>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col col-lg-10">
                                             <div class="form-group">
                                                <label class="control-label col-md-3">Familiares:</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control " name="FIC_Familiares"
                                                           id="FIC_Familiares" value ='<?= $FIC_Familiares; ?>' required="true" <?php echo $disabled ?>>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                       <div class="col-xs-4">
                                    <div class="panel  panel-primary">
                                        <div class="panel-heading">
                                            Datos Generales de consulta:
                                        </div>
                                        <div class="panel-body  "><!-- inicio del panel -->
                                            <div class="row">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-6">Pulsaciones:</label>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control " name="pulConsulta" maxlength="20"
                                                                   id="pulConsulta" value ='<?= $CON_Pulsa; ?>' required="true" <?php echo $disabled ?>>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-6">Altura:</label>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control " name="altConsulta" maxlength="50"
                                                                   id="altConsulta" value ='<?= $CON_Altura; ?>' required="true" <?php echo $disabled ?>>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-6">Peso:</label>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control " name="pesConsulta" maxlength="50"
                                                                   id="pesConsulta" value ='<?= $CON_Peso; ?>' required="true" <?php echo $disabled ?>>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-6">Temperatura:</label>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control " name="temConsulta" maxlength="50"
                                                                   id="temConsulta" value ='<?= $CON_Temp; ?>' required="true" <?php echo $disabled ?>>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-6">Respiracion:</label>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control " name="resConsulta" maxlength="50"
                                                                   id="resConsulta" value ='<?= $CON_RRespi; ?>' required="true" <?php echo $disabled ?>>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- fin del panel-body -->
                                    </div>
                                </div>
                                <div class="col-xs-8">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            Resultados:
                                        </div>
                                        <div class="panel-body"><!-- inicio del panel -->
                                            <div class="row">
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Diagnostico:</label>
                                                        <div class="col-md-9">
                                                            <textarea name="name" rows="8" cols="60"  <?php echo $disabled ?>><?php echo $CON_Diagnostico; ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Receta:</label>
                                                        <div class="col-md-9">
                                                            <textarea name="receta" id="receta"  rows="8" cols="60" <?php echo $disabled ?>><?php echo $CON_Receta; ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- fin del panel-body -->
                                    </div>
                                </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php require_once("../../../../Apps/Main/footer.php"); ?>


                        </body>
                        </html>
