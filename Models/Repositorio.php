<?php 

namespace DigitalHouse\Models;

abstract class Repositorio {

   abstract static function GuardarDatos($nuevoUsuario, $avatar);
   abstract static function CrearUsuario($datos, $avatar);
   abstract static function EsUsuarioJSON($tablaDeUsuarios, $email);
   abstract static function EsUsuarioMySQL($email);
   abstract static function TraerBaseDeUsuarios();
   abstract static function AgregarID();
   abstract static function getEmail($id);
   abstract static function getName($id);

}

?>