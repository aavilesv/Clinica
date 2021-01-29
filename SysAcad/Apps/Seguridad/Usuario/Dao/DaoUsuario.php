<?php
/**
* Entidad USUARIO
*/

//session_start();
require_once('../../../Conexion/DBAAbstractModel1.php');
require_once('../Modelo/EntUsuario.php');
require_once('../Modelo/EntRol.php');
require_once('../Modelo/EntModulo.php');
require_once('../Interfaz/IntUsuario.php');
class DaoUsuarioModel extends DBAAbstractModel implements IntUsuario
{
  public function __construct()
  {
    parent::__construct(); // 1ro Inicializa constructor padre
    $this->db_name = 'integrador1'; // Selecciona la BASE DATOS a trabajar
  }

  public function crearUsuario(Usuario $usuario)
  {
    try {
      if(!$this->consultarCuenta($usuario->__get('usuLogin'))){
        $sql = "Insert into segusuario
        (idLogin, usuLogin, usuClave, usuNombre, usuApellido, idRol,foto,email)
        values(null, ?, ?, ?, ?, ?, ?, ?);";
        $stmt = $this->getConexion()->prepare($sql);
        //En el caso de ocurrir un error tipo Notice una de las atenrnativas es crear variables intermedias para el paso de valor
        $stmt->bind_param('ssssiss', $usuario->__get('usuLogin'), $usuario->__get('usuClave'), $usuario->__get('usuNombre'),
        $usuario->__get('usuApellido'), $usuario->__get('idRol'), $usuario->__get('foto'),$usuario->__get('email'));
        $stmt->execute();
        if ($stmt->affected_rows) {
          return true;
        }
      }
    } catch (Exception $ex) {
      throw $ex->getMessage();
    }
    return false;
  }

  public function editarUsuario(\Usuario $usuario)
  {
    try {
      $sql="Update segusuario
      Set usuNombre = ?, usuApellido= ?, usuClave = ?, foto= ?, idRol = ?, email= ?
      Where usuLogin = ? ";
      $stmt = $this->getConexion()->prepare($sql);
      $stmt->bind_param('ssssiss', $usuario->__get('usuNombre'), $usuario->__get('usuApellido'),
      $usuario->__get('usuClave'),$usuario->__get('foto'),$usuario->__get('idRol'),$usuario->__get('email'), $usuario->__get('usuLogin'));
      $stmt->execute();
      if ($stmt->affected_rows) {
        return true;
      }
    } catch (Exception $ex) {
      throw $ex->getMessage();
    }
    return false;
  }

  public function eliminarUsuario($id)
  {
    try {
      $sql = "Delete From segusuario Where idLogin = ?";
      $stmt = $this->getConexion()->prepare($sql); //Prepara una sentencia para su ejecución y devuelve un objeto sentencia
      $stmt->bind_param('i', $id); //Agrega variables a una sentencia preparada como parámetros
      $stmt->execute();
      if ($stmt->affected_rows) {
        return true;
      }
    } catch (\Exception $ex) {
      throw $ex->getMessage();
    }

    return false;
  }

  public function __destruct()
  {
    //unset($this);
  }

  public function consultarUsuario($usuario)
  {
    $usu='';
    try {
      $sql = "Select idLogin,  usuLogin, usuClave, usuNombre, usuApellido, segrol.rolDescripcion as idRol, foto, email
      From segusuario, segrol where segusuario.idRol=segrol.idRol and usuLogin = ?" ;
      $stmt = $this->getConexion()->prepare($sql); //Prepara una sentencia para su ejecución y devuelve un objeto sentencia
      $stmt->bind_param('s', $usuario); //Agrega variables a una sentencia preparada como parámetros
      $stmt->execute();
      $rs = $stmt->get_result();
      $usuario = null;
      if ($tmp = $rs->fetch_object()) {
        $usuario = new Usuario($tmp->idLogin, $tmp->usuNombre, $tmp->usuApellido, $tmp->usuLogin, $tmp->usuClave,$tmp->idRol,$tmp->foto,$tmp->email);
      }
      return $usuario;
    } catch (\Exception $ex) {
      throw $ex->getMessage();
    }

    return $usu;
  }

  // public function consultarCuenta($usuario){
  //   try {
  //     $sql = "Select * from segusuario where usuLogin= '$usuario'";
  //     $stmt = $this->getConexion()->query($sql); //Prepara una sentencia para su ejecución y devuelve un objeto sentencia
  //     if($stmt->num_rows==1){
  //       echo json_encode(array('error'=>false));
  //     }else{
  //       echo json_encode(array('error'=>true));
  //     }
  //   } catch (\Exception $e) {
  //
  //   }
  // }

  public function consultarCuenta($usuario){
    try {
      $sql = "Select * from segusuario where usuLogin= ?";
      $stmt = $this->getConexion()->prepare($sql); //Prepara una sentencia para su ejecución y devuelve un objeto sentencia
      $stmt->bind_param('s', $usuario); //Agrega variables a una sentencia preparada como parámetros
      $stmt->execute();
      $stmt->store_result();
      $rows = $stmt->num_rows();
      if($rows>0){

        return true;

      }else{
        return false;
      }

    } catch (\Exception $e) {

    }
  }
  public function nuevoRol($rol){
    try {
      $sql = "Insert into segrol
      (idRol, rolDescripcion)
      values(null, ?);";
      $stmt = $this->getConexion()->prepare($sql);
      //En el caso de ocurrir un error tipo Notice una de las atenrnativas es crear variables intermedias para el paso de valor
      $stmt->bind_param('s', $rol);
      $stmt->execute();
      if ($stmt->affected_rows) {
        // return true;
        return $this->consultarRol($rol);
      }
    } catch (\Exception $e) {
      throw $ex->getMessage();
    }

  }
  public function consultarRol($idRoles){
    $sql = "Select idRol from segrol where rolDescripcion= ?";
    $stmt = $this->getConexion()->prepare($sql); //Prepara una sentencia para su ejecución y devuelve un objeto sentencia
    $stmt->bind_param('s', $idRoles); //Agrega variables a una sentencia preparada como parámetros
    $stmt->execute();
    $stmt->bind_result($idRol);
    $stmt->fetch();
    return $idRol;
  }

  public function consultarModulos()
  {
    $modulos = array();
    try {
      $sql = "select idModulo, modNombre, codigo, modDescripcion, modFoto, color from segmodulo";
      $stmt = $this->getConexion()->prepare($sql);
      $stmt->execute();
      $rs = $stmt->get_result();
      while (($modulo = $rs->fetch_object())) {
        $modulos[] = new Modulo($modulo->idModulo, $modulo->modNombre, $modulo->codigo, $modulo->modDescripcion, $modulo->modFoto, $modulo->color);
      }
      return $modulos;
      $rs->close();
    } catch (Exception $ex) {
      throw $ex->getMessage();
    }
    return $modulos;
  }

  public function consultarLogin($usuario,$password)
  {
    try {
      //$vGlobal=array();
      //$conec= new mysqli('localhost','')
      $sql = "Select idLogin, usuClave, idRol, usuLogin, foto from segusuario where usuLogin= '$usuario' && usuClave= '$password'";
      $stmt = $this->getConexion()->query($sql); //Prepara una sentencia para su ejecución y devuelve un objeto sentencia
      if($stmt->num_rows==1){
       $datos= $stmt->fetch_assoc();
        $this->lastSession($datos['idLogin']);
        $_SESSION['n_usuario']=$usuario;
        //$_SESSION['id_rol']=$datos['idRol'];
        $_SESSION['foto']=$datos['foto'];
        //$_SESSION['id_rol']=$datos['idRol'];
        //$datos=array($datos['idRol'],$datos['usuLogin'],$datos['usuClave']);
        //var_dum($datos);
        //$vGlobal= array($_SESSION['n_usuario'],$_SESSION['id_rol'],$_SESSION['foto']);

        echo json_encode(array('error'=>false));
        return $datos['idRol'];
        //return $vGlobal;
        //echo json_encode(array('error'=>false,'tipo'=>$datos['idRol'],'usuario'=>$datos['usuLogin'], 'clave'=>$datos['usuClave']));

      }else{
        echo json_encode(array('error'=>true));
      }

    } catch (\Exception $ex) {
      throw $ex->getMessage();
    }
  }

  // public function consultarLogin($usuario,$password)
  // {
  //     try {
  //         //$vGlobal=array();
  //         $sql = "Select idLogin, usuClave, idRol, usuLogin, foto from segusuario where usuLogin= ?";
  //         $stmt = $this->getConexion()->prepare($sql); //Prepara una sentencia para su ejecución y devuelve un objeto sentencia
  //         $stmt->bind_param('s', $usuario); //Agrega variables a una sentencia preparada como parámetros
  //         $stmt->execute();
  //         $stmt->store_result();
  //         $rows = $stmt->num_rows();
  //         if($rows>0){
  //             $stmt->bind_result($idLogin, $usuClave, $idRol, $usuLogin, $foto);
  //             $stmt->fetch();
  //             //$resultadoPass=validarPassword($usuClave, $password);
  //             if($usuClave == $password){
  //               $this->lastSession($idLogin);
  //               $_SESSION['n_usuario']=$usuario;
  //               $_SESSION['id_rol']=$idRol;
  //               $_SESSION['foto']=$foto;
  //               //echo $_SESSION['id_rol'];
  //               $vGlobal= array($_SESSION['n_usuario'],$_SESSION['id_rol'],$_SESSION['foto']);
  //               return $vGlobal;
  //               //return $_SESSION['n_usuario'];
  //               //header('Location:../../main/index.php');
  //             }else{
  //               //echo "contrasena invalida";
  //               header('Location:../../main/login.php');
  //             }
  //             //return $_SESSION['id_usuario'];
  //         }
  //
  //     } catch (\Exception $ex) {
  //         throw $ex->getMessage();
  //     }
  // }


  public function lastSession($idLogin){
    try {
      $sql = "UPDATE segusuario SET last_session=NOW(),
      token_usuClave='', usuClave_request=1 WHERE idLogin = ?";
      $stmt = $this->getConexion()->prepare($sql);
      $stmt->bind_param('i', $idLogin);
      $stmt->execute();
      $stmt->close();
    } catch (\Exception $e) {

    }

  }

  public function consultarRoles(){
    $roles = array();
    try {
      $sql = "Select idRol, rolDescripcion
      From segrol  Order By idRol";
      $stmt = $this->getConexion()->prepare($sql);
      $stmt->execute();
      $rs = $stmt->get_result();
      while (($rol = $rs->fetch_object())) {
        $roles[] = new Rol($rol->idRol, $rol->rolDescripcion);
      }
      $rs->close();
    } catch (\Exception $e) {

    }
    return $roles;
  }

  public function consultarTodosUsuarios()
  {
    $usuarios = array();
    try {
      $sql = "Select idLogin, usuLogin, usuClave, usuNombre, usuApellido, segrol.rolDescripcion as idRol, foto, email
      From segusuario, segrol where segusuario.idRol=segrol.idRol Order By idLogin";
      $stmt = $this->getConexion()->prepare($sql);
      $stmt->execute();
      $rs = $stmt->get_result();
      while (($usuario = $rs->fetch_object())) {
        $usuarios[] = new Usuario($usuario->idLogin, $usuario->usuNombre, $usuario->usuApellido, $usuario->usuLogin, $usuario->usuClave, $usuario->idRol,$usuario->foto,$usuario->email);
      }
      $rs->close();
    } catch (Exception $ex) {
      throw $ex->getMessage();
    }
    return $usuarios;
  }

  //////////////////////////////// Funciones para recuperacion de contraseña

  function isNull($nombre, $user, $pass, $pass_con, $email){
    if(strlen(trim($nombre)) < 1 || strlen(trim($user)) < 1 || strlen(trim($pass)) < 1 || strlen(trim($pass_con)) < 1 || strlen(trim($email)) < 1)
    {
      return true;
    } else {
      return false;
    }
  }
  function emailExiste($email)
  {


    $stmt = $this->getConexion()->prepare("SELECT idLogin FROM segusuario WHERE email = ? LIMIT 1");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $num = $stmt->num_rows;
    $stmt->close();
    if ($num > 0){
      return true;
    } else {
      return false;
    }
  }
  function isEmail($email)
  {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)){
      return true;
    } else {
      return false;
    }
  }

  function validaPassword($var1, $var2)
  {
    if (strcmp($var1, $var2) !== 0){
      return false;
    } else {
      return true;
    }
  }

  function minMax($min, $max, $valor){
    if(strlen(trim($valor)) < $min)
    {
      return true;
    }
    else if(strlen(trim($valor)) > $max)
    {
      return true;
    }
    else
    {
      return false;
    }
  }



  function generateToken()
  {
    $gen = md5(uniqid(mt_rand(), false));
    return $gen;
  }

  function hashPassword($password)
  {
    //$hash = password_hash($password, PASSWORD_DEFAULT);
    return $password;
  }

  function resultBlock($errors){
    if(count($errors) > 0)
    {
      echo "<div idLogin='error' class='alert alert-danger' role='alert'>
      <a href='#' onclick=\"showHide('error');\">[X]</a>
      <ul>";
      foreach($errors as $error)
      {
        echo "<li>".$error."</li>";
      }
      echo "</ul>";
      echo "</div>";
    }
  }
  function enviarEmail($email, $nombre, $asunto, $cuerpo){

    require_once '../../../../PHPMailer/PHPMailerAutoload.php';

    $mail = new PHPMailer();
    $mail->SMTPOptions = array(
      'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
      )
    );
    $mail->isSMTP();

    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls'; //Modificar
    $mail->Host = 'smtp.gmail.com'; //Modificar
    $mail->Port = 587; //Modificar

    $mail->Username = ''; //Modificar
    $mail->Password = ''; //Modificar

    $mail->setFrom('', ''); //Modificar
    $mail->addAddress($email, $nombre);

    $mail->Subject = $asunto;
    $mail->Body    = $cuerpo;
    $mail->IsHTML(true);

    if($mail->send())
    return true;
    else
    return false;
  }

  function validaIdToken($idLogin, $token){
    // global $mysqli;
    $sql="SELECT activacion FROM segusuario WHERE idLogin = ? AND token = ? LIMIT 1";
    $stmt = $this->getConexion()->prepare($sql);
    $stmt->bind_param("is", $idLogin, $token);
    $stmt->execute();
    $stmt->store_result();
    $rows = $stmt->num_rows;

    if($rows > 0) {
      $stmt->bind_result($activacion);
      $stmt->fetch();

      if($activacion == 1){
        $msg = "La cuenta ya se activo anteriormente.";
      } else {
        if($this->activarUsuario($idLogin)){
          $msg = 'Cuenta activada.';
        } else {
          $msg = 'Error al Activar Cuenta';
        }
      }
    } else {
      $msg = 'No existe el registro para activar.';
    }
    return $msg;
  }

  function activarUsuario($idLogin)
  {
    $stmt =$this->getConexion()->prepare("UPDATE usuarios SET activacion=1 WHERE idLogin = ?");
    $stmt->bind_param('s', $idLogin);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
  }

  function isNullLogin($usuario, $password){
    if(strlen(trim($usuario)) < 1 || strlen(trim($password)) < 1)
    {
      return true;
    }
    else
    {
      return false;
    }
  }


  function generaTokenPass($user_id)
  {
    $sql="UPDATE segusuario SET token_usuClave=?, usuClave_request=1 WHERE idLogin = ?";

    $token = $this->generateToken($sql);
    $stmt = $this->getConexion()->prepare($sql);
    $stmt->bind_param('ss', $token, $user_id);
    $stmt->execute();
    $stmt->close();

    return $token;
  }
  function getValor($campo, $campoWhere, $valor)
  {
    $sql="SELECT $campo FROM segusuario WHERE $campoWhere = ? LIMIT 1";
    $stmt = $this->getConexion()->prepare($sql);
    $stmt->bind_param('s', $valor);
    $stmt->execute();
    $stmt->store_result();
    $num = $stmt->num_rows;

    if ($num > 0)
    {
      $stmt->bind_result($_campo);
      $stmt->fetch();
      return $_campo;
    }
    else
    {
      return null;
    }
  }

  function getPasswordRequest($idLogin)
  {
    $sql="SELECT usuClave_request FROM segusuario WHERE idLogin = ?";
    $stmt = $this->getConexion()->prepare($sql);
    $stmt->bind_param('i', $idLogin);
    $stmt->execute();
    $stmt->bind_result($_idLogin);
    $stmt->fetch();

    if ($_idLogin == 1)
    {
      return true;
    }
    else
    {
      return null;
    }
  }

  function verificaTokenPass($user_id, $token){

    $sql="SELECT activacion FROM segusuario WHERE idLogin = ? AND token_usuClave = ? AND usuClave_request = 1 LIMIT 1";
    $stmt = $this->getConexion()->prepare($sql);
    $stmt->bind_param('is', $user_id, $token);
    $stmt->execute();
    $stmt->store_result();
    $num = $stmt->num_rows;

    if ($num > 0)
    {
      $stmt->bind_result($activacion);
      $stmt->fetch();
      if($activacion == 1)
      {
        return true;
      }
      else
      {
        return false;
      }
    }
    else
    {
      return false;
    }
  }

  function cambiaPassword($password, $user_id, $token){

    $sql="UPDATE segusuario SET usuClave = ?, token_usuClave='', usuClave_request=0 WHERE idLogin = ? AND token_usuClave = ?";
    $stmt = $this->getConexion()->prepare($sql);
    $stmt->bind_param('sis', $password, $user_id, $token);

    if($stmt->execute()){
      return true;
    } else {
      return false;
    }
  }

}#Fin de la clase modelo Usuario
