<?php 

namespace DigitalHouse\Models;

class RepositorioJSON extends Repositorio{

   public static function GuardarDatos($nuevoUsuario, $avatar) {

    $usuarioJSON = json_encode(RepositorioJSON::CrearUsuario($nuevoUsuario, $avatar));
    file_put_contents('DBUsuarios.json', $usuarioJSON . PHP_EOL, FILE_APPEND | LOCK_EX);
    move_uploaded_file($_FILES['avatar']['tmp_name'], dirname(__FILE__, 2) . $avatar);
   }

   public static function CrearUsuario($datos, $avatar) {

    $id = RepositorioJSON::AgregarID();
    $usuario = new Usuario($id, $datos['nombre'], $datos['email'], $datos['phone'], $datos['password'], $avatar);
    
    return  $usuario->getUsuario();
   }

   public static function EsUsuario($tablaUsuarios, $email) {

      foreach ($tablaUsuarios as $usuario) {
         if ($email == $usuario['email']) {
           return true;
         }
      }
      return false;
   }

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

      $usuarios = RepositorioJSON::TraerBaseDeUsuarios();
      if (empty($usuarios)) {
         return 1;
      }
      else {
         return $usuarios[count($usuarios) - 1]['ID'] + 1;
      }
   }

   public static function getEmail($id) {

      $arrayUsuarios = RepositorioJSON::TraerBaseDeUsuarios();
      foreach ($arrayUsuarios as $usuarios){
         if($usuarios['ID'] == $id){
            return $usuarios['email'];
         };
      }
   }

   public static function getName($id) {

      $arrayUsuarios = RepositorioJSON::TraerBaseDeUsuarios();
      foreach ($arrayUsuarios as $usuarios){
         if($usuarios['ID'] == $id){
            return $usuarios['nombre'];
         }
      }
   }
} // end class

?>