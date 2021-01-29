<?php
require_once("../seguridad/usuario/Controlador/CtrUsuario.php");?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
     <?php
     $rutaFoto="";
     $ruraPerfil="../seguridad/";
     $rut="../";
     $ruta = "../../";
     require_once("head.php");
     ?>
  </head>
  <body>
    <?php
    if(isset($_SESSION['n_usuario'])){
      //echo "sesion exitosa";
    }else{
        header('location:login.php');
    }
      ?>
  <?php
   /*session_start();
   $_SESSION['rutaServer']   = "localhost";
   $_SESSION['rutaProyecto'] = $_SESSION['rutaServer']."/PryClasesPOOIII/SysAcad";
   $_SESSION['rutaApps']     = $_SESSION['rutaProyecto']."/Apps";
   $_SESSION['rutaJs']       = $_SESSION['rutaProyecto']."/js";
   $_SESSION['rutaCss']      = $_SESSION['rutaProyecto']."/css";
   $_SESSION['rutaDist']     = $_SESSION['rutaProyecto']."/dist";
   $_SESSION['rutaLess']     = $_SESSION['rutaProyecto']."/less";
   $_SESSION['rutaVendor']   = $_SESSION['rutaProyecto']."/vendor";
   echo $_SESSION['rutaApps'];*/


  ?>
  <?php require_once("header.php");

  ?>
  <?php //require_once("../Seguridad/validarSesion.php");?>


  <div id="page-wrapper">
      <div class="row">
          <div class="col-lg-12">
              <h1 class="page-header">Módulos</h1>
          </div><!-- /.col-lg-12 -->
      </div><!-- /.row -->

      <div class="row">
        <!-- <?php echo $_SESSION['n_usuario'];
        echo $_SESSION['n_usuario'];
        echo $_SESSION['id_rol'];
        echo $_SESSION['foto']?> -->
        <?php foreach ($_SESSION['array'] as $value) {
            echo $value;
        } ?>

      </div><!-- /.row -->
  </div> <!-- /#page-wrapper -->
  <?php require_once("footer.php"); ?>
</body>
</html>
