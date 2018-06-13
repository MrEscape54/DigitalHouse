<?php 

namespace DigitalHouse\Models;

session_start();
class Autenticaciones {
 
  public static function Ingresar($email) {
    $baseUsarios = RepositorioJSON::TraerBaseDeUsuarios();

    foreach ($baseUsarios as $usuario) {
        if($usuario['email'] === strtolower($email)) {
          $_SESSION['avatar'] = $usuario['avatar'];
          $_SESSION['ID'] = $usuario['ID'];
        }
    }
  }

  public static function Salir() {
    session_destroy();
    header('Location: index.php');
    exit;
  }

  public static function estaLogueado(){
    return isset($_SESSION['avatar']);
  }
}

?>