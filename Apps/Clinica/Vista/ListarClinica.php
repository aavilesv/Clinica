<?php require_once('../Controlador/CtrClinica.php'); ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Lista de Clinicas</title>
        <?php
        $ruta = "../../../";
        require_once("../../../Apps/Main/head.php");
        ?>

    </head>

    <body>
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
                                    <li><a href="javascript:window.location.reload();" class="active">Clinicas</a> <span class="divider">/</span></li>
                                </ul>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="page-header">Modulo de Clinicas</h1>
                            </div><!-- /.col-lg-12 -->
                        </div><!-- /.row -->

                        <div class="container-fluid">
                            <div class="row">
                                <div class="panel panel-default panel-table panel-success">
                                    <div class="panel-heading">
                                        <div class="row"> <!-- Criterios de Búsqueda-->
                                            <div class="col col-xs-6">
                                                <form method="GET" action="ListarClinica.php">
                                                    <div class="input-group">
                                                        <div class="input-group-btn search-panel">
                                                            <button type="button" class="btn btn-info">
                                                                <span id="search_concept">Buscar Por </span> <span class="caret"></span>
                                                            </button>
                                                        </div>
                                                        <?php
                                                        if (!isset($q)) {
                                                            $q = '';
                                                        }
                                                        ?>
                                                        <input type="text" class="form-control" name="q" placeholder="Ingrese criterio búsqueda... " value="<?= $q ?>">
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
                                                        </span>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col col-xs-6 text-right">
                                                <div class="btn-group">
                                                    <a class="btn btn-success col-md-offset-11" href='ManClinica.php?usua=0&opc=nuevo' role="button" align="right">
                                                        <i class="glyphicon glyphicon-plus-sign"> </i>
                                                        Nuevo Registro
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
                                                <table id="example" class="table  table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Nombre</th>
                                                            <th>Direccion</th>
                                                            <th>Telefono</th>
                                                            <th>Propietario</th>
                                                            <th>Correo</th>
                                                            <th>Pagina Web</th>
                                                            <th>Estado</th>
                                                            <th>Acción</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $ctrClinica = new CtrClinica();
                                                        $registros = $ctrClinica->getClinicas();
                                                        foreach ($registros as $registro) {
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $registro->__get('cli_Nombre'); ?></td>
                                                                <td><?php echo $registro->__get('cli_Direc'); ?></td>
                                                                <td><?php echo $registro->__get('cli_Telefono'); ?></td>
                                                                <td><?php echo $registro->__get('cli_Prop'); ?></td>
                                                                <td><?php echo $registro->__get('cli_Correo'); ?></td>
                                                                <td><?php echo $registro->__get('cli_PagWeb'); ?></td>
                                                                <?php
                                                                if ($registro->__get('cli_Estado') == 1) {
                                                                    echo '<td><center><span class="label label-success" title="Activo">Activo</span></center></td>';
                                                                } elseif ($registro->__get('cli_Estado') == 0) {

                                                                    echo '<td><center><span class="label label-danger" title="Activo">Inactivo</span></center></td>';
                                                                }
                                                                ?>

                                                                <td>
                                                                    <?php if ($registro->__get('cli_Estado') == 1) { ?>

                                                                        <a  rel="tooltip" title="Editar Registro" href='ManClinica.php?usua=<?php echo $registro->__get('cli_Id'); ?>&opc=editar'
                                                                           class="btn btn-primary btn-sm glyphicon glyphicon glyphicon-pencil"></a>
                                                                        <!--Botón para deshabilitar direcatamente el registro sin preguntar-->
                                                                        <a  rel="tooltip" title="Desactivar Registro" href='InterfazClinica.php?id=<?php echo $registro->__get('cli_Id'); ?>&opc=eliminar'
                                                                           class="btn btn-warning btn-sm glyphicon glyphicon  glyphicon-edit"></a>
                                                                        <!--Botón pregunta antes de  eliminar registro -->
                                                                        <a  rel="tooltip" title="Eliminar Registro" class="delete-button btn btn-danger btn-sm glyphicon glyphicon-trash"  value="<?php echo $registro->__get('cli_Id'); ?>" id=<?php echo $registro->__get('cli_Nombre'); ?>></a>
                                                                        <!--Botón visualizar registro -->
                                                                        <a  rel="tooltip" title="Ver Registro" href='ManClinica.php?usua=<?php echo $registro->__get('cli_Id'); ?>&opc=ver'
                                                                           class="btn btn-info btn-sm glyphicon glyphicon-eye-open"  value="<?php $registro->__get('cli_Id'); ?>"></a>
                                                                           <?php
                                                                       } else {
                                                                           ?>
                                                                        <a rel="tooltip" title="Editar Registro" href='ManClinica.php?usua=<?php echo $registro->__get('cli_Id'); ?>&opc=editar'
                                                                           class="btn btn-primary btn-sm glyphicon glyphicon glyphicon-pencil"></a>
                                                                        <!--Botón para habilitar direcatamente el registro sin preguntar-->
                                                                        <a rel="tooltip" title="Activar Registro" href='InterfazClinica.php?id=<?php echo $registro->__get('cli_Id'); ?>&opc=eliminar1'
                                                                           class="btn btn-success btn-sm glyphicon glyphicon  glyphicon-edit"></a>
                                                                        <!--Botón pregunta antes de  eliminar registro -->
                                                                        <a rel="tooltip" title="Eliminar Registro" class="delete-button btn btn-danger btn-sm glyphicon glyphicon-trash"  value="<?php echo $registro->__get('cli_Id'); ?>" id=<?php echo $registro->__get('cli_Nombre'); ?>></a>
                                                                        <!--Botón visualizar registro -->
                                                                        <a rel="tooltip" title="Ver Registro" href='ManClinica.php?usua=<?php echo $registro->__get('cli_Id'); ?>&opc=ver'
                                                                           class="btn btn-info btn-sm glyphicon glyphicon-eye-open"  value="<?php $registro->__get('cli_Id'); ?>"></a>
                                                                       <?php }
                                                                       ?>
                                                                </td>
                                                            </tr>
                                                        <?php }
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
        <?php require_once("../../../Apps/Main/footer.php"); ?>
    </body>
</html>
<script type="text/javascript">

    $(".delete-button").click(function () {
        var Id = $(this).attr('value');
        var Ficha = $(this).attr('Id');
        swal({title: "¿Estás seguro, deseas eliminar este registro?",
            text: Ficha, icon: "warning",
            buttons: true,
            dangerMode: true, }).then((willDelete) => {
            if (willDelete) {
                swal({
                    title: "El registro fue eliminado!",
                    icon: "success",
                    button: "Ok", }).then((willDelete) => {
                    if (willDelete) {
                        window.location.href = "InterfazClinica.php?id=" + Id + "&opc=eliminarCompleto";
                    }
                });
            } else {
                swal("El registro no fue eliminado!", {icon: "error", });
                return false;
            }
        });
    });
</script>
