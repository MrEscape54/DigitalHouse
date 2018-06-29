<?php

namespace DigitalHouse\Models;

use PDO;

class RepositorioMySQL extends Repositorio
{
    protected $host;
    protected $dbName;
    protected $dbUser;
    protected $dbPass;
    protected $db;

    public function __construct()
    {
        $this->host = '127.0.0.1';
        $this->dbName = 'ddl';
        $credenciales = RepositorioJSON::TraerCredenciales();
        $this->dbUser = $credenciales['user'];
        $this->dbPass = $credenciales['pass'];

        $this->db = new PDO(
            "mysql:host=$this->host;dbname=$this->dbName",
            $this->dbUser,
            $this->dbPass,
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    }

    public static function CrearUsuario($datos, $avatar) {
        $usuario = new Usuario($datos['nombre'], $datos['email'], $datos['phone'], $datos['password'], $avatar);
        return $usuario;
    }

    public static function GuardarDatos($nuevoUsuario, $avatar) {
        $usuario = self::CrearUsuario($nuevoUsuario, $avatar);
        $usuarioArray = $usuario->getUsuarioMySQL();
        $nombre = $usuarioArray['nombre'];
        $email = $usuarioArray['email'];
        $pass = $usuarioArray['password'];
        $phone = $usuarioArray['phone'];
        move_uploaded_file($_FILES['avatar']['tmp_name'], $avatar);
        $db = new RepositorioMySQL();
        $conexion = $db->db;
        $query = $conexion->prepare("INSERT INTO usuarios (nombre, email, pass, phone, avatar)
          VALUES ('$nombre', '$email', '$pass', '$phone', '$avatar')");
        $query->execute();
    }

    public static function EsUsuarioJSON($tablaDeUsuarios, $email) {}

    public static function EsUsuarioMySQL($email) {
        $db = new RepositorioMySQL();
        $conexion = $db->db;
        $query = $conexion->prepare("SELECT email FROM usuarios WHERE email = '$email'");
        $query->execute();
        $userEmail = $query->fetch(PDO::FETCH_ASSOC);
        if (!$userEmail) {
            return False;
        } else {
            return True;
        }
    }

    public static function TraerBaseDeUsuarios() {
        $db = new RepositorioMySQL();
        $conexion = $db->db;
        $query = $conexion->prepare("SELECT * FROM usuarios");
        $query->execute();
        $usuariosBD = $query->fetchAll(PDO::FETCH_ASSOC); // VERIFICAR SI FUNCIONA DEBIDAMENTE
        return $usuariosBD;
    }

    public static function AgregarID() {}

    public static function getEmail($id) {
        $db = new RepositorioMySQL();
        $conexion = $db->db;
        $query = $conexion->prepare("SELECT email FROM usuarios WHERE id = $id");
        $query->execute();
        $email = $query->fetch(PDO::FETCH_ASSOC);
        return $email['email'];
    }

    public static function getName($id) {
        $db = new RepositorioMySQL();
        $conexion = $db->db;
        $query = $conexion->prepare("SELECT nombre FROM usuarios WHERE id = $id");
        $query->execute();
        $nombre = $query->fetch(PDO::FETCH_ASSOC);
        return $nombre['nombre'];
    }

    public static function getID($email) {
        $db = new RepositorioMySQL();
        $conexion = $db->db;
        $query = $conexion->prepare("SELECT id FROM usuarios WHERE email = '$email'");
        $query->execute();
        $id = $query->fetch(PDO::FETCH_ASSOC);
        return $id['id'];
    }

    public static function getPass($id) {
        $db = new RepositorioMySQL();
        $conexion = $db->db;
        $query = $conexion->prepare("SELECT pass FROM usuarios WHERE id = $id");
        $query->execute();
        $pass = $query->fetch(PDO::FETCH_ASSOC);
        return $pass['pass']; // DEVUELVE EL HASH DEL PASSWORD
    }

    public static function getPhone($id) {
        $db = new RepositorioMySQL();
        $conexion = $db->db;
        $query = $conexion->prepare("SELECT phone FROM usuarios WHERE id = $id");
        $query->execute();
        $phone = $query->fetch(PDO::FETCH_ASSOC);
        return $phone['phone'];
    }

    public static function getAvatar($id) {
        $db = new RepositorioMySQL();
        $conexion = $db->db;
        $query = $conexion->prepare("SELECT avatar FROM usuarios WHERE id = $id");
        $query->execute();
        $avatar = $query->fetch(PDO::FETCH_ASSOC);
        return $avatar['avatar'];
    }

    public static function getLastID() { //TRAE EL MAXIMO ID
        $db = new RepositorioMySQL();
        $conexion = $db->db;
        $query = $conexion->prepare("SELECT MAX(id) FROM usuarios");
        $query->execute();
        $maxID = $query->fetch(PDO::FETCH_ASSOC);
        return $maxID['$maxID'];
    }

    public static function setName($id, $nombre){
        $db = new RepositorioMySQL();
        $conexion = $db->db;
        $query = $conexion->prepare("UPDATE usuarios SET nombre = $nombre WHERE id = $id");
        $query->execute();
    }
    public static function setEmail($id, $email){
        $db = new RepositorioMySQL();
        $conexion = $db->db;
        $query = $conexion->prepare("UPDATE usuarios SET email = $email WHERE id = $id");
        $query->execute();
    }
    public static function setPass($id, $pass){
        $db = new RepositorioMySQL();
        $conexion = $db->db;
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $query = $conexion->prepare("UPDATE usuarios SET pass = $pass WHERE id = $id");
        $query->execute();
    }
    public static function setPhone($id, $phone){
        $db = new RepositorioMySQL();
        $conexion = $db->db;
        $query = $conexion->prepare("UPDATE usuarios SET phone = $phone WHERE id = $id");
        $query->execute();
    }
    public static function setAvatar($id, $avatar){
        $db = new RepositorioMySQL();
        $conexion = $db->db;
        $query = $conexion->prepare("UPDATE usuarios SET avatar = $avatar WHERE id = $id");
        $query->execute();
    }

}