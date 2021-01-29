<?php session_start(); ?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Mantenimiento de Usuario</title>
        <?php


        $rutaValidacion="../../../";
        $rutaFoto="../../";
        $ruraPerfil="../../";
        $rut="../../";
        $ruta = "../../../../";
          require_once("../../../../Apps/Main/head.php");
        require_once('../Controlador/CtrModulo.php');
        ?>
        <?php require_once("../../../../Apps/Main/header.php"); ?>
    </head>
    <body>
        <?php
        if (isset($_GET['opc'])) {
            switch ($_GET['opc']) {
                case 'nuevo':
                    # Para nuevo registro
                    $titulo = '';
                    $detalle = '';
                    $rutam = '';
                    $icono = '';
                    $padre = '';
                    $disabled = '';
                    $disabled1 = '';
                    break;
                case 'editar':
                    # Para Editar datos
                    $usuario = new CtrModulo();
                    $registros = $usuario->getModulo($_GET['usua']);
                    $idModulo = $registros->__get('idModulo');
                    $titulo = $registros->__get('modNombre');
                    $detalle = $registros->__get('modDescripcion');
                    $rutam = $registros->__get('codigo');
                    $icono = $registros->__get('modFoto');
                    $padre = $registros->__get('modPadre');
                    $fechcrea = '';
                    $usucrea = '';
                    // $fechcrea = $registros->__get('Fech_Cre');
                    // $usucrea = $registros->__get('Usu_Cre');
                    $est = $registros->__get('estado');
                    $hidden = 'hidden';
                    $disabled = '';
                    $disabled1 = '';
                    break;
                case 'ver':
                    $idModulo = $registros->__get('idModulo');
                    $titulo = $registros->__get('modNombre');
                    $detalle = $registros->__get('modDescripcion');
                    $rutam = $registros->__get('codigo');
                    $icono = $registros->__get('modFoto');
                    $padre = $registros->__get('modPadre');
                    $fechcrea = '';
                    $usucrea = '';
                    // $fechcrea = $registros->__get('Fech_Cre');
                    // $usucrea = $registros->__get('Usu_Cre');
                    $est = $registros->__get('estado');
                    $hidden = 'hidden';
                    $disabled = 'ReadOnly';
                    $disabled1 = 'disabled';
                    break;
            }
        }
        ?>

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-2"></div>
                    <div class="col-lg-12">
                        <br> <br>
                        <div class="row-fluid">
                            <div class="span12">
                                <ul class="breadcrumb">
                                    <li><a href= " <?php echo $ruta; ?>Apps/Main/Login/Vista/Menu.php">Inicio</a><span class="divider"></span></li>
                                    <li><a href= " <?php echo $ruta; ?>Apps/Main/Vista/Seguridad.php">Seguridad</a><span class="divider"></span></li>
                                    <li><a href= " <?php echo $ruta; ?>Apps/Seguridad/Modulos/Vista/ListaModulos.php">Modulos</a> <span class="divider"></span></li>
                                    <li><a href="javascript:window.location.reload();" class="active">Mantenimiento Modulo</a> <span class="divider">/</span></li>
                                </ul>
                            </div>
                        </div>

                        <div class="row-fluid">
                          <div class="col-lg-2"></div>
                            <div class="col-lg-8">
                                <h1 class="page-header">Registro de Modulos</h1>
                            </div><!-- /.col-lg-12 -->
                            <div class="col-lg-2"></div>
                        </div><!-- /.row -->

                        <div class="container-fluid">
                            <div class="col-xs-12 col-md-2"></div>
                            <div class="col-xs-12 col-md-7">
                                <br>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Registro de modulos
                                    </div>

                                    <div class="panel-body">
                                      <div class="col-lg-2"></div>
                                      <div class="col-lg-8">
                                        <div class="row">

                                            <div class="col-lg-12">
                                                <form class="form-horizontal" name="frmModulo" action="InterfazModulo.php" method="post">
                                                    <!--Titulo-->
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <strong class="panel-title">Titulo: </strong>
                                                            <input type="text" class="form-control" name="titulo" value='<?= $titulo; ?>' id="titulo" required  <?= $disabled; ?>>
                                                        </div>
                                                    </div>
                                                    <!--Detalle-->
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <label for="detalle">Detalle: </label>
                                                            <input type="text" class="form-control" name="detalle" value='<?= $detalle; ?>' required <?= $disabled; ?>>
                                                        </div>
                                                    </div>
                                                    <!--Ruta-->
                                                    <?php
                                                    //$url_actual = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
                                                    //echo $url_actual;
                                                    ?>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <strong class="panel-title">Ruta: </strong>
                                                            <input type="text" id="ruta" name="ruta" class="form-control"  value='<?= $rutam; ?>' required="" <?= $disabled; ?>>
                                                        </div>
                                                    </div>
                                                    <!--Icono-->
                                                    <div class="form-inline">
                                                        <div class="form-group">
                                                            <div class="col-md-2">
                                                                <strong class="panel-title">Icono: </strong>
                                                            </div>
                                                            <div class="col-md-5">
                                                                  <input type="text" class="form-control " id="icono1"  name="icono" value='<?= $icono; ?>' required="TRUE" readonly="readonly" required>
                                                            </div>
                                                            <div class="col-md-1">
                                                                  <button type="button" class="btn btn-primary form-control" name="seleccion" data-toggle="modal" data-target="#modal">Iconos usables</button>
                                                            </div>

                                                        </div>
                                                        <!--target al modal-->

                                                    </div>
                                                    <br>
                                                    <!--Padre-->
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <label for="imagen"><strong class="panel-title">Padre: </strong> </label>
                                                            <!--select de cargar padre-->
                                                            <select class="form-control" name="padre" <?= $disabled; ?>>
                                                                <option value="0">Principal</option>
                                                                <?php
                                                                $ctrModulo = new CtrModulo();
                                                                $registros = $ctrModulo->getModulos();
                                                                foreach ($registros as $registro) {
                                                                    $campo = $registro->__get('Id_Modulo');
                                                                    $estado = $registro->__get('Est');
                                                                    if ($registro->__get('Mod_Padre') == 0) {
                                                                        if ($campo != $idModulo && $estado != 3) {
                                                                            if ($campo == $padre) {
                                                                                ?>
                                                                                <option value='<?php echo $registro->__get('Id_Modulo'); ?>' selected><?php echo $registro->__get('Mod_Titulo'); ?></option>
                                                                                <?php
                                                                            } else {
                                                                                ?>
                                                                                <option value='<?php echo $registro->__get('Id_Modulo'); ?>'><?php echo $registro->__get('Mod_Titulo'); ?></option>
                                                                                <?php
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <?php if (isset($_GET['opc']) && ($_GET['opc'] == 'nuevo' || $_GET['opc'] == 'editar')) {
                                                            ?>
                                                            <div class="btn btn-group col-md-offset-3 ">
                                                                <div class="col-md-2">
                                                                    <button type="submit" class=" btn btn-primary "><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
                                                                </div>

                                                                <div class="col-md-2 col-md-offset-5">
                                                                    <a href="ListarModulo.php" id="btnSalir" class="btn btn-danger"> <i class="glyphicon glyphicon-remove"></i> Cancelar</a>
                                                                </div>
                                                            </div>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <div class="col-md-2">
                                                                <a href="ListarModulo.php" id="btnSalir" class="btn btn-primary"><i class="glyphicon glyphicon-remove"></i> Regresar</a>
                                                            </div>
                                                        <?php }
                                                        ?>
                                                        <input type="hidden"  name="fechacrea" id="fechacrea" value='<?php echo $fechcrea; ?>'/><br>
                                                        <input type="hidden"  name="usuariocrea" id="usuariocrea" value='<?php echo $usucrea; ?>' /><br>
                                                        <input type="hidden"  name="opc" id="opc" value='<?= $_GET['opc']; ?>' /><br>
                                                        <input type="hidden"  name="idmodulo" id="idmodulo" value='<?php echo $idModulo; ?>'/><br>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                      </div>
                                      <div class="col-lg-2"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2"></div>
                </div>
            </div>
        </div>
        <!--modal de los iconos-->
        <div class="modal fade" id="modal" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="labelmodal">Iconos</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="fa col-lg-3">
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-glass');" data-dismiss="modal"><p class="fa fa-glass"> fa-glass </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-music');" data-dismiss="modal"><p class="fa fa-music"> fa-music </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-search');" data-dismiss="modal"><p class="fa fa-search"> fa-search </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-envelope-o');" data-dismiss="modal"><p class="fa fa-envelope-o"> fa-envelope-o </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-heart');" data-dismiss="modal"><p class="fa fa-heart"> fa-heart </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-star');" data-dismiss="modal"><p class="fa fa-star"> fa-star </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-star-o');" data-dismiss="modal"><p class="fa fa-star-o"> fa-star-o </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-user');" data-dismiss="modal"><p class="fa fa-user"> fa-user </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-film');" data-dismiss="modal"><p class="fa fa-film"> fa-film </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-th-large');" data-dismiss="modal"><p class="fa fa-th-large"> fa-th-large </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-th');" data-dismiss="modal"><p class="fa fa-th"> fa-th </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-th-list');" data-dismiss="modal"><p class="fa fa-th-list"> fa-th-list </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-check');" data-dismiss="modal"><p class="fa fa-check"> fa-check </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-times');" data-dismiss="modal"><p class="fa fa-times"> fa-times </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-search-plus');" data-dismiss="modal"><p class="fa fa-search-plus"> fa-search-plus </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-search-minus');" data-dismiss="modal"><p class="fa fa-search-minus"> fa-search-minus </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-power-off');" data-dismiss="modal"><p class="fa fa-power-off"> fa-power-off </p>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-signal');" data-dismiss="modal"><p class="fa fa-signal"> fa-signal </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-gear');" data-dismiss="modal"><p class="fa fa-gear"> fa-gear </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-cog');" data-dismiss="modal"><p class="fa fa-cog"> fa-cog </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-trash-o');" data-dismiss="modal"><p class="fa fa-trash-o"> fa-trash-o </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-home');" data-dismiss="modal"><p class="fa fa-home"> fa-home </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-film-o');" data-dismiss="modal">><p class="fa fa-file-o"> fa-file-o </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-clock-o');" data-dismiss="modal"><p class="fa fa-clock-o"> fa-clock-o </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-road');" data-dismiss="modal"><p class="fa fa-road"> fa-road </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-download');" data-dismiss="modal"><p class="fa fa-download"> fa-download </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-arrow-circle-o-down');" data-dismiss="modal"><p class="fa fa-arrow-circle-o-down"> fa-arrow-circle-o-down </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-arrow-circle-o-up');" data-dismiss="modal"><p class="fa fa-arrow-circle-o-up"> fa-arrow-circle-o-up </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa  fa-inbox');" data-dismiss="modal"><p class="fa fa-inbox"> fa-inbox </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-play-circle-o');" data-dismiss="modal"><p class="fa fa-play-circle-o"> fa-play-circle-o </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-rotate-right');" data-dismiss="modal"><p class="fa fa-rotate-right"> fa-rotate-right </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-repeat');" data-dismiss="modal"><p class="fa fa-repeat"> fa-repeat </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-refresh');" data-dismiss="modal"><p class="fa fa-refresh"> fa-refresh </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-list-alt');" data-dismiss="modal"><p class="fa fa-list-alt"> fa-list-alt </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-lock');" data-dismiss="modal"><p class="fa fa-lock"> fa-lock </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-flag');" data-dismiss="modal"><p class="fa fa-flag"> fa-flag </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-headphones');" data-dismiss="modal"><p class="fa fa-headphones"> fa-headphones </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-volume-off');" data-dismiss="modal"><p class="fa fa-volume-off"> fa-volume-off </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fafa-volume-down');" data-dismiss="modal"><p class="fa fa-volume-down"> fa-volume-down </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-volume-up');" data-dismiss="modal"><p class="fa fa-volume-up"> fa-volume-up </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-qrcode ');" data-dismiss="modal"><p class="fa fa-qrcode"> fa-qrcode </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-barcode');" data-dismiss="modal"><p class="fa fa-barcode"> fa-barcode </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-tag');" data-dismiss="modal"><p class="fa fa-tag"> fa-tag </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-tags');" data-dismiss="modal"><p class="fa fa-tags"> fa-tags </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-book');" data-dismiss="modal"><p class="fa fa-book"> fa-book </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fafa-bookmark');" data-dismiss="modal"><p class="fa fa-bookmark"> fa-bookmark </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-print');" data-dismiss="modal"><p class="fa fa-print"> fa-print </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-camera');" data-dismiss="modal"><p class="fa fa-camera"> fa-camera </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-font');" data-dismiss="modal"><p class="fa fa-font"> fa-font </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-bold');" data-dismiss="modal"><p class="fa fa-bold"> fa-bold </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-italic');" data-dismiss="modal"><p class="fa fa-italic"> fa-italic </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-text-height');" data-dismiss="modal"><p class="fa fa-text-height"> fa-text-height </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-text-width');" data-dismiss="modal"><p class="fa fa-text-width"> fa-text-width </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-align-left');" data-dismiss="modal"><p class="fa fa-align-left"> fa-align-left </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-align-center');" data-dismiss="modal"><p class="fa fa-align-center"> fa-align-center </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-align-right');" data-dismiss="modal"><p class="fa fa-align-right"> fa-align-right </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-align-justify');" data-dismiss="modal"><p class="fa fa-align-justify"> fa-align-justify </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa  fa-list');" data-dismiss="modal"><p class="fa fa-list"> fa-list </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-dedent');" data-dismiss="modal"><p class="fa fa-dedent"> fa-dedent </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-outdent');" data-dismiss="modal"><p class="fa fa-outdent"> fa-outdent </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-indent');" data-dismiss="modal"><p class="fa fa-indent"> fa-indent </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-video-camera');" data-dismiss="modal"><p class="fa fa-video-camera"> fa-video-camera </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-photo');" data-dismiss="modal"><p class="fa fa-photo"> fa-photo </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-image');" data-dismiss="modal"><p class="fa fa-image"> fa-image </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-picture-o');" data-dismiss="modal"><p class="fa fa-picture-o"> fa-picture-o </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-pencil');" data-dismiss="modal"><p class="fa fa-pencil"> fa-pencil </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-map-marker');" data-dismiss="modal"><p class="fa fa-map-marker"> fa-map-marker </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-adjust');" data-dismiss="modal"><p class="fa fa-adjust"> fa-adjust </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-tint');" data-dismiss="modal"><p class="fa fa-tint"> fa-tint </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa  fa-edit');" data-dismiss="modal"><p class="fa fa-edit"> fa-edit </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-pencil-square-o');" data-dismiss="modal"><p class="fa fa-pencil-square-o"> fa-pencil-square-o </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-share-square-o');" data-dismiss="modal"><p class="fa fa-share-square-o"> fa-share-square-o </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-check-square-o');" data-dismiss="modal"><p class="fa fa-check-square-o"> fa-check-square-o </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-arrows');" data-dismiss="modal"><p class="fa fa-arrows"> fa-arrows </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-step-backward');" data-dismiss="modal"><p class="fa fa-step-backward"> fa-step-backward </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-fast-backward');" data-dismiss="modal"><p class="fa fa-fast-backward"> fa-fast-backward </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-backward ');" data-dismiss="modal"><p class="fa fa-backward"> fa-backward </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-play');" data-dismiss="modal"><p class="fa fa-play"> fa-play </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-pause');" data-dismiss="modal"><p class="fa fa-pause"> fa-pause </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-stop');" data-dismiss="modal"><p class="fa fa-stop"> fa-stop </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-forward');" data-dismiss="modal"><p class="fa fa-forward"> fa-forward </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-fast-forward');" data-dismiss="modal"><p class="fa fa-fast-forward"> fa-fast-forward </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-step-forward');" data-dismiss="modal"><p class="fa fa-step-forward"> fa-step-forward </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-step-forward');" data-dismiss="modal"><p class="fa fa-eject"> fa-eject </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-chevron-left');" data-dismiss="modal"><p class="fa fa-chevron-left"> fa-chevron-left </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa-chevron-right');" data-dismiss="modal"><p class="fa fa-chevron-right"> fa-chevron-right </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-plus-circle');" data-dismiss="modal"><p class="fa fa-plus-circle"> fa-plus-circle </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-minus-circle');" data-dismiss="modal"><p class="fa fa-minus-circle"> fa-minus-circle </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-times-circle');" data-dismiss="modal"><p class="fa fa-times-circle"> fa-times-circle </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-check-circle');" data-dismiss="modal"><p class="fa fa-check-circle"> fa-check-circle </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-question-circle');" data-dismiss="modal"><p class="fa fa-question-circle"> fa-question-circle </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-info-circle');" data-dismiss="modal"><p class="fa fa-info-circle"> fa-info-circle </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-crosshairs');" data-dismiss="modal"><p class="fa fa-crosshairs"> fa-crosshairs </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-times-circle-o');" data-dismiss="modal"><p class="fa fa-times-circle-o"> fa-times-circle-o </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-check-circle-o');" data-dismiss="modal"><p class="fa fa-check-circle-o"> fa-check-circle-o </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa-ban');" data-dismiss="modal"><p class="fa fa-ban"> fa-ban </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-arrow-left');" data-dismiss="modal"><p class="fa fa-arrow-left"> fa-arrow-left </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-arrow-right');" data-dismiss="modal"><p class="fa fa-arrow-right"> fa-arrow-right </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-arrow-up');" data-dismiss="modal"><p class="fa fa-arrow-up"> fa-arrow-up </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-arrow-down');" data-dismiss="modal"><p class="fa fa-arrow-down"> fa-arrow-down </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-mail-forward');" data-dismiss="modal"><p class="fa fa-mail-forward"> fa-mail-forward </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-share');" data-dismiss="modal"><p class="fa fa-share"> fa-share </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-expand');" data-dismiss="modal"><p class="fa fa-expand"> fa-expand </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-compress');" data-dismiss="modal"><p class="fa fa-compress"> fa-compress </p></a>
                                    <br>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-plus');" data-dismiss="modal"><p class="fa fa-plus"> fa-plus </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-minus');" data-dismiss="modal"><p class="fa fa-minus"> fa-minus </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-asterisk');" data-dismiss="modal"><p class="fa fa-asterisk"> fa-asterisk </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-exclamation-circle');" data-dismiss="modal"><p class="fa fa-exclamation-circle"> fa-exclamation-circle </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-gift');" data-dismiss="modal"><p class="fa fa-gift"> fa-gift </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-leaf');" data-dismiss="modal"><p class="fa fa-leaf"> fa-leaf </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-fire');" data-dismiss="modal"><p class="fa fa-fire"> fa-fire </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-eye');" data-dismiss="modal"><p class="fa fa-eye"> fa-eye </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa  fa-eye-slash');" data-dismiss="modal"><p class="fa fa-eye-slash"> fa-eye-slash </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-warning');" data-dismiss="modal"><p class="fa fa-warning"> fa-warning </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-exclamation-triangle');" data-dismiss="modal">  <p class="fa fa-exclamation-triangle"> fa-exclamation-triangle </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-plane');" data-dismiss="modal"><p class="fa fa-plane"> fa-plane </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-calendar');" data-dismiss="modal"><p class="fa fa-calendar"> fa-calendar </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-random');" data-dismiss="modal"><p class="fa fa-random"> fa-random </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-comment');" data-dismiss="modal"><p class="fa fa-comment"> fa-comment </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-magnet');" data-dismiss="modal"><p class="fa fa-magnet"> fa-magnet </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-chevron-up');" data-dismiss="modal"><p class="fa fa-chevron-up"> fa-chevron-up </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-chevron-down');" data-dismiss="modal"><p class="fa fa-chevron-down"> fa-chevron-down </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-retweet');" data-dismiss="modal"><p class="fa fa-retweet"> fa-retweet </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-shopping-cart');" data-dismiss="modal"><p class="fa fa-shopping-cart"> fa-shopping-cart </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-folder');" data-dismiss="modal"><p class="fa fa-folder"> fa-folder </p></a>
                                    <br/>
                                    <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-folder-open');" data-dismiss="modal"><p class="fa fa-folder-open"> fa-folder-open </p></a>
                                    <br/>
                            </div>
                            <div class="fa col-lg-3">
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-angle-double-left');" data-dismiss="modal"><p class="fa fa-angle-double-left"> fa-angle-double-left </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-angle-double-right');" data-dismiss="modal"><p class="fa fa-angle-double-right"> fa-angle-double-right </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-angle-double-u');" data-dismiss="modal"><p class="fa fa-angle-double-up"> fa-angle-double-up </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-angle-double-down');" data-dismiss="modal"><p class="fa fa-angle-double-down"> fa-angle-double-down </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-angle-left');" data-dismiss="modal"><p class="fa fa-angle-left"> fa-angle-left </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-angle-right');" data-dismiss="modal"><p class="fa fa-angle-right"> fa-angle-right </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-angle-up');" data-dismiss="modal"><p class="fa fa-angle-up"> fa-angle-up </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-angle-down');" data-dismiss="modal"><p class="fa fa-angle-down"> fa-angle-down </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-desktop');" data-dismiss="modal"><p class="fa fa-desktop"> fa-desktop </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-laptop');" data-dismiss="modal"><p class="fa fa-laptop"> fa-laptop </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-tablet');" data-dismiss="modal"><p class="fa fa-tablet"> fa-tablet </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-mobile-phone');" data-dismiss="modal"><p class="fa fa-mobile-phone"> fa-mobile-phone </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-mobile');" data-dismiss="modal"><p class="fa fa-mobile"> fa-mobile </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-circle-o');" data-dismiss="modal"><p class="fa fa-circle-o"> fa-circle-o </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-quote-left');" data-dismiss="modal"><p class="fa fa-quote-left"> fa-quote-left </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-quote-right');" data-dismiss="modal"><p class="fa fa-quote-right"> fa-quote-right </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-spinner');" data-dismiss="modal"><p class="fa fa-spinner"> fa-spinner </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-circle');" data-dismiss="modal"><p class="fa fa-circle"> fa-circle </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-mail-reply');" data-dismiss="modal"><p class="fa fa-mail-reply"> fa-mail-reply </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-reply');" data-dismiss="modal"><p class="fa fa-reply"> fa-reply </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-github-alt');" data-dismiss="modal"><p class="fa fa-github-alt"> fa-github-alt </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-folder-o');" data-dismiss="modal"><p class="fa fa-folder-o"> fa-folder-o </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-folder-open-o');" data-dismiss="modal"><p class="fa fa-folder-open-o"> fa-folder-open-o </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-smile-o');" data-dismiss="modal"><p class="fa fa-smile-o"> fa-smile-o </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-frown-');" data-dismiss="modal"><p class="fa fa-frown-o"> fa-frown-o </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-meh-o');" data-dismiss="modal"><p class="fa fa-meh-o"> fa-meh-o </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-gamepad');" data-dismiss="modal"><p class="fa fa-gamepad"> fa-gamepad </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-keyboard-o');" data-dismiss="modal"><p class="fa fa-keyboard-o"> fa-keyboard-o </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-flag-o');" data-dismiss="modal"><p class="fa fa-flag-o"> fa-flag-o </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-flag-checkered');" data-dismiss="modal"><p class="fa fa-flag-checkered"> fa-flag-checkered </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-terminal');" data-dismiss="modal"><p class="fa fa-terminal"> fa-terminal </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-code');" data-dismiss="modal"><p class="fa fa-code"> fa-code </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-mail-reply-all');" data-dismiss="modal"><p class="fa fa-mail-reply-all"> fa-mail-reply-all </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-reply-all');" data-dismiss="modal"><p class="fa fa-reply-all"> fa-reply-all </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-star-half-empty');" data-dismiss="modal"><p class="fa fa-star-half-empty"> fa-star-half-empty </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-star-half-full');" data-dismiss="modal"><p class="fa fa-star-half-full"> fa-star-half-full </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-star-half-o');" data-dismiss="modal"><p class="fa fa-star-half-o"> fa-star-half-o </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-location-arrow');" data-dismiss="modal"><p class="fa fa-location-arrow"> fa-location-arrow </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('a fa-crop');" data-dismiss="modal"><p class="fa fa-crop"> fa-crop </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-code-fork');" data-dismiss="modal"><p class="fa fa-code-fork"> fa-code-fork </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-unlink');" data-dismiss="modal"><p class="fa fa-unlink"> fa-unlink </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-chain-broken');" data-dismiss="modal"><p class="fa fa-chain-broken"> fa-chain-broken </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-question');" data-dismiss="modal"><p class="fa fa-question"> fa-question </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa faf-info');" data-dismiss="modal"><p class="fa faf-info"> fa-info </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-exclamation');" data-dismiss="modal"><p class="fa fa-exclamation"> fa-exclamation </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-superscript');" data-dismiss="modal"> <p class="fa fa-superscript"> fa-superscript </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-subscript');" data-dismiss="modal"><p class="fa fa-subscript"> fa-subscript </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-eraser');" data-dismiss="modal"><p class="fa fa-eraser"> fa-eraser </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-puzzle-piece');" data-dismiss="modal"><p class="fa fa-puzzle-piece"> fa-puzzle-piece </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-microphone');" data-dismiss="modal"><p class="fa fa-microphone"> fa-microphone </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-microphone-slash');" data-dismiss="modal"><p class="fa fa-microphone-slash"> fa-microphone-slash </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-shield');" data-dismiss="modal"><p class="fa fa-shield"> fa-shield </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-calendar-o');" data-dismiss="modal"><p class="fa fa-calendar-o"> fa-calendar-o </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-fire-extinguisher');" data-dismiss="modal"><p class="fa fa-fire-extinguisher"> fa-fire-extinguisher </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-rocket');" data-dismiss="modal"><p class="fa fa-rocket"> fa-rocket </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-maxcdn');" data-dismiss="modal"><p class="fa fa-maxcdn"> fa-maxcdn </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-chevron-circle-left');" data-dismiss="modal"><p class="fa fa-chevron-circle-left"> fa-chevron-circle-left </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-chevron-circle-right');" data-dismiss="modal"><p class="fa fa-chevron-circle-right"> fa-chevron-circle-right </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa ffa-chevron-circle-up');" data-dismiss="modal"><p class="fa fa-chevron-circle-up"> fa-chevron-circle-up </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-chevron-circle-down');" data-dismiss="modal"><p class="fa fa-chevron-circle-down"> fa-chevron-circle-down </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-html5');" data-dismiss="modal"><p class="fa fa-html5"> fa-html5 </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-css3');" data-dismiss="modal"><p class="fa fa-css3"> fa-css3 </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-anchort');" data-dismiss="modal"><p class="fa fa-anchor"> fa-anchor </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-unlock-alt');" data-dismiss="modal"><p class="fa fa-unlock-alt"> fa-unlock-alt </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa bullseye');" data-dismiss="modal"><p class="fa fa-bullseye"> fa-bullseye </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-fa-ellipsis-h');" data-dismiss="modal"><p class="fa fa-ellipsis-h"> fa-ellipsis-h </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-ellipsis-v');" data-dismiss="modal"><p class="fa fa-ellipsis-v"> fa-ellipsis-v </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-rss-square');" data-dismiss="modal"><p class="fa fa-rss-square"> fa-rss-square </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-play-circle');" data-dismiss="modal"><p class="fa fa-play-circle"> fa-play-circle </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-ticket');" data-dismiss="modal"><p class="fa fa-ticket"> fa-ticket </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-minus-square');" data-dismiss="modal"><p class="fa fa-minus-square"> fa-minus-square </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-minus-square-o');" data-dismiss="modal"><p class="fa fa-minus-square-o"> fa-minus-square-o </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-level-up');" data-dismiss="modal"><p class="fa fa-level-up"> fa-level-up </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-level-down');" data-dismiss="modal"><p class="fa fa-level-down"> fa-level-down </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-check-square');" data-dismiss="modal"><p class="fa fa-check-square"> fa-check-square </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-pencil-square');" data-dismiss="modal"><p class="fa fa-pencil-square"> fa-pencil-square </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-external-link-square');" data-dismiss="modal"><p class="fa fa-external-link-square"> fa-external-link-square </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-share-square');" data-dismiss="modal"><p class="fa fa-share-square"> fa-share-square </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-compass');" data-dismiss="modal"><p class="fa fa-compass"> fa-compass </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-toggle-down');" data-dismiss="modal"><p class="fa fa-toggle-down"> fa-toggle-down </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-caret-square-o-down');" data-dismiss="modal"><p class="fa fa-caret-square-o-down"> fa-caret-square-o-down </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-toggle-up');" data-dismiss="modal"><p class="fa fa-toggle-up"> fa-toggle-up </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-caret-square-o-up');" data-dismiss="modal"><p class="fa fa-caret-square-o-up"> fa-caret-square-o-up </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-toggle-right');" data-dismiss="modal"><p class="fa fa-toggle-right"> fa-toggle-right </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-caret-square-o-right');" data-dismiss="modal"><p class="fa fa-caret-square-o-right"> fa-caret-square-o-right </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-euro');" data-dismiss="modal"><p class="fa fa-euro"> fa-euro </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-eur');" data-dismiss="modal"><p class="fa fa-eur"> fa-eur </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-gbp');" data-dismiss="modal"><p class="fa fa-gbp"> fa-gbp </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-dollar');" data-dismiss="modal"><p class="fa fa-dollar"> fa-dollar </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-usd');" data-dismiss="modal"><p class="fa fa-usd"> fa-usd </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-rupee');" data-dismiss="modal"><p class="fa fa-rupee"> fa-rupee </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-inr');" data-dismiss="modal"><p class="fa fa-inr"> fa-inr </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-cny');" data-dismiss="modal"><p class="fa fa-cny"> fa-cny </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-rmb');" data-dismiss="modal"><p class="fa fa-rmb"> fa-rmb </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-yen');" data-dismiss="modal"><p class="fa fa-yen"> fa-yen </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-jpy');" data-dismiss="modal"><p class="fa fa-jpy"> fa-jpy </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-ruble');" data-dismiss="modal"><p class="fa fa-ruble"> fa-ruble </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-rouble');" data-dismiss="modal"><p class="fa fa-rouble"> fa-rouble </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-rub');" data-dismiss="modal"><p class="fa fa-rub"> fa-rub </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-won');" data-dismiss="modal"><p class="fa fa-won"> fa-won </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-krw');" data-dismiss="modal"><p class="fa fa-krw"> fa-krw </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-bitcoin');" data-dismiss="modal"><p class="fa fa-bitcoin"> fa-bitcoin </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-btc');" data-dismiss="modal"><p class="fa fa-btc"> fa-btc </p></a>
                                <br/>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-btc');" data-dismiss="modal"><p class="fa fa-btc"> fa-btc </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-file');" data-dismiss="modal"><p class="fa fa-file"> fa-file </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-file-text');" data-dismiss="modal"><p class="fa fa-file-text"> fa-file-text </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-sort-alpha-asc');" data-dismiss="modal"><p class="fa fa-sort-alpha-asc"> fa-sort-alpha-asc </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-sort-alpha-desc');" data-dismiss="modal"><p class="fa fa-sort-alpha-desc"> fa-sort-alpha-desc </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-sort-amount-asc');" data-dismiss="modal"><p class="fa fa-sort-amount-asc"> fa-sort-amount-asc </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-sort-amount-desc');" data-dismiss="modal"><p class="fa fa-sort-amount-desc"> fa-sort-amount-desc </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-sort-numeric-asc');" data-dismiss="modal"><p class="fa fa-sort-numeric-asc"> fa-sort-numeric-asc </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-sort-numeric-desc');" data-dismiss="modal"><p class="fa fa-sort-numeric-desc"> fa-sort-numeric-desc </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-thumbs-up');" data-dismiss="modal"><p class="fa fa-thumbs-up"> fa-thumbs-up </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-thumbs-down');" data-dismiss="modal"><p class="fa fa-thumbs-down"> fa-thumbs-down </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-youtube-square');" data-dismiss="modal"><p class="fa fa-youtube-square"> fa-youtube-square </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-youtube');" data-dismiss="modal"><p class="fa fa-youtube"> fa-youtube </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-xing');" data-dismiss="modal"><p class="fa fa-xing"> fa-xing </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-xing-square');" data-dismiss="modal"><p class="fa fa-xing-square"> fa-xing-square </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-youtube-play');" data-dismiss="modal"><p class="fa fa-youtube-play"> fa-youtube-play </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-dropbox');" data-dismiss="modal"><p class="fa fa-dropbox"> fa-dropbox </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-stack-overflow');" data-dismiss="modal"><p class="fa fa-stack-overflow"> fa-stack-overflow </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-instagram');" data-dismiss="modal"><p class="fa fa-instagram"> fa-instagram </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-flickr');" data-dismiss="modal"><p class="fa fa-flickr"> fa-flickr </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-adn');" data-dismiss="modal"><p class="fa fa-adn"> fa-adn </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-bitbucket');" data-dismiss="modal"><p class="fa fa-bitbucket"> fa-bitbucket </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-bitbucket-square');" data-dismiss="modal"><p class="fa fa-bitbucket-square"> fa-bitbucket-square </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-tumblr');" data-dismiss="modal"><p class="fa fa-tumblr"> fa-tumblr </p></a>
                                <br/>
                            </div>
                            <div class="fa col-lg-3">
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-tumblr-square');" data-dismiss="modal"><p class="fa fa-tumblr-square"> fa-tumblr-square </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-long-arrow-down');" data-dismiss="modal"><p class="fa fa-long-arrow-down"> fa-long-arrow-down </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-long-arrow-up');" data-dismiss="modal"><p class="fa fa-long-arrow-up"> fa-long-arrow-up </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-long-arrow-left');" data-dismiss="modal"><p class="fa fa-long-arrow-left"> fa-long-arrow-left </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-long-arrow-right');" data-dismiss="modal"><p class="fa fa-long-arrow-right"> fa-long-arrow-right </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-apple');" data-dismiss="modal"><p class="fa fa-apple"> fa-apple </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-windows');" data-dismiss="modal"><p class="fa fa-windows"> fa-windows </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-android');" data-dismiss="modal"><p class="fa fa-android"> fa-android </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-linux');" data-dismiss="modal"><p class="fa fa-linux"> fa-linux </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-dribbble');" data-dismiss="modal"><p class="fa fa-dribbble"> fa-dribbble </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-skype');" data-dismiss="modal"><p class="fa fa-skype"> fa-skype </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-foursquare');" data-dismiss="modal"><p class="fa fa-foursquare"> fa-foursquare </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-trello');" data-dismiss="modal"><p class="fa fa-trello"> fa-trello </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-female');" data-dismiss="modal"><p class="fa fa-female"> fa-female </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-male');" data-dismiss="modal"><p class="fa fa-male"> fa-male </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-gittip');" data-dismiss="modal"><p class="fa fa-gittip"> fa-gittip </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-sun-o');" data-dismiss="modal"><p class="fa fa-sun-o"> fa-sun-o </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-moon-o');" data-dismiss="modal"><p class="fa fa-moon-o"> fa-moon-o </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-archive');" data-dismiss="modal"><p class="fa fa-archive"> fa-archive </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-bug');" data-dismiss="modal"><p class="fa fa-bug"> fa-bug </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-vk');" data-dismiss="modal"><p class="fa fa-vk"> fa-vk </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-weibo');" data-dismiss="modal"><p class="fa fa-weibo"> fa-weibo </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-renren');" data-dismiss="modal"><p class="fa fa-renren"> fa-renren </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-pagelines');" data-dismiss="modal"><p class="fa fa-pagelines"> fa-pagelines </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-stack-exchange');" data-dismiss="modal"><p class="fa fa-stack-exchange"> fa-stack-exchange </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-arrow-circle-o-right');" data-dismiss="modal"><p class="fa fa-arrow-circle-o-right"> fa-arrow-circle-o-right </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-arrow-circle-o-left');" data-dismiss="modal"><p class="fa fa-arrow-circle-o-left"> fa-arrow-circle-o-left </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-toggle-left');" data-dismiss="modal"><p class="fa fa-toggle-left"> fa-toggle-left </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-caret-square-o-left');" data-dismiss="modal"><p class="fa fa-caret-square-o-left"> fa-caret-square-o-left </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-dot-circle-o');" data-dismiss="modal"><p class="fa fa-dot-circle-o"> fa-dot-circle-o </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-wheelchair');" data-dismiss="modal"><p class="fa fa-wheelchair"> fa-wheelchair </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-vimeo-square');" data-dismiss="modal"><p class="fa fa-vimeo-square"> fa-vimeo-square </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-turkish-lira');" data-dismiss="modal"><p class="fa fa-turkish-lira"> fa-turkish-lira </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-try');" data-dismiss="modal"><p class="fa fa-try"> fa-try </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-plus-square-o');" data-dismiss="modal"><p class="fa fa-plus-square-o"> fa-plus-square-o </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-space-shuttle');" data-dismiss="modal"><p class="fa fa-space-shuttle"> fa-space-shuttle </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-slack');" data-dismiss="modal"><p class="fa fa-slack"> fa-slack </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-fa-envelope-square');" data-dismiss="modal"><p class="fa fa-envelope-square"> fa-envelope-square </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-wordpress');" data-dismiss="modal"><p class="fa fa-wordpress"> fa-wordpress </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-openid');" data-dismiss="modal"><p class="fa fa-openid"> fa-openid </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-institution');" data-dismiss="modal"><p class="fa fa-institution"> fa-institution </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-bank');" data-dismiss="modal"><p class="fa fa-bank"> fa-bank </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-university');" data-dismiss="modal"><p class="fa fa-university"> fa-university </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-mortar-board');" data-dismiss="modal"><p class="fa fa-mortar-board"> fa-mortar-board </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-graduation-cap');" data-dismiss="modal"><p class="fa fa-graduation-cap"> fa-graduation-cap </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-yahoo');" data-dismiss="modal"><p class="fa fa-yahoo"> fa-yahoo </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-google');" data-dismiss="modal"><p class="fa fa-google"> fa-google </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-reddit');" data-dismiss="modal"><p class="fa fa-reddit"> fa-reddit </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-reddit-square');" data-dismiss="modal"><p class="fa fa-reddit-square"> fa-reddit-square </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-stumbleupon-circle');" data-dismiss="modal"><p class="fa fa-stumbleupon-circle"> fa-stumbleupon-circle </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-stumbleupon');" data-dismiss="modal"><p class="fa fa-stumbleupon"> fa-stumbleupon </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-delicious');" data-dismiss="modal"><p class="fa fa-delicious"> fa-delicious </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-digg');" data-dismiss="modal"><p class="fa fa-digg"> fa-digg </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-pied-piper-square');" data-dismiss="modal"><p class="fa fa-pied-piper-square"> fa-pied-piper-square </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-pied-piper');" data-dismiss="modal"><p class="fa fa-pied-piper"> fa-pied-piper </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-pied-piper-alt');" data-dismiss="modal"><p class="fa fa-pied-piper-alt"> fa-pied-piper-alt </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-drupal');" data-dismiss="modal"><p class="fa fa-drupal"> fa-drupal </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-joomla');" data-dismiss="modal"><p class="fa fa-joomla"> fa-joomla </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-language');" data-dismiss="modal"><p class="fa fa-language"> fa-language </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-fax');" data-dismiss="modal"><p class="fa fa-fax"> fa-fax </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-building');" data-dismiss="modal"><p class="fa fa-building"> fa-building </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-child');" data-dismiss="modal"><p class="fa fa-child"> fa-child </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-paw');" data-dismiss="modal"><p class="fa fa-paw"> fa-paw </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-spoon');" data-dismiss="modal"><p class="fa fa-spoon"> fa-spoon </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-cube');" data-dismiss="modal"><p class="fa fa-cube"> fa-cube </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-cubes');" data-dismiss="modal"><p class="fa fa-cubes"> fa-cubes </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-behance ');" data-dismiss="modal"><p class="fa fa-behance"> fa-behance </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-behance-square');" data-dismiss="modal"><p class="fa fa-behance-square"> fa-behance-square </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-steam');" data-dismiss="modal"><p class="fa fa-steam"> fa-steam </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-steam-square');" data-dismiss="modal"><p class="fa fa-steam-square"> fa-steam-square </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-recycle');" data-dismiss="modal"><p class="fa fa-recycle"> fa-recycle </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-automobile');" data-dismiss="modal"><p class="fa fa-automobile"> fa-automobile </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-car');" data-dismiss="modal"><p class="fa fa-car"> fa-car </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-cab');" data-dismiss="modal"><p class="fa fa-cab"> fa-cab </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-taxi');" data-dismiss="modal"><p class="fa fa-taxi"> fa-taxi </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-tree');" data-dismiss="modal"><p class="fa fa-tree"> fa-tree </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-spotify');" data-dismiss="modal"><p class="fa fa-spotify"> fa-spotify </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-deviantart');" data-dismiss="modal"><p class="fa fa-deviantart"> fa-deviantart </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-soundcloud');" data-dismiss="modal"><p class="fa fa-soundcloud"> fa-soundcloud </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-database');" data-dismiss="modal"><p class="fa fa-database"> fa-database </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-file-pdf-o');" data-dismiss="modal"><p class="fa fa-file-pdf-o"> fa-file-pdf-o </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-file-word-o');" data-dismiss="modal"><p class="fa fa-file-word-o"> fa-file-word-o </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-file-excel-o');" data-dismiss="modal"><p class="fa fa-file-excel-o"> fa-file-excel-o </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-file-powerpoint-o');" data-dismiss="modal"><p class="fa fa-file-powerpoint-o"> fa-file-powerpoint-o </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-file-photo-o');" data-dismiss="modal"><p class="fa fa-file-photo-o"> fa-file-photo-o </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-file-picture-o');" data-dismiss="modal"><p class="fa fa-file-picture-o"> fa-file-picture-o </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-file-image-o');" data-dismiss="modal"><p class="fa fa-file-image-o"> fa-file-image-o </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-file-zip-o');" data-dismiss="modal"><p class="fa fa-file-zip-o"> fa-file-zip-o </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-file-archive-o');" data-dismiss="modal"><p class="fa fa-file-archive-o"> fa-file-archive-o </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-file-sound-o');" data-dismiss="modal"><p class="fa fa-file-sound-o"> fa-file-sound-o </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-file-audio-o');" data-dismiss="modal"><p class="fa fa-file-audio-o"> fa-file-audio-o </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-file-movie-o');" data-dismiss="modal"><p class="fa fa-file-movie-o"> fa-file-movie-o </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-file-video-o');" data-dismiss="modal"><p class="fa fa-file-video-o"> fa-file-video-o </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-file-code-o');" data-dismiss="modal"><p class="fa fa-file-code-o"> fa-file-code-o </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-vine');" data-dismiss="modal"><p class="fa fa-vine"> fa-vine </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-codepen');" data-dismiss="modal"><p class="fa fa-codepen"> fa-codepen </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-jsfiddle');" data-dismiss="modal"><p class="fa fa-jsfiddle"> fa-jsfiddle </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-life-bouy');" data-dismiss="modal"><p class="fa fa-life-bouy"> fa-life-bouy </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-life-saver');" data-dismiss="modal"><p class="fa fa-life-saver"> fa-life-saver </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-support');" data-dismiss="modal"><p class="fa fa-support"> fa-support </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-life-ring');" data-dismiss="modal"><p class="fa fa-life-ring"> fa-life-ring </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-circle-o-notch');" data-dismiss="modal"><p class="fa fa-circle-o-notch"> fa-circle-o-notch </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-ra');" data-dismiss="modal"><p class="fa fa-ra"> fa-ra </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-rebel');" data-dismiss="modal"><p class="fa fa-rebel"> fa-rebel </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa fa-ge');" data-dismiss="modal"><p class="fa fa-ge"> fa-ge </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-empire');" data-dismiss="modal"><p class="fa fa-empire"> fa-empire </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-git-square');" data-dismiss="modal"><p class="fa fa-git-square"> fa-git-square </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-git');" data-dismiss="modal"><p class="fa fa-git"> fa-git </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-hacker-news');" data-dismiss="modal"><p class="fa fa-hacker-news"> fa-hacker-news </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-tencent-weibo');" data-dismiss="modal"><p class="fa fa-tencent-weibo"> fa-tencent-weibo </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-qq');" data-dismiss="modal"><p class="fa fa-qq"> fa-qq </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-wechat');" data-dismiss="modal"><p class="fa fa-wechat"> fa-wechat </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-weixin');" data-dismiss="modal"><p class="fa fa-weixin"> fa-weixin </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-send');" data-dismiss="modal"><p class="fa fa-send"> fa-send </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-paper-plane');" data-dismiss="modal"><p class="fa fa-paper-plane"> fa-paper-plane </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-send-o');" data-dismiss="modal"><p class="fa fa-send-o"> fa-send-o </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-paper-plane-o');" data-dismiss="modal"><p class="fa fa-paper-plane-o"> fa-paper-plane-o </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-history');" data-dismiss="modal"><p class="fa fa-history"> fa-history </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-circle-thin');" data-dismiss="modal"><p class="fa fa-circle-thin"> fa-circle-thin </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-header');" data-dismiss="modal"><p class="fa fa-header"> fa-header </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-paragraph');" data-dismiss="modal"><p class="fa fa-paragraph"> fa-paragraph </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-sliders');" data-dismiss="modal"><p class="fa fa-sliders"> fa-sliders </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-share-alt');" data-dismiss="modal"><p class="fa fa-share-alt"> fa-share-alt </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-share-alt-square');" data-dismiss="modal"><p class="fa fa-share-alt-square"> fa-share-alt-square </p></a>
                                <br/>
                                <a style="cursor:pointer" style="cursor:hand" onclick="cargarinput('fa fa-bomb');" data-dismiss="modal"><p class="fa fa-bomb"> fa-bomb </p></a>
                                <br/>
                            </div>
                            <!-- /.col-lg-6 (nested) -->
                        </div>
                        <!-- /.row (nested) -->
                    </div>
                    <!-- /.panel-body -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <!--fin del modal-->
          <?php require_once("../../../../Apps/Main/footer.php"); ?>
    </body>
    <!--metoodo para pasar datos del modal al input-->
    <script type="text/javascript">
        function cargarinput(seleccion) {
            document.getElementById('icono1').value = seleccion;
        }
    </script>
    <script>
        $(function () {
            $('#cargarimagen').on('change', function () {
                var rutaimg = $(this).val();
                var extension = rutaimg.substring(rutaimg.length - 3, rutaimg.length);
                document.getElementById('imagen').value = ruta;
            });
        });
    </script>
    <!--fin metodo-->
</html>
