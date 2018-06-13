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
      $this->email = strtolower($email);
      $this->phone = $phone;
      $this->password = password_hash($password, PASSWORD_DEFAULT);
      $this->avatar = $avatar;
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