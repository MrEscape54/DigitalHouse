<?php
//------------------------------------Valida datos ingresados en form de registro-------------------------------
session_start();

function ValidarRegistro($datos, $avatar) {

  $errores = [];
  $datosValidos = false;

  //Si se hace un submit
  if($datos) {

      $nombre = trim($datos['nombre']);
      if ($nombre === '') {
        $errores['nombre'] = 'Campo obligatorio';
      }

      $email = trim($datos['email']);
      if ($email === '') {
        $errores['email'] = 'Campo obligatorio';
      }
      elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errores['email'] = "En email ingresado no es válido.";
      }
      //Verifica si ya existe un usuario registrado con ese email
      elseif (EsUsuario(TraerBaseDeUsuarios(), $email)) { 
      $errores['email'] = 'Ya existe un usuario asociado a ese email.';
      }

      $password = trim($datos['password']);
      if ($password === '') {
        $errores['password'] = 'Campo obligatorio';
      }
    
    $rePassword = trim($datos['rePassword']);

    if (($password !== '') && ($password !== $rePassword)) {
      $errores['rePassword'] = 'Las contraseñas no coinciden';
    }

    if($_FILES['avatar']['error'] == UPLOAD_ERR_OK) {
      $ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
      if (($ext == 'jpg') || ($ext == 'JPG') || ($ext == 'PNG') || ($ext == 'png') || ($ext == 'gif') || ($ext == 'GIF')){
        $avatar = '/img/fotosPerfil/' . 'user' . AgregarID() . '.' . $ext ;
      }
      else {
        $errores['avatar'] = 'El archivo no es una imagen válida (png, jpg, gif)';
      }
    }
    if (!$errores) {
      $datosValidos = true;
    }
  } //end if($datos)

  //Si los datos son válidos se crea y guarda el registro.
  if ($datosValidos) {
    GuardarDatos($datos, $avatar);
    Ingresar($datos['email']);
    header('Location: index.php');
    exit;
  }
  else {
    return $errores;
  }
} // end function

//Crea registro de nuevo usuario
function CrearUsuario($datos, $avatar) {
  $usuario = [
    'ID' => AgregarID(),
    'nombre' => $datos['nombre'],
    'email' => $datos['email'],
    'password' => password_hash($datos['password'], PASSWORD_DEFAULT),
    'avatar' => $avatar
  ];

  return  $usuario;
}

//-------------------------------------------Guarda datos de usuario en DBUsuario.json---------------------------------
function GuardarDatos($nuevoUsuario, $avatar) { 
  $usuarioJSON = json_encode(CrearUsuario($nuevoUsuario, $avatar));
  file_put_contents('DBUsuarios.json', $usuarioJSON . PHP_EOL, FILE_APPEND | LOCK_EX);
  move_uploaded_file($_FILES['avatar']['tmp_name'], dirname(__FILE__) . $avatar);
}

//-----------------------------------------Valida email y password del form ingreso-----------------------------------
function ValidarIngreso($datosIngreso) {
  $email = ''; 
  $password = '';

  if($datosIngreso) {
      $email = trim($datosIngreso['email']);
      $password = trim($datosIngreso['password']);

      $baseDeUsuarios = TraerBaseDeUsuarios();

      foreach ($baseDeUsuarios as $usuario) {
        if ($email == $usuario['email']) {
          return password_verify($password, $usuario['password']);
        }
      }
      return false;
  }
}

//Trae la base entera en formato de array asociativo.
function TraerBaseDeUsuarios() {
  $usuariosJSON = file_get_contents('DBUsuarios.json');
  $array = explode(PHP_EOL, $usuariosJSON); //Crea un elemento del array por línea. Usa como delimiter PHP_EOL
  array_pop($array); // Quita la última linea ya que esta vacía

  $arrayUsuarios = []; //contenedor

    foreach ($array as $usuario) {
        $arrayUsuarios[] = json_decode($usuario, true); //Completa $arrayUsuarios por cada índice de $array
    }
    return $arrayUsuarios;
}

//Busca el mail ingresado en la base de usuarios. Retorna verdadero si lo encuentra.
function EsUsuario($tablaUsuarios, $email) {
  foreach ($tablaUsuarios as $usuario) {
    if ($email == $usuario['email']) {
      return true;
    }
  }
  return false;
}

//Retorna ID++ del último registro de la bade de usuarios
function AgregarID() {
  $usuarios = TraerBaseDeUsuarios();
  if (empty($usuarios)) {
    return 1;
  }
  else {
    return $usuarios[count($usuarios) - 1]['ID'] + 1;
  }
}
 
function Ingresar($email) {
  $baseUsarios = TraerBaseDeUsuarios();
  foreach ($baseUsarios as $usuario) {
    if($usuario['email'] === $email) {
      $_SESSION['avatar'] = $usuario['avatar'];
    }
  }
}

function estaLogueado(){
  return isset($_SESSION['avatar']);
}
 ?>
