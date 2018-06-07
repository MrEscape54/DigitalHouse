<?php 

namespace DigitalHouse\Models;

class Validaciones {
   
   public static function ValidarRegistro($datos, $avatar) {

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
         elseif (RepositorioJSON::EsUsuario(RepositorioJSON::TraerBaseDeUsuarios(), $email)) {
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
            if (($ext == 'jpg') || ($ext == 'JPG') || ($ext == 'PNG') || ($ext == 'png') ||
               ($ext == 'gif') || ($ext == 'GIF') || ($ext == 'jpeg') || ($ext == 'JPEG')) {
            $avatar = '/img/fotosPerfil/' . 'user' . RepositorioJSON::AgregarID() . '.' . $ext ;
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
         RepositorioJSON::GuardarDatos($datos, $avatar);
         Autenticaciones::Ingresar($datos['email']);
         header('Location: index.php');
         exit;
      }
      else {
         return $errores;
      }
   } // end function

   public static function ValidarIngreso($datosIngreso) {

      $email = '';
      $password = '';
    
      if($datosIngreso) {
          $email = trim($datosIngreso['email']);
          $password = trim($datosIngreso['password']);
    
          $baseDeUsuarios = RepositorioJSON::TraerBaseDeUsuarios();
    
          foreach ($baseDeUsuarios as $usuario) {
            if ($email == $usuario['email']) {
              return password_verify($password, $usuario['password']);
            }
          }
          return false;
      }
   }
}

?>