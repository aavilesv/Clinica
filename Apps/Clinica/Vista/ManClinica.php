<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mantenimiento de Clinicas</title>



        <?php
        $ruta = "../../../";
        require_once("../../../Apps/Main/head.php");
        require_once('../Controlador/CtrClinica.php');
        ?>

    </head>
    <body>
        <?php
        require_once("../../../Apps/Main/header.php");
        if (isset($_GET['opc'])) {
            switch ($_GET['opc']) {
                case 'nuevo':
                    # Para nuevo registro
                    $cli_Id = "";
                    $cli_Nombre = "";
                    $cli_Direc = "";
                    $cli_Telefono = "";
                    $cli_Prop = "";
                    $cli_Correo = "";
                    $cli_Fax = "";
                    $cli_PagWeb = "";
                    $cli_Estado = "";
                    $hidden = '';
                    $disabled = '';
                    break;
                case 'editar':
                    # Para Editar datos
                    $cli_nica = new CtrClinica();
                    $registros = $cli_nica->getClinica($_GET['usua']);

                    $cli_Id = $registros->__get('cli_Id');
                    $cli_Nombre = $registros->__get('cli_Nombre');
                    $cli_Direc = $registros->__get('cli_Direc');
                    $cli_Telefono = $registros->__get('cli_Telefono');
                    $cli_Prop = $registros->__get('cli_Prop');
                    $cli_Correo = $registros->__get('cli_Correo');
                    $cli_Fax = $registros->__get('cli_Fax');
                    $cli_PagWeb = $registros->__get('cli_PagWeb');
                    $cli_FecCrea = $registros->__get('cli_FecCrea');
                    $cli_FecMod = $registros->__get('cli_FecMod');
                    $hidden = 'hidden';
                    $disabled = '';
                    break;
                case 'ver':
                    # Para Visualizar los datos
                    $cli_nica = new CtrClinica();
                    $registros = $cli_nica->getClinica($_GET['usua']);

                    $cli_Id = $registros->__get('cli_Id');
                    $cli_Nombre = $registros->__get('cli_Nombre');
                    $cli_Direc = $registros->__get('cli_Direc');
                    $cli_Telefono = $registros->__get('cli_Telefono');
                    $cli_Prop = $registros->__get('cli_Prop');
                    $cli_Correo = $registros->__get('cli_Correo');
                    $cli_Fax = $registros->__get('cli_Fax');
                    $cli_PagWeb = $registros->__get('cli_PagWeb');
                    $cli_FecCrea = $registros->__get('cli_FecCrea');
                    $cli_FecMod = $registros->__get('cli_FecMod');
                    $hidden = '';
                    $disabled = 'disabled';
                    break;
            }
        }
        ?>


        <?php require_once("../../../Apps/Main/header.php"); ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">

                        <br> <br>
                        <div class="row-fluid">
                            <div class="span12">
                                <ul class="breadcrumb">
                                    <li><a href= " <?php echo $ruta; ?>Apps/Main/index.php">Inicio</a><span class="divider"></span></li>
                                    <li><a href= " <?php echo $ruta; ?>Apps/Clinica/Vista/ListarClinica.php">Clinicas</a><span class="divider"></span></li>
                                    <li><a href="javascript:window.location.reload();" class="active">Mantenimiento de Clinicas</a> <span class="divider">/</span></li>
                                </ul>
                            </div>
                        </div>

                        <div class="row-fluid">
                            <div class="col-lg-12">
                                <h1 class="page-header">Mantenimiento Clinica</h1>
                            </div><!-- /.col-lg-12 -->
                        </div><!-- /.row -->

                        <div class="container-fluid">
                            <div class="col-xs-12 col-md-2"></div>
                            <div class="col-xs-12 col-md-7">
                                <br>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Registro de clinica
                                    </div>

                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-10">
                                                <form class="form-horizontal" name="frmUsuario"  method="post" action="InterfazClinica.php">

                                                    <div class="form-group">
                                                        <div class="col-md-9">
                                                            <input type="hidden" class="form-control " name="Id" maxlength="45"
                                                                   id="id" required="true" value='<?= $cli_Id; ?>'>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Nombre:</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control " name="cli_Nombre" maxlength="20"
                                                                   id="nombre" value ='<?= $cli_Nombre; ?>' required="true" <?php echo $disabled ?>>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Direccion:</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control " name="cli_Direc" maxlength="30" 
                                                                   id="direccion" value ='<?= $cli_Direc ?>' required="true" <?php echo $disabled ?>>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Telefono:</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control " name="cli_Telefono" onKeyPress="return soloNumeros(event)" maxlength="10"
                                                                   id="telefono" value ='<?= $cli_Telefono; ?>' required="true" <?php echo $disabled ?>>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Propietario:</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control " name="cli_Prop" maxlength="30" onKeyPress="return sololetras(event)"
                                                                   id="nombre" value ='<?= $cli_Prop ?>' required="true" <?php echo $disabled ?>>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Correo:</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control " name="cli_Correo" maxlength="25"
                                                                   id="email" value ='<?= $cli_Correo ?>' required="true" <?php echo $disabled ?>>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Fax:</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control " name="cli_Fax" maxlength="15" onKeyPress="return soloNumeros(event)"
                                                                   id="fax" value ='<?= $cli_Fax ?>' required="true" <?php echo $disabled ?>>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Pagina Web:</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control " name="cli_PagWeb" maxlength="50"
                                                                   id="web" value ='<?= $cli_PagWeb ?>' required="true" <?php echo $disabled ?>>
                                                        </div>
                                                    </div>

                                                    <?php if (isset($_GET['opc']) && ($_GET['opc'] == 'nuevo')) {
                                                        ?>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Estado:</label>
                                                            <div class="col-md-9 text-center" >
                                                                <label class="checkbox form-control"><input  id="cli_Estado" type="checkbox" name="cli_Estado" <?php echo $disabled ?>>Activo</label>                                                              
                                                            </div>
                                                        </div>

                                                        <?php
                                                    } else {
                                                        ?>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Estado:</label>
                                                            <div class="col-md-9 text-center" >
                                                                <label class="checkbox form-control"><input id="cli_Estado" value ='<?= $cli_Estado ?>' type="checkbox" name="cli_Estado" <?= ($registros->cli_Estado == true ? "checked" : "notchecked") ?> <?php echo $disabled ?>>Activo</label>                                                              
                                                            </div>
                                                        </div>

                                                    <?php }
                                                    ?>

                                                    <?php if (isset($_GET['opc']) && ($_GET['opc'] == 'nuevo' || $_GET['opc'] == 'editar')) {
                                                        ?>
                                                        <div class="btn btn-group col-md-offset-3 ">
                                                            <div class="col-md-2">
                                                                <button id="btnOk" type="submit" class=" btn btn-success "><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
                                                            </div>

                                                            <div class="col-md-2 col-md-offset-3">
                                                                <a href="ListarClinica.php" id="btnSalir" class="btn btn-danger"> <i class="glyphicon glyphicon-remove"></i> Cancelar</a>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <div class="col-md-2 col-md-offset-3 ">
                                                            <a href="ListarClinica.php" id="btnSalir" class="btn btn-primary" <i class="glyphicon glyphicon-remove"></i> Regresar</a>
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
                <?php require_once("../../../Apps/Main/footer.php"); ?>

                <script>
                    $(function () {
                        $('#btnOk').on('click', function ()
                        {
                            var telefono = $("#telefono").val();
                            var email = $('#email').val();
                            var web = $('#web').val();
                            if (telefono.length !== 10) {
                                $("#telefono").val("");
                                $('#telefono').focus();
                                swal("El telefono debe contener 10 digitos");
                            }else if (email.length <= 10 || validarEmail(email)) {
                                $("#email").val("");
                                $('#email').focus();
                                swal("La direccion de correo no es valida");
                            }else if (email.length <= 10 || validarWeb(web)) {
                                $("#web").val("");
                                $('#web').focus();
                                swal("La pagina web no es valida");
                            }

                        });
                    });
                </script>  
                
                </body>
                </html>
