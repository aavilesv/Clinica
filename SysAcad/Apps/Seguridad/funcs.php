<?php
require_once("../Conexion/DBAAbstractModel1.php");
function isNull($nombre, $user, $pass, $pass_con, $email){
  // La longitud del string en caso de éxito, y 0 si el string esta vacío. strlen
  if(strlen(trim($nombre)) < 1 || strlen(trim($user)) < 1 || strlen(trim($pass)) < 1 || strlen(trim($pass_con)) < 1 || strlen(trim($email)) < 1)
  {
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

// function minMax($min, $max, $valor){
//   if(strlen(trim($valor)) < $min)
//   {
//     return true;
//   }
//   else if(strlen(trim($valor)) > $max)
//   {
//     return true;
//   }
//   else
//   {
//     return false;
//   }
// }

function usuarioExiste($usuario)
{
  global $mysqli;

  $stmt = $mysqli->prepare("SELECT idLogin FROM segusuario WHERE usuario = ? LIMIT 1");
  $stmt->bind_param("s", $usuario);
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

function emailExiste($email)
{
  // global $mysqli;
  $sql = "SELECT idLogin FROM segusuario WHERE email = ? LIMIT 1";
  $stmt = $this->getConexion()->prepare($sql);
  $stmt->bind_param("s", $usuario->__get('email'));
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

function generateToken()
{
  $gen = md5(uniqid(mt_rand(), false));
  return $gen;
}

function hashPassword($password)
{
  $hash = password_hash($password, PASSWORD_DEFAULT);
  return $hash;
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

// function registraUsuario($usuario, $pass_hash, $nombre, $email, $activo, $token, $tipo_usuario){
//
//   global $mysqli;
//
//   $stmt = $mysqli->prepare("INSERT INTO segusuario (usuario, password, nombre, email, activacion, token, id_tipo) VALUES(?,?,?,?,?,?,?)");
//   $stmt->bind_param('ssssisi', $usuario, $pass_hash, $nombre, $email, $activo, $token, $tipo_usuario);
//
//   if ($stmt->execute()){
//     return $mysqli->insert_id;
//     } else {
//     return 0;
//   }
// }

function enviarEmail($email, $nombre, $asunto, $cuerpo){

  require_once '../../PHPMailer/PHPMailerAutoload.php';

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

  $mail->Username = 'jorge.rivera.025@gmail.com'; //Modificar
  $mail->Password = 'DILEsialflogger.'; //Modificar

  $mail->setFrom('jorge.rivera.025@gmail.com', 'Jorge Remache'); //Modificar
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
  global $mysqli;

  $stmt = $mysqli->prepare("SELECT activacion FROM segusuario WHERE idLogin = ? AND token = ? LIMIT 1");
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
      if(activarUsuario($idLogin)){
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

// function activarUsuario($idLogin)
// {
//   global $mysqli;
//
//   $stmt = $mysqli->prepare("UPDATE segusuario SET activacion=1 WHERE idLogin = ?");
//   $stmt->bind_param('s', $idLogin);
//   $result = $stmt->execute();
//   $stmt->close();
//   return $result;
// }

// function isNullLogin($usuario, $password){
//   if(strlen(trim($usuario)) < 1 || strlen(trim($password)) < 1)
//   {
//     return true;
//   }
//   else
//   {
//     return false;
//   }
// }
//
// function login($usuario, $password)
// {
//   global $mysqli;
//
//   $stmt = $mysqli->prepare("SELECT idLogin, id_tipo, password FROM segusuario WHERE usuario = ? || email = ? LIMIT 1");
//   $stmt->bind_param("ss", $usuario, $usuario);
//   $stmt->execute();
//   $stmt->store_result();
//   $rows = $stmt->num_rows;
//
//   if($rows > 0) {
//
//     if(isActivo($usuario)){
//
//       $stmt->bind_result($idLogin, $id_tipo, $passwd);
//       $stmt->fetch();
//
//       $validaPassw = password_verify($password, $passwd);
//
//       if($validaPassw){
//
//         lastSession($idLogin);
//         $_SESSION['id_usuario'] = $idLogin;
//         $_SESSION['tipo_usuario'] = $id_tipo;
//
//         header("location: welcome.php");
//         } else {
//
//         $errors = "La contraseña es incorrecta";
//       }
//       } else {
//       $errors = 'El usuario no esta activo';
//     }
//     } else {
//     $errors = "El nombre de usuario o email electrónico no existe";
//   }
//   return $errors;
// }

// public function lastSession($idLogin)
// {
// 	global $mysqli;
//
// 	$stmt = $mysqli->prepare("UPDATE segusuario SET last_session=NOW(), token_usuClave='', usuClave_request=0 WHERE idLogin = ?");
// 	$stmt->bind_param('s', $idLogin);
// 	$stmt->execute();
// 	$stmt->close();
// }
//
// function isActivo($usuario)
// {
//   global $mysqli;
//
//   $stmt = $mysqli->prepare("SELECT activacion FROM segusuario WHERE usuario = ? || email = ? LIMIT 1");
//   $stmt->bind_param('ss', $usuario, $usuario);
//   $stmt->execute();
//   $stmt->bind_result($activacion);
//   $stmt->fetch();
//
//   if ($activacion == 1)
//   {
//     return true;
//   }
//   else
//   {
//     return false;
//   }
// }

function generaTokenPass($user_id)
{
  global $mysqli;

  $token = generateToken();

  $stmt = $mysqli->prepare("UPDATE segusuario SET token_usuClave=?, usuClave_request=1 WHERE idLogin = ?");
  $stmt->bind_param('ss', $token, $user_id);
  $stmt->execute();
  $stmt->close();

  return $token;
}

function getValor($campo, $campoWhere, $valor)
{
  global $mysqli;

  $stmt = $mysqli->prepare("SELECT $campo FROM segusuario WHERE $campoWhere = ? LIMIT 1");
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
  global $mysqli;

  $stmt = $mysqli->prepare("SELECT usuClave_request FROM segusuario WHERE idLogin = ?");
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

  global $mysqli;

  $stmt = $mysqli->prepare("SELECT activacion FROM segusuario WHERE idLogin = ? AND token_usuClave = ? AND usuClave_request = 1 LIMIT 1");
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

  global $mysqli;

  $stmt = $mysqli->prepare("UPDATE segusuario SET password = ?, token_usuClave='', usuClave_request=0 WHERE idLogin = ? AND token_usuClave = ?");
  $stmt->bind_param('sis', $password, $user_id, $token);

  if($stmt->execute()){
    return true;
    } else {
    return false;
  }
}

?>
