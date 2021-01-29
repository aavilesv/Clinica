<?php

// 	require '../seguridad/Usuario/controlador/prueba.php';
//
// 	if(empty($_GET['user_id'])){
// 		header('Location: index.php');
// 	}
//
// 	if(empty($_GET['token'])){
// 		header('Location: index.php');
// 	}
//
// 	$user_id = $this->dao->getConexion()->($_GET['user_id']);
// 	$token = $this->getConexion()->($_GET['token']);
//
// 	if(!verificaTokenPass($user_id, $token))
// 	{
// echo 'No se pudo verificar los Datos';
// exit;
// 	}
$user_id = $_GET['user_id'];
	$token =$_GET['token'];

?>

<html>
	<head>
		<title>Cambiar Password</title>

		<link rel="stylesheet" href="css/bootstrap.min.css" >
		<link rel="stylesheet" href="css/bootstrap-theme.min.css" >
		<script src="js/bootstrap.min.js" ></script>
		<!-- Bootstrap Core CSS -->
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	</head>

	<body>

		<div class="container">
		<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
		<div class="panel panel-info" >
			<div class="panel-heading">
				<div class="panel-title">Cambiar Password</div>
				<div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="index.php">Iniciar Sesi&oacute;n</a></div>
			</div>

			<div style="padding-top:30px" class="panel-body" >

				<form id="loginform" class="form-horizontal" role="form" action="../seguridad/usuario/Controlador/CtrUsuario.php" method="POST" autocomplete="off">

					<input type="hidden" id="user_id" name="user_id" value ="<?php echo $user_id; ?>" />

					<input type="hidden" id="token" name="token" value ="<?php echo $token; ?>" />

					<div class="form-group">
						<label for="password" class="col-md-3 control-label">Nuevo Password</label>
						<div class="col-md-9">
							<input type="password" class="form-control" name="password" placeholder="Password" required>
						</div>
					</div>

					<div class="form-group">
						<label for="con_password" class="col-md-3 control-label">Confirmar Password</label>
						<div class="col-md-9">
							<input type="password" class="form-control" name="con_password" placeholder="Confirmar Password" required>
						</div>
					</div>

					<div style="margin-top:10px" class="form-group">
						<div class="col-sm-12 controls">
							<button id="btn-cambiar" name="btn-cambiar" type="submit" class="btn btn-success">Modificar</a>
						</div>
					</div>
				</form>
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
