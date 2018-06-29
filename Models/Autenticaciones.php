<?php 

namespace DigitalHouse\Models;

session_start();

class Autenticaciones {
 
  /* public static function Ingresar($email) {
    $baseUsarios = RepositorioJSON::TraerBaseDeUsuarios();

    foreach ($baseUsarios as $usuario) {
        if($usuario['email'] === strtolower($email)) {
          $_SESSION['avatar'] = $usuario['avatar'];
          $_SESSION['ID'] = $usuario['ID'];
          setcookie('ID', $_SESSION['ID'], time() + 60*60*24*30); //preguntar
        }
    }
  } */

  public static function Ingresar($email) {
      $id = RepositorioMySQL::getID($email);
      $_SESSION['id'] = $id;
      $_SESSION['avatar'] = RepositorioMySQL::getAvatar($id);
      setcookie('id', $_SESSION['id'], time() + 60*60*24*30);
  }

  public static function Salir() {
    session_destroy();
    header('Location: index.php');
    exit;
  }

  public static function estaLogueado(){
    return isset($_SESSION['id']);
  }
}