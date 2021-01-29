<?php require_once("../Controlador/CtrLogin.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <?php
        $rutaFoto="../";
        $ruraPerfil="../../seguridad/";
        $rut="../../";
        $ruta = "../../../";
        $u = "../../../";
        //require_once("validarsession.php");
        $_SESSION['id_modulo'] = "";
        require_once("../head.php");
        $cargarmenu = new CtrLogin();
        $crgrol = $cargarmenu->consultarrolesmodulos($_SESSION['id_rol']);
        ?>
    </head>
    <body>

        <?php
        // if(isset($_SESSION['n_usuario'])){
        //   //echo "sesion exitosa";
        // }else{
        //     header('location:login.php');
        // }
        require_once("../header.php");
        ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Módulos</h1>
                </div><!-- /.col-lg-12 -->
            </div><!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <?php
                    // echo $_SESSION['n_usuario'].'<br>';
                    // echo $_SESSION['id_rol'].'<br>';
                    // echo $_SESSION['id_modulo'].'<br>';
                    // echo $_SESSION['foto'].'<br>';
                    foreach ($crgrol as $crgrolvalue) {
                        if ($crgrolvalue != '') {
                            $cargarmenu1 = new CtrLogin();
                            $modul = $cargarmenu1->getmodulos($crgrolvalue['idModulo'], 2);
                            foreach ($modul as $modulvalue) {
                                if ($modulvalue != '') {
                                    if ($crgrolvalue['estado'] == 1 ||$crgrolvalue['estado'] == 5) {
                                        ?>
                                        <!--Div para la creacion de los botones-->
                                        <div class="col-lg-4 col-md-6">
                                            <div class="panel panel-<?php echo $modulvalue['color']; ?>">
                                                <div class="panel-heading">
                                                    <div class="row">
                                                        <div class="col-xs-6" style="height:100px">
                                                            <!--aki se edita los iconos guardados-->
                                                            <i class='<?php echo "fa " . $modulvalue['modFoto'] . " fa-5x"; ?>'   ></i>
                                                        </div>
                                                        <div class="col-xs-12 text-right">
                                                            <div class="huge"><?php echo $modulvalue['modNombre'] ?></div>
                                                            <div><?php echo $modulvalue['modDescripcion'] ?></div>
                                                            <!--<input type="hidden" name='<php echo $modulvalue['Mod_Titulo']; ?>'
                                                                   value=<php echo $modulvalue['id_moduloulo']; ?> />-->
                                                        </div>
                                                    </div>
                                                </div>
                                                <a   <?php echo "href=$ruta" . $modulvalue['codigo'] . "?id=" . $modulvalue['idModulo']; ?>>
                                                    <div class="panel-footer">
                                                        <span class="pull-left">Versdfs mas </span>
                                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                        <div class="clearfix"></div>
                                                    </div>

                                                </a>
                                            </div>
                                            
                                        </div>
                                        <?php
                                    }
                                }
                            }
                        }
                    }
                    ?>

                </div><!-- /.row -->
            </div> <!-- /#page-wrapper -->
        </div>
        <?php require_once("../footer.php"); ?>
    </body>
</html>
