<?php 

namespace DigitalHouse\Models;

class Usuario {

   protected $id;
   private $nombre;
   private $email;
   private $phone;
   private $password;
   private $avatar;

   public function __construct($nombre, $email, $phone, $password, $avatar) {

      $this->nombre = $nombre;
      $this->email = strtolower($email);
      $this->phone = $phone;
      $this->password = password_hash($password, PASSWORD_DEFAULT);
      $this->avatar = $avatar;
   }

   public function setID($id){
       $this->id = $id;
   }

   public function getUsuarioJSON() {
      $array = [
         'id' => $this->id,
         'nombre' => $this->nombre,
         'email' => $this->email,
         'phone' => $this->phone,
         'password' => $this->password,
         'avatar' => $this->avatar
         ];

      return $array;
   }

    public function getUsuarioMySQL() {
        $array = [
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