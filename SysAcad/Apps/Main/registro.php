<?php// require_once("../Seguridad/Controlador/CtrUsuario.php");   ?><!DOCTYPE html>
<html lang="en">

<head>
  <?php $rutaValidacion="../../" ?>
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

  <?php


  // $a=new CtrUsuario();
  // $a->getUsuario();

  ?>
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
  <div class="container">
    <div class="row">
      <div class="col-md-5 col-md-offset-4">
        <div class="login-panel panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Usuario Nuevo</h3>
          </div>
          <div class="panel-body">
            <form role="form" action="../Seguridad/usuario/vista/InterfazUsuario.php" method="post" id="frmregister" enctype="multipart/form-data">
            
              <fieldset>
                <div class="form-group">
                  <input class="form-control" id="usuario" placeholder="Ingrese Usuario" name="usuario" type="text" autofocus>
                </div>
                <div class="form-group">
                  <input class="form-control" id="foto" placeholder="Agregue una foto"  name="foto" type="file" autofocus>
                </div>

                <div class="form-group">
                  <input class="form-control" id="nombre" placeholder="Ingrese Nombre" name="nombre" type="text" autofocus>
                </div>
                <div class="form-group">
                  <input class="form-control" id="apellido" placeholder="Ingrese Apellido" name="apellido" type="text" autofocus>
                </div>
                <div class="form-group">
                  <input class="form-control" id="email" placeholder="Ingrese un email" name="email" type="email" autofocus>
                </div>
                <div class="form-group">
                  <input class="form-control" list="especialidades" name="especialidad" id="especialidad" placeholder="Especialidad">
                  <datalist id="especialidades">
                    <option value="Odontologo">
                      <option value="Ginecologo">
                        <option value="Pediatra">

                        </datalist>
                        <!-- <select class="" name="">
                        <option value="">Hola como estas</option>
                      </select> -->
                    </div>
                    <div class="form-group">
                      <input class="form-control" id="password1" placeholder="Ingrese Password" name="password1" type="password" value="">
                    </div>
                    <div class="form-group">
                      <input class="form-control" id="password2" placeholder="Repita Password" name="password2" type="password" value="">
                    </div>
                    <div class="checkbox">
                      <label>
                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                      </label>
                    </div>
                    <!-- Change this to a button or input when using this as a form -->
                    <button type="submit" class=" btn btn-primary "><span class="glyphicon glyphicon-floppy-disk"></span> Registrarse</button>
                    <!-- <a href="index.php" class="btn btn-lg btn-success btn-block">Registrarse</a> -->
                  </fieldset>
                </form>
              </div>
              <center>
                <p style="margin-top: -5px; font-size: 12px;">
                  <i class="glyphicon glyphicon-check"></i>
                  <a href="login.php">Ya tengo cuenta</a>

                </p>


              </center>
            </div>
          </div>
        </div>
      </div>





      <!-- jQuery -->
      <script src="../../vendor/jquery/jquery.min.js"></script>

      <!-- Bootstrap Core JavaScript -->
      <script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>

      <!-- Metis Menu Plugin JavaScript -->
      <script src="../../vendor/metisMenu/metisMenu.min.js"></script>

      <!-- Custom Theme JavaScript -->
      <script src="../../dist/js/sb-admin-2.js"></script>
      <script type="text/javascript" src="../../js/validacion.js"></script>

    </body>

    </html>
