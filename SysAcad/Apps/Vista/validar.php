<?php
require_once('../Controlador/CtrLogin.php');
// $usua = $_POST['usuario'];
// $pass = $_POST['password'];
$usua =isset($_POST['usuario'])?$_POST['usuario']:'';
$pass =isset($_POST['password'])?$_POST['password']:'';
$usuario = new CtrLogin();
if($usua!=='' && $pass!=''){

  if($usuario->getLogin($usua, $pass)){
    // header('location:prueba.php');
    // $idusuario = $usuario->obtenerid($usua, $pass);
    // $_SESSION['n_usuario'] = $usua; //tratar de poner codigo para sacar id
    // foreach ($idusuario as $value) {
    //   if ($value != '') {
    //     $_SESSION['id_login'] = $value['idLogin'];
    //     $_SESSION['id_rol'] = $value['idRol'];
    //     $_SESSION['foto'] = $value['foto'];
    //     $_SESSION['Idmodulo'] = "";
    //   }
    // }

    // echo true;
  }else {
    // echo false;
    echo json_encode(array('error'=>true));
  }
  // echo json_encode(array('error'=>false));
  // header('location:prueba.php');
}else{
  echo json_encode(array('error'=>true));

}
?>
