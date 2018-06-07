<?php 

namespace DigitalHouse\Models;

class Usuario {

   private $nombre;
   private $email;
   private $password;
   private $avatar;

   public function __construct($nombre, $email, $password, $avatar) {

      $this->nombre = $nombre;
      $this->email = $email;
      $this->password = $this->PasswordHash($password);
      $this->avatar = $avatar;
   }

   private function PasswordHash($password) {
      $this->password = password_hash($password, PASSWORD_DEFAULT);
   }

}


?>