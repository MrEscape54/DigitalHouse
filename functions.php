<?php

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
      $usuarioJSON = json_encode($datos);
    }
  } //end if($datos)

  if ($datosValidos) {
    guardarDatos($datos);
  }
  else {
    return $errores;
  }
} // end function


function GuardarDatos($datows) {

}
function ValidarIngreso($datosIngreso) {
  $email = ''; 
  $password = '';

  if($datosIngreso) {
    $errores = [];

    if (isset($datosIngreso['email'])) {
      $email = trim($datosIngreso['email']);
      if ($email === '') {
        $errores['email'] = 'El campo es obligatorio';
        return $email;
      }     
    }

    if (isset($datosIngreso['password'])) {
      $password = trim($datosIngreso['password']);
      if ($password === '') {
        $errores['password'] = 'El campo es obligatorio';
        return $password;
      }     
    }

    if(!$errores) {
      return true;
    } 
    else {
      return false;
    }
  }
}
 ?>
