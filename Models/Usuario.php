<?php 

namespace DigitalHouse\Models;

class Usuario {

   protected $id;
   private $nombre;
   private $email;
   private $phone;
   private $password;
   private $avatar;

   public function __construct($id, $nombre, $email, $phone, $password, $avatar) {

      $this->id = $id;
      $this->nombre = $nombre;
      $this->email = $email;
      $this->phone = $phone;
      $this->password = $this->PasswordHash($password);
      $this->avatar = $avatar;
   }

   private function PasswordHash($password) {
      $password = password_hash($password, PASSWORD_DEFAULT);
      return $password;
   }

   public function getUsuario() {
      $array = [
         'ID' => $this->id,
         'nombre' => $this->nombre,
         'email' => $this->email,
         'phone' => $this->phone,
         'password' => $this->password,
         'avatar' => $this->avatar
         ];

      return $array;
   }

}


?>