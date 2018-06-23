
<!--  namespace DigitalHouse\Models;

use PDO;
use DigitalHouse\Models\Usuario;

class RepositorioMySQL extends Repositorio 
{
   protected $host;
   protected $dbName;
   protected $dbUser;
   protected $dbPass; 
   protected $db;

   public function __construct() {

      $this->host = '127.0.0.1';
      $this->dbName = 'ddl';
      $this->dbUser = 'root';
      $this->dbPass = 'root';

   }

   abstract static function GuardarDatos($nuevoUsuario, $avatar);
   abstract static function CrearUsuario($datos, $avatar);
   abstract static function EsUsuario($tablaUsuarios, $email);
   abstract static function TraerBaseDeUsuarios();
   abstract static function AgregarID();
   abstract static function getEmail($id);
   abstract static function getName($id);
}  -->

