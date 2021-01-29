<?php
//require_once '../Seguridad/Usuario/Controlador/prueba.php';


// if(!empty($_POST))
// {
// 	global $mysqli;
// 	$email =$this->conn->($_POST['email']);
// // $email = $mysqli->real_escape_string($_POST['email']);
// 	if (!isEmail($email)) {
// 		echo "holasdf";
// 		$_SESSION['error'] = "Debe ingresar un correo electronico valido";
// 	}
//
// 		if (emailExiste($email)) {
//
// 			$user_id = getValor('idLogin', 'email', $email);
// 			$nombre = getValor('nombre', 'email', $email);
//
//
// 			$token = generaTokenPass($user_id);
//
// 			$url = 'http://'.$_SERVER["SERVER_NAME"].':81/PryPoo%20lll/login/cambia_pass.php?user_id='.$user_id.'&token='.$token;
//
// 		$asunto = 'Recuperar Password - Sistema de Usuarios';
// 		$cuerpo = "Hola $nombre: <br /><br />Se ha solicitado un reinicio de contrase&ntilde;a. <br/><br/>Para restaurar la contrase&ntilde;a, visita la siguiente direcci&oacute;n: <a href='$url'>Cambiar Password</a>";
//
// 		if(enviarEmail($email, $nombre, $asunto, $cuerpo)){
//
// 			echo "Hemos enviado un correo electronico a las direcion $email para restablecer tu password.<br />";
// 			echo "<a href='index.php' >Iniciar Sesion</a>";
// 			exit;
// 		}else {
// 			$_SESSION['error']='Error al enviar Email';
// 		}
// 		} else {
// 		$_SESSION['error'] = "La direccion de correo electronico no existe";
// 	}
// }
//
//
//
//

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Recuperar Contraseña</title>

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

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                  <div class="panel panel-info" >
                    <div class="panel-heading">
                        <h3 align="center" class="panel-title">Recuperación de cuenta</h3>
                            <!-- <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="index.php">Iniciar Sesi&oacute;n</a></div> -->
                    </div>
					</div>

					<div style="padding-top:30px" class="panel-body" >

						<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

						<form id="loginform" class="form-horizontal" role="form" action="../seguridad/usuario/Controlador/CtrUsuario.php" method="POST" autocomplete="off">

							<div style="margin-bottom: 25px" class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								<input id="email" type="email" class="form-control" name="email" placeholder="email">
							</div>

							<div style="margin-top:10px" class="form-group">
								<div class="col-sm-12 controls">
									<button id="btn-login" name="btn-recuperar" type="submit" class="btn btn-primary">Enviar</a>
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-12 control">
									<div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
										No tiene una cuenta! <a href="registro.php">Registrate aquí</a>
									</div>
								</div>
							</div>
						</form>

					</div>
                    <!-- <div class="panel-body">

                            <fieldset>
                              <div class="form-group">
                                  <input class="form-control" id="correo" placeholder="Ingrese Correo Electrónico" name="correo" type="email" placeholder="correo@nomina.com" required autofocus>
                              </div>


                                <button type="submit" class="btn btn-primary btn-block"><span class="fa fa-envelope-o  "></span> Enviar</button>

                            </fieldset>
                        </form>
                    </div>
                    <center>
                      <p style="margin-top: -5px; font-size: 13px;">
                        <i class="fa fa-arrow-circle-left"></i>
                        <a href="login.php">Regresar</a>
                      </p>
                    </center> -->
                </div>
              </div>
            </div>
        </div>


    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    <script type="text/javascript" src="../../js/validacion.js">

    </script>
</body>

</html>
