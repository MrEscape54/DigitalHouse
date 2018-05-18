<?php
//------------------------------------Valida datos ingresados en form de registro-------------------------------
function ValidarRegistro($datos) {

  $nombre = '';
  $email = '';
  $password = '';
  $rePassword = '';
  $errores = [];
  $datosValidos = false;

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
      elseif (EsUsuario(TraerBaseDeUsuarios(), $email)) { 
      $errores['email'] = 'Ya existe un usuario asociado a ese email.';
      }

      $password = trim($datos['password']);
      if ($password === '') {
        $errores['password'] = 'Campo obligatorio';
      }
    
    $rePassword = trim($datos['rePassword']);

    if (($password !== '') && ($password !== $rePassword) ) {
      $errores['rePassword'] = 'Las contraseñas no coinciden';
    }

    if (!$errores) {
      $datosValidos = true;
    }
  } //end if($datos)

  if ($datosValidos) {
    guardarDatos($datos);
  }
  else {
    return $errores;
  }
} // end function

//-------------------------------------------Guarda datos de usuario en DBUsuario.json---------------------------------
function GuardarDatos($nuevoUsuario) { 
  $nuevoUsuario['password'] = password_hash($nuevoUsuario['password'], PASSWORD_DEFAULT);
  unset($nuevoUsuario['rePassword']);
  $usuarioJSON = json_encode($nuevoUsuario);

  file_put_contents('DBUsuarios.json', $usuarioJSON . PHP_EOL, FILE_APPEND | LOCK_EX);
  header('Location: index.php');

}
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

 ?>
