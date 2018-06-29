<?php 

namespace DigitalHouse\Models;

class RepositorioJSON extends Repositorio{

   public static function GuardarDatos($nuevoUsuario, $avatar) {

    $usuario = self::CrearUsuario($nuevoUsuario, $avatar);
    $usuarioArray = $usuario->getUsuarioJSON();
    $usuarioJSON = json_encode($usuarioArray);
    file_put_contents('DBUsuarios.json', $usuarioJSON . PHP_EOL, FILE_APPEND | LOCK_EX);
    move_uploaded_file($_FILES['avatar']['tmp_name'], dirname(__FILE__, 2) . $avatar);
   }

   public static function CrearUsuario($datos, $avatar) {

    $usuario = new Usuario($datos['nombre'], $datos['email'], $datos['phone'], $datos['password'], $avatar);
    $id = self::AgregarID();
    $usuario->setID($id);
    
    return  $usuario;
   }

   public static function EsUsuarioJSON($tablaDeUsuarios, $email) {

      foreach ($tablaDeUsuarios as $usuario) {
         if ($email == $usuario['email']) {
           return true;
         }
      }
      return false;
   }

   public static function EsUsuarioMySQL($email) {}

   public static function TraerBaseDeUsuarios() {

      $usuariosJSON = file_get_contents('DBUsuarios.json');
      $array = explode(PHP_EOL, $usuariosJSON); //Crea un elemento del array por línea. Usa como delimiter PHP_EOL
      array_pop($array); // Quita la última linea ya que esta vacía

      $arrayUsuarios = []; //contenedor

      foreach ($array as $usuario) {
         $arrayUsuarios[] = json_decode($usuario, true); //Completa $arrayUsuarios por cada índice de $array
      }
      return $arrayUsuarios;
    }

   public static function AgregarID() {

      $usuarios = self::TraerBaseDeUsuarios();
      if (empty($usuarios)) {
         return 1;
      }
      else {
         return $usuarios[count($usuarios) - 1]['id'] + 1;
      }
   }

   public static function getEmail($id) {

      $arrayUsuarios = self::TraerBaseDeUsuarios();
      foreach ($arrayUsuarios as $usuarios) {
         if ($usuarios['id'] == $id) {
            return $usuarios['email'];
         };
      }
   }

   public static function getName($id) {

      $arrayUsuarios = self::TraerBaseDeUsuarios();
      foreach ($arrayUsuarios as $usuarios) {
         if ($usuarios['id'] == $id) {
            return $usuarios['nombre'];
         }
      }
   }

    public static function TraerCredenciales() {

        $usuariosJSON = file_get_contents('credenciales.json');
        $arrayUsuarios = json_decode($usuariosJSON, true);
        return $arrayUsuarios;
}

} // end class

?>