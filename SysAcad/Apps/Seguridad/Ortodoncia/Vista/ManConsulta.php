<?php session_start(); ?><!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Mantenimiento de Usuario</title>

  <?php
  $rutaValidacion="../../../../../";
  $rutaFoto="../";
  $ruraPerfil="../../";
  $rut="../../";
  $ruta = "../../../../";
  require_once("../../../../Apps/Main/head.php");
  require_once('../Controlador/CtrConsulta.php');
  require_once('../Controlador/CtrOrtodoncia.php');
  // require_once('../Dao/DaoConsulta.php');
  ?>
  <style media="screen">
  div#div_file{
    position: relative;
    margin: 50px;
    padding: 10px;
    width: 200px;
    height: 50px;
    background-color: green;
  }
  input#foto{
    position: absolute;
    top: 0px;
    left: 0px;
    right: 0px;
    bottom: 0px;
    width: 100%;
    height: 100%;
    opacity: 0;
  }
  </style>
</head>
<body>
  <?php
  require_once("../../../../Apps/Main/header.php");

  if (isset($_GET['opc'])) {
    switch ($_GET['opc']) {
      case 'nuevo':
      # Para nuevo registro
      $idCabConsulta = '';
      $idPaciente = "";
      $idMedico = '';
      $idClinica='';
      $CitSala = 'Sala: No Seleccionada';
      $fecha = '';
      $CitAsist = 1;
      $hora = '';
      $observacion = '';
      $estado = '1';
      $hidden = '';
      $sel = "";
      $disabled = '';
      $disabledcheck = 'readonly';
      $but = "";
      $verN='';
      $verN=false;
      $ur='InterfazConsulta.php?opc=nuevo';

      break;
      case 'editar':
      # Para Editar datos
      $usuario = new CtrConsulta();
      $registros = $usuario->verConsulta($_GET['usua']);
      $idCabConsulta = $registros->__get('idCabConsulta');
      $idPaciente = $registros->__get('PAC_Id');
      $idClinica = $registros->__get('CLI_Id');
      $idMedico = $registros->__get('PRO_Id');
      $CitSala = $registros->__get('sala');
      $fecha = $registros->__get('fecha');
      $hora = $registros->__get('hora');
      $observacion = $registros->__get('observacion');
      $hidden = 'hidden';
      $sel = "this.blur()";
      $disabled = '';
      $but = "disabled";
      $dis='disabled';
      $verN='modal';
      $ur='InterfazConsulta.php?opc=editar';
      break;

      case 'ver':
      # Para Visualizar los datos
      $usuario = new CtrConsulta();
      $registros = $usuario->verConsulta($_GET['usua']);
      $idCabConsulta = $registros->__get('idCabConsulta');
      $idPaciente = $registros->__get('PAC_Id');
      $idClinica = $registros->__get('CLI_Id');
      $idMedico = $registros->__get('PRO_Id');
      $CitSala = $registros->__get('sala');
      $fecha = $registros->__get('fecha');
      $hora = $registros->__get('hora');
      $observacion = $registros->__get('observacion');
      $hidden = '';
      $sel = "";
      $but = "";
      $disabled = 'disabled';
      $dis='disabled';
      $verN='modal';
      $ur='';
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
                <li><a href= " <?php echo $ruta;?>Apps/Main/vista/menu.php">Inicio</a><span class="divider"></span></li>
                <li><a href= " <?php echo $ruta;?>Apps/main/Vista/Ortodoncia.php">Ortodoncia</a><span class="divider"></span></li>
                <li><a href= " <?php echo $ruta;?>Apps/Seguridad/Ortodoncia/Vista/ListarConsultas.php">Consultas</a><span class="divider"></span></li>
                <li><a href="javascript:window.location.reload();" class="active">Mantenimiento Consultas</a> <span class="divider">/</span></li>
              </ul>
            </div>
          </div>
          <div class="row-fluid">
            <div class="col-lg-12">
              <h1 class="page-header">Mantenimiento Consultas</h1>
            </div><!-- /.col-lg-12 -->
          </div><!-- /.row -->
          <div class="container-fluid">
            <div class="col-xs-12 col-md-3"></div>
            <div class="col-xs-12 col-md-7 ">
              <br>
              <div class="panel panel-default">
                <div class="panel-heading">
                  Registro de Consultas
                </div>
                <div class="panel-footer">
                  <div class="row"> <!-- Paginación de Registros-->
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-lg-12">
                          <form class="form-horizontal" name="frnConsulta"  method="post" action="<?php echo $ur; ?>">
                            <div class="form-group">
                              <div class="row">
                                <div class="col-lg-1">
                                  <input type="hidden"  name="id" id="id" value= "<?php echo $idCabConsulta ?>"/><br>
                                </div>
                                <div class="col-lg-5">
                                  <h5><b>Fecha</b></h5>
                                  <input type="date" name="fecha" class="form-control"  style="width:180px" value="<?= $fecha ?>" <?= $disabled ?> ><span class="label label-primary"></span>
                                </div>
                                <div class="col-lg-5">
                                  <h5>Hora</h5>
                                  <input type="time" class="form-control" name="hora" id="tiempo" value="<?php echo $hora ?>"  <?= $disabled ?>>
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <div class="col-lg-1">
                                </div>
                                <div class="col-lg-4">
                                  <h5><b>Paciente</b></h5>

                                  <select class="form-control" style="width:225px"  name="paciente" id="paciente"    required="true" <?php echo $disabled ?>>

                                    <?php $id_equ = new CtrConsulta();
                                    $registros = $id_equ->CargarComboPaciente();
                                    foreach ($registros as $registro): ?>
                                    <?php if (!is_null($registro)): ?>
                                      <?php
                                      if ($idPaciente == 0) {
                                        echo'<option value ="' . $registro->__get('pac_Id') . ' " >' . $registro->__get('pac_Nombre')." ".$registro->__get('pac_Apellido').'</option>';
                                      } else {
                                        if ($registro->__get('pac_Id') == $idPaciente) {
                                          echo '<option value="' . $registro->__get('pac_Id') . '"selected="">' . $registro->__get('pac_Nombre') ." ".$registro->__get('pac_Apellido').'</option>';
                                        } else {
                                          echo '<option value="' . $registro->__get('pac_Id') . '" >' . $registro->__get('pac_Nombre') ." ".$registro->__get('pac_Apellido').'</option>';
                                        }
                                      }
                                      ?>
                                      <?php //echo'<option value ="' . $registro->__get('idPaciente') . ' " >' . $registro->__get('Paciente') .'</option>'; ?>
                                    <?php endif; ?>
                                  <?php endforeach; ?>
                                </select>

                                <div class="<?php echo $verN;?>">
                                  <a class="btn btn-primary"  href="<?= $ruta ?>Apps/Mantenimiento/Paciente/Vista/ManPaciente.php?opc=nuevo&nuevpac=pacnuevo" <?= $disabled ?> <?= $but ?>
                                    name="button"><i class="glyphicon glyphicon-plus-sign"></i></a>
                                  </div>


                                </div>

                                <div class="col-lg-2">
                                </div>
                                <div class="col-lg-5">
                                  <h5><b>Doctor</b></h5>
                                  <?php ?>
                                  <!-- <input type="text" name="" value="<?php $registro->__get('PRO_Id')?>" placeholder=""> -->
                                  <select class="form-control" style="width:225px"  name="doctor" id="id_tplc"  name="doctor"required="true" <?php echo $disabled ?>>
                                    <?php
                                    $id_equ = new CtrConsulta();
                                    $registros = $id_equ->CargarComboMedico();
                                    ?>
                                    <?php foreach ($registros as $registro): ?>
                                      <?php if (!is_null($registro)): ?>
                                        <?php
                                        if ($idMedico == 0) {
                                          echo'<option value ="'.$registro->__get('PRO_Id').'">'.$registro->__get('PRO_Nombre')." ".$registro->__get('PRO_Apellido').'</option>';
                                        } else {
                                          if ($registro->__get('PRO_Id') == $idMedico) {
                                            echo '<option value="' . $registro->__get('PRO_Id') . '" selected="">' . $registro->__get('PRO_Nombre') ." ".$registro->__get('PRO_Apellido').'</option>';
                                          } else {
                                            echo '<option value="' . $registro->__get('PRO_Id'). '" >' . $registro->__get('PRO_Nombre') . " ".$registro->__get('PRO_Apellido').'</option>';
                                          }
                                        }
                                        ?>
                                      <?php endif; ?>
                                    <?php endforeach; ?>
                                  </select>
                                  
                                </div>
                                <!--<div class="col-md-1">
                                <button type="submit" class=" btn btn-primary "><span class="glyphicon glyphicon-pencil"></span></button>
                              </div>-->

                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-lg-1">

                              </div>
                              <div class="col-lg-4">
                                <h5><b>Sala:</b></h5>

                                <select class="form-control" style="width:205px" name="sala" id="id_tplc"  required="true" <?php echo $disabled ?>>


                                  <?php
                                  for ($i = 1; $i < 11; $i++) {
                                    if ($CitSala == "Sala $i") {
                                      echo "<option value='Sala $i' selected>Sala $i</option>";
                                    } else {
                                      echo "<option value='Sala $i'>Sala $i</option>";
                                    }
                                  }
                                  ?>


                                </select>
                              </div>
                              <div class="col-lg-2">

                              </div>
                              <div class="col-lg-5">
                                <h5><b>Clinica:</b></h5>

                                <select class="form-control" style="width:225px"  name="clinica" id="id_tplc"  required="true" <?php echo $disabled ?>>
                                  <?php
                                  $id_equ = new CtrOrtodoncia();
                                  $registros = $id_equ->getClinicas();

                                  ?>

                                  <?php foreach ($registros as $registro): ?>
                                    <?php if (!is_null($registro)): ?>

                                      <?php
                                      if ($idClinica == 0) {
                                        echo'<option value ="'.$registro->__get('CLI_Id').'">'.$registro->__get('CLI_Nombre').'</option>';
                                      } else {
                                        if ($registro->__get('CLI_Id') == $idClinica) {
                                          echo '<option value="' . $registro->__get('CLI_Id') . '" selected="">' . $registro->__get('CLI_Nombre') .'</option>';
                                        } else {
                                          echo '<option value="' . $registro->__get('CLI_Id'). '" >' . $registro->__get('CLI_Nombre') .'</option>';
                                        }
                                      }
                                      ?>
                                    <?php endif; ?>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="row">
                              <div class="col-lg-1">

                              </div>
                              <div class="col-lg-10">
                                <h5><b>Observacion:</b></h5>
                                <div class="scroll" >
                                  <article id="tab1">
                                    <textarea name="observacion" rows="20" cols="75" <?= $disabled ?> ><?= $observacion ?></textarea>
                                  </article>
                                </div>
                              </div>
                              <div class="col-lg-1">

                              </div>
                            </div>

                            <?php if (isset($_GET['opc']) && ($_GET['opc'] == 'nuevo' || $_GET['opc'] == 'editar')) {
                              ?>
                              <div class="btn btn-group  ">
                                <div class="col-md-2">
                                  <!-- <button type="submit" class=" btn btn-success "><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button> -->
                                  <input type="submit" class=" btn btn-success " name="" value="Guardar">
                                </div>

                                <div class="col-md-2 col-md-offset-3">
                                  <a href="ListarConsultas.php" id="btnSalir" class="btn btn-danger"> <i class="glyphicon glyphicon-remove"></i> Cancelar</a>
                                </div>
                              </div>
                              <?php
                            } else {
                              ?>
                              <div class="col-md-2 col-md-offset-3 ">
                                <a href="ListarConsultas.php" id="btnSalir" class="btn btn-primary" <i class="glyphicon glyphicon-remove"></i> Regresar</a>
                              </div>
                            <?php }
                            ?>
                            <!-- <input type="hidden"  name="opc" id="opc" value='<?= $_GET['opc']; ?>' /><br>
                            <input type="hidden"  name="estado" id="estado" value='<?= $estado; ?>' /><br> -->
                          </form>



                        </div>
                      </div>
                    </div>
                    <div class="panel-footer">
                      <div class="row"> <!-- Paginación de Registros-->
                        <br>
                      </div>
                    </div>
                    <div class="col-xs-12 col-md-1"></div>
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
