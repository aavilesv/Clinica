<?php
session_start();
// sleep(1);
if(isset($_POST['btn-recuperar'])){
  if(!empty($_POST['email'])){
    $email =new CtrUsuario();
    $email->RecuperarPassword($_POST['email']);
  }else{
    $email=new CtrUsuario();
    $email->RecuperarPassword($_POST['email']);
    // echo "Ingrese un email";
  }
}

if(isset($_POST['btn-cambiar'])){
  $guardar=new CtrUsuario();
  $guardar->guardaPass($_POST['user_id'],$_POST['token'],$_POST['password'],$_POST['con_password']);
}else {
  // echo "no guarda .....";
}

$usua =isset($_POST['usuario'])?$_POST['usuario']:'';
$pass =isset($_POST['password'])?$_POST['password']:'';
if($usua!=='' && $pass!=''){
  $login=new CtrUsuario();
  $_SESSION['id_rol']=$login->getLogin($usua,$pass);
  $modulosR=$login->getModulos();
  $_SESSION['array']=array();
  $con='0';
  foreach ($modulosR as $modulo) {
    if($_SESSION['id_rol']=='1'){
      $mod='<div class="col-lg-3 col-md-6">
      <div class="panel panel-'.$modulo->__get('color').'">
      <div class="panel-heading">
      <div class="row">
      <div class="col-xs-6" style="height:60px">
      <i class="fa '.$modulo->__get('modFoto').' fa-5x"></i>
      </div>
      <div class="col-xs-9 text-right">
      <div class="huge">'.$modulo->__get('modNombre').'</div>
      <div>'.$modulo->__get('modDescripcion').'</div>
      </div>
      </div>
      </div>


      <a href="'.$modulo->__get('codigo').'">
      <div class="panel-footer">
      <span class="pull-left">View Details</span>
      <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
      <div class="clearfix"></div>
      </div>
      </a>
      </div>
      </div>';
      $_SESSION['array'][]=$mod;
      $retorn[1]="";
      $con='1';
    }elseif($con=='2'){
      // $_SESSION['array'][]=$modulo->__get('codigo');
      $mod='<div class="col-lg-3 col-md-6">
      <div class="panel panel-'.$modulo->__get('color').'">
      <div class="panel-heading">
      <div class="row">
      <div class="col-xs-6" style="height:60px">
      <i class="fa '.$modulo->__get('modFoto').' fa-5x"></i>
      </div>
      <div class="col-xs-9 text-right">
      <div class="huge">'.$modulo->__get('modNombre').'</div>
      <div>'.$modulo->__get('modDescripcion').'</div>
      </div>
      </div>
      </div>

      <a href="'.$modulo->__get('codigo').'">
      <div class="panel-footer">
      <span class="pull-left">View Details</span>
      <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
      <div class="clearfix"></div>
      </div>
      </a>
      </div>
      </div>';
      $_SESSION['array'][]=$mod;
    }
    $con='2';
  }
}

// if(isset($_POST['logins'])){
//   if($_POST['usuario']!="" && $_POST['password']!=""){
//     $login=new CtrUsuario();
//     //$last_session=new DaoUsuarioModel();
//     if($login->getCuenta($_POST['usuario'])){
//       $retorn=$login->getLogin($_POST['usuario'],$_POST['password']);
//       $_SESSION['n_usuario']=$retorn[0];
//       $_SESSION['id_rol']=$retorn[1];
//       $_SESSION['foto']=$retorn[2];
//       $modulosR=$login->getModulos();
//       $_SESSION['array']=array();
//       $con='0';
//
//       echo '<br>';
//       foreach ($modulosR as $modulo) {
//         if($retorn[1]=='1'){
//           $mod='<div class="col-lg-3 col-md-6">
//           <div class="panel panel-'.$modulo->__get('color').'">
//           <div class="panel-heading">
//           <div class="row">
//           <div class="col-xs-6" style="height:60px">
//           <i class="fa '.$modulo->__get('modFoto').' fa-5x"></i>
//           </div>
//           <div class="col-xs-9 text-right">
//           <div class="huge">'.$modulo->__get('modNombre').'</div>
//           <div>'.$modulo->__get('modDescripcion').'</div>
//           </div>
//           </div>
//           </div>
//
//           <a href="'.$modulo->__get('codigo').'">
//           <div class="panel-footer">
//           <span class="pull-left">View Details</span>
//           <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
//           <div class="clearfix"></div>
//           </div>
//           </a>
//           </div>
//           </div>';
//           $_SESSION['array'][]=$mod;
//           $retorn[1]="";
//           $con='1';
//         }elseif($con=='2'){
//           // $_SESSION['array'][]=$modulo->__get('codigo');
//           $mod='<div class="col-lg-3 col-md-6">
//           <div class="panel panel-'.$modulo->__get('color').'">
//           <div class="panel-heading">
//           <div class="row">
//           <div class="col-xs-6" style="height:60px">
//           <i class="fa '.$modulo->__get('modFoto').' fa-5x"></i>
//           </div>
//           <div class="col-xs-9 text-right">
//           <div class="huge">'.$modulo->__get('modNombre').'</div>
//           <div>'.$modulo->__get('modDescripcion').'</div>
//           </div>
//           </div>
//           </div>
//
//           <a href="'.$modulo->__get('codigo').'">
//           <div class="panel-footer">
//           <span class="pull-left">View Details</span>
//           <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
//           <div class="clearfix"></div>
//           </div>
//           </a>
//           </div>
//           </div>';
//           $_SESSION['array'][]=$mod;
//         }
//         $con='2';
//       }
//       if(isset($_SESSION['n_usuario'])){
//         header('Location:../../../main/index.php');
//       }else{
//         header('Location:../../../main/login.php');
//       }
//     }else{
//       header("Location:../../../main/login.php");
//     }
//   }else{
//     header("Location:../../../main/login.php");
//   }
// }
class CtrUsuario
{

  private $modelo;
  private $dao;

  public function __construct()
  {
    require_once("../Dao/DaoUsuario.php");
    require_once("../Modelo/EntUsuario.php");
    require_once("../Modelo/EntRol.php");
    $this->dao = new DaoUsuarioModel();
    $this->modelo = new Usuario();
    //$this->rol= new Rol();
  }

  public function getUsuarios()
  {
    $this->dao = new DaoUsuarioModel();
    return $this->dao->consultarTodosUsuarios();
  }

  public function getRoles()
  {
    $this->dao = new DaoUsuarioModel();
    return $this->dao->consultarRoles();
  }

  public function getModulos(){
    $this->dao = new DaoUsuarioModel();
    return $this->dao->consultarModulos();
  }

  public function getUsuario($usuario)
  {
    $this->dao = new DaoUsuarioModel();
    return $this->dao->consultarUsuario($usuario);
  }

  public function getCuenta($usuario)
  {
    $this->dao = new DaoUsuarioModel();
    return $this->dao->consultarCuenta($usuario);
  }

  public function getLogin($usuario,$password)
  {
    $this->dao = new DaoUsuarioModel();
    return $this->dao->consultarLogin($usuario,$password);
  }

  public function RecuperarPassword($email){
    $errors = array();
    if(!empty($_POST))
    {
      $this->dao = new DaoUsuarioModel();
      if (!$this->dao->isEmail($email)) {
        echo "?????";
        $errors[] = "Debe ingresar un correo electronico valido";
      }
      if ($this->dao->emailExiste($email)) {

        $user_id = $this->dao->getValor('idLogin', 'email', $email);
        $token = $this->dao->generaTokenPass($user_id);
        $nombre = $this->dao->getValor('usuNombre', 'email', $email);

        $url = 'http://'.$_SERVER["SERVER_NAME"].':81/PryPoo%20lll/POO%20modifica/SysAcad/Apps/Main/cambia_pass.php?user_id='.$user_id.'&token='.$token;

        $asunto = 'Recuperar Password - Sistema de Usuarios';
        $cuerpo = "Hola $nombre: <br /><br />Se ha solicitado un reinicio de contrase&ntilde;a. <br/><br/>Para restaurar la contrase&ntilde;a, visita la siguiente direcci&oacute;n: <a href='$url'>Cambiar Password</a>";
        echo "paso";
        if($this->dao->enviarEmail($email, $nombre, $asunto, $cuerpo)){

          echo "Hemos enviado un correo electronico a las direcion $email para restablecer tu password.<br />";
          echo "<a href='../../../Main/login.php' >Iniciar Sesion</a>";
          exit;
        }else {
          $_SESSION['error']='Error al enviar Email';
        }
      } else {
        $_SESSION['error'] = "La direccion de correo electronico no existe";
      }
    }
  }
  public function guardaPass($user_id,$token,$password,$con_password){
    $this->dao = new DaoUsuarioModel();
    if($this->dao->validaPassword($password, $con_password)){
      $pass_hash = $this->dao->hashPassword($password);
      if($this->dao->cambiaPassword($pass_hash, $user_id, $token)){
        echo "Contrase&ntilde;a Modificada <br> <a href='../../../main/index.php' >Iniciar Sesion</a>";
      } else {
        echo "Error al modificar contrase&ntilde;a";
      }
    } else {
      echo 'Las contraseñas no coinciden';
    }
  }
  public function cambiarPass($password){

    $this->dao = new DaoUsuarioModel();
    if(empty($_GET['user_id'])){
      header('Location: ../../../Main/login.php');
    }

    if(empty($_GET['token'])){
      header('Location: ../../../Main/login.php');
    }
    $user_id = $mysqli->real_escape_string($_GET['user_id']);
    $token = $mysqli->real_escape_string($_GET['token']);
    if(!verificaTokenPass($user_id, $token))
    {
      echo 'No se pudo verificar los Datos';
      exit;
    }
  }
  public function ingreso($usuario){

    $usuarioDaoModel = new DaoUsuarioModel();
    $usuarioDaoModel->consultarLogin($usuario, $clave);
    if($usuarioDaoModel){
      header("Location:../../main/index.php");
    }
  }
  public function nuevo()
  {
    //$nuevoUsuario = new Usuario($_REQUEST['id'], $_REQUEST['nombre'], $_REQUEST['apellido'], $_REQUEST['usuario'], $_REQUEST['clave']);
    switch($_REQUEST['especialidad']){
      case "Administrador":
      $idRol=1;
      break;
      case "Odontologo":
      $idRol=2;
      break;
      case "Ginecologo":
      $idRol=3;
      break;
      case "Pediatra":
      $idRol=4;
      break;
      default:

      $this->dao = new DaoUsuarioModel();
      //$idRol=$this->dao->nuevoRol($this->rol);
      $idRol=$this->dao->nuevoRol($_REQUEST['especialidad']);

    }
    //echo $idRol;
    if($_FILES["foto"]["name"]==""){
      $destino="../../../../fotos/usuario.png";
    }else{
      $foto=$_FILES["foto"]["name"];
      $ruta=$_FILES["foto"]["tmp_name"];
      $destino="../../../../fotos/".$foto;
      copy($ruta, $destino);
    }
    echo $destino;
    $this->modelo = new Usuario();
    $this->modelo->__set('usuNombre', $_REQUEST['nombre']);
    $this->modelo->__set('usuApellido', $_REQUEST['apellido']);
    $this->modelo->__set('email', $_REQUEST['email']);
    $this->modelo->__set('usuLogin', $_REQUEST['usuario']);
    $this->modelo->__set('usuClave', $_REQUEST['password1']);
    $this->modelo->__set('idRol', $idRol);
    $this->modelo->__set('foto', $destino);
    //echo $destino;
    //$this->dao = new DaoUsuarioModel();
    $this->dao->crearUsuario($this->modelo);
    header("Location:../../../Seguridad/Usuario/Vista/ListarUsuarios.php");
  }


  public function editar()
  {
    switch($_REQUEST['especialidad']){
      case "Administrador":
      $idRol=1;
      break;
      case "Odontologo":
      $idRol=2;
      break;
      case "Ginecologo":
      $idRol=3;
      break;
      case "Pediatra":
      $idRol=4;
      break;
      default:
      $this->dao = new DaoUsuarioModel();
      $idRol=$this->dao->nuevoRol($_REQUEST['especialidad']);

    }
    //$nuevoUsuario = new Usuario($_REQUEST['id'], $_REQUEST['nombre'], $_REQUEST['apellido'], $_REQUEST['usuario'], $_REQUEST['clave']);

    if($_FILES["foto"]["name"]==""){
      $destino=$_REQUEST['fotoR'];
    }else{
      $foto=$_FILES["foto"]["name"];
      $ruta=$_FILES["foto"]["tmp_name"];
      $destino="../../../../fotos/".$foto;
      copy($ruta, $destino);
    }

    //echo $foto;

    $this->modelo = new Usuario();
    //$this->modelo->__set('idLogin', $_REQUEST['idLogin']);
    $this->modelo->__set('usuNombre', $_REQUEST['nombre']);
    $this->modelo->__set('usuApellido', $_REQUEST['apellido']);
    $this->modelo->__set('email', $_REQUEST['email']);
    $this->modelo->__set('usuLogin', $_REQUEST['usuario']);
    $this->modelo->__set('usuClave', $_REQUEST['password1']);
    $this->modelo->__set('idRol', $idRol);
    $this->modelo->__set('foto', $destino);

    $this->dao = new DaoUsuarioModel();
    $this->dao->editarUsuario($this->modelo);
    echo $_REQUEST['obc'];
    if($_REQUEST['obc']=='si'){
      header("Location:../../../main/index.php");
    }else{
      header("Location:../Vista/ListarUsuarios.php");
    }

  }

  public function eliminar($IdUsuario)
  {
    $this->dao = new DaoUsuarioModel();
    $this->dao->eliminarUsuario($IdUsuario);
    header("Location:../Vista/ListarUsuarios.php");
  }




  // require_once("../Seguridad/Usuario/Controlador/prueba.php");
  // require_once("../seguridad/usuario/Controlador/CtrUsuario.php");
  // require_once("../Seguridad/Usuario/Controlador/prueba.php");

  //$_SESSION['error'] = array();

  // empty — Determina si una variable está vacía

}

?>
