<?php //session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Bootstrap Admin Theme</title>

  <!-- Bootstrap Core CSS -->
  <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- MetisMenu CSS -->
  <link href="../../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="../../dist/css/sb-admin-2.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="../../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style media="screen">
  .error{
    background-color: #E74F4F;
    position: absolute;
    top: 0;
    padding: 10px 0 ;
    border-radius:  0 0 5px 5px;
    color: #fff;
    width: 100%;
    text-align: center;
    display: none;
  }
</style>
</head>

<body>

  <div class="error">
    <span>Datos de ingreso no válidos, inténtelo de nuevo  por favor</span>
  </div>
  <?php ?>

  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Please Sign In</h3>
          </div>
          <div class="panel-body">
            <!-- <form role="form" id="formLg" method="post" action="../Seguridad/Usuario/Controlador/CtrUsuario.php"> -->
            <form  id="formLg" action="">
              <fieldset>
                <div class="form-group">
                  <input class="form-control" placeholder="usuario" name="usuario" type="text" autofocus>
                  <small class="text-muted" id="usuario_help">Ingrese un usuario</small>
                </div>
                <div class="form-group">
                  <input class="form-control" placeholder="Password" name="password" type="password" value="">
                  <small class="text-muted" id="password_help">Ingrese un password</small>
                </div>
                <div class="checkbox">
                  <label>
                    <input name="remember" type="checkbox" value="Remember Me">Remember Me
                  </label>
                </div>
                <!-- Change this to a button or input when using this as a form -->
                <input type="submit" class="btnlogin btn btn-lg btn-success btn-block" id="btn-login" name="login" value="Iniciar Sesion">
                <br><div class="row-fluid text-center">
                  <div id='loading' hidden="" >
                    <img src="../../img/loading.gif" >
                  </div>
                </div>
              </fieldset>
            </form>
            <?php //echo resultBlock($errors); ?>
          </div>
          <center>
            <a class="margin-top: -5px; font-size: 12px;" href='registro.php?usuario=0&opc=nuevo' role="button" align="right">
              <i class="glyphicon glyphicon-plus-sign"> </i>
              Nuevo Usuario
            </a><br>
            <a class="margin-top: -5px; font-size: 12px;" href='recupera.php' role="button" align="right">
              <i class="fa fa-lock"> </i>
              Olvidaste tu Contraseña
            </a>
            <!-- <p style="margin-top: -5px; font-size: 12px;">
            <i class="glyphicon glyphicon-edit"></i>
            <a href="registro.php">Registrarse</a>
          </p> -->
        </center>
        <br>
      </div>
    </div>
  </div>
</div>
<script src="../../js/val.js"></script>
<!-- jQuery -->
<script src="../../vendor/jquery/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../../vendor/metisMenu/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../../dist/js/sb-admin-2.js"></script>

<script src="../../js/main.js"></script>


</body>

</html>
