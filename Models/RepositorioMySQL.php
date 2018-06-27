<?php

namespace DigitalHouse\Models;

use PDO;

class RepositorioMySQL extends Repositorio
{
    /* protected */ private $host;
    /* protected */ private $dbName;
    /* protected */ private $dbUser;
    /* protected */ private $dbPass;
    /* protected */ private $db;

    public function __construct()
    {

        $this->host = '127.0.0.1';
        $this->dbName = 'ddl';
        $credenciales = RepositorioJSON::TraerCredenciales();
        $user = '';
        $pass = '';
        foreach ($credenciales as $value) {
            if ($value = 'user') {
                $user = $value;
            } else if ($credenciales = 'pass') {
                $pass = $value;
            }
        }
        $this->dbUser = $user;
        $this->dbPass = $pass;

        $this->db = new PDO(
            "mysql:host=$this->host;dbName=$this->dbName",
            $this->dbUser,
            $this->dbPass,
            [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );

    }

    /*
     public function getHost(){
        return $this->host;
    }
    public function getdbName(){
        return $this->dbName;
    }
    public function getdbUser(){
        return $this->dbUser;
    }
    public function getdbPass(){
        return $this->dbPass;
    }
    public function getDB(){
        return $this->db;
    }
    */

    public function ConexionBD() {
        /*
        $host = $this->getHost();
        $dbName = $this->getdbName();
        $dbUser = $this->getdbUser();
        $dbPass = $this->getdbUser();
        */

        // $host = $this->host;

        $db = new PDO("mysql:host=$host;dbName=$dbName", $dbUser, $dbPass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        //SOMETHING IS WRONG JACK
        //CANT SLEF:: A UN METODO DINAMICO
        //CANT $THIS-> A UN METODO STATIC DENTRO DE UN MEOTODO STATIC... ?!?!?!?!
        //FUCKING KYS
        return $db;
    }

    public static function CrearUsuario($datos, $avatar) {
        $usuario = new Usuario($datos['nombre'], $datos['email'], $datos['phone'], $datos['password'], $avatar);
        //ERROR FALTA PAREMETRO ID !?!?!?!
        // El parametro ID era obligatorio para hacer un usuario con base de datos en JSON. Y CON MYSQL ?!?!?
        return $usuario;
    }

    public static function GuardarDatos($nuevoUsuario, $avatar) {
        $usuario = self::CrearUsuario($nuevoUsuario, $avatar);
        $usuarioArray = $usuario->getUsuario();
        $id = $usuarioArray['id'];
        $nombre = $usuarioArray['nombre'];
        $email = $usuarioArray['email'];
        $pass = $usuarioArray['pass'];
        $phone = $usuarioArray['phone'];
        $db = // establecer conexion
        $db->query("INSERT INTO usuarios (id, nombre, email, pass, phone = null, avatar)
          VALUES ('$id', '$nombre', '$email', '$pass', '$phone', '$avatar')");
    }

    public static function EsUsuarioMySQL($email) {
        $db = // establecer conexion
        $query = $db->prepare("SELECT email FROM usuarios WHERE email = $email");
        $query->execute();
        $userEmail = $query->fetchAll(PDO::FETCH_ASSOC);
        if ($email = $userEmail) {
            return True;
        } else if ($email != $userEmail) {
            return False;
        }
    }

    public static function EsUsuarioJSON($tablaDeUsuarios, $email) {}

    public static function TraerBaseDeUsuarios() {
        $db = // establecer conexion
        $query = $db->prepare("SELECT * FROM usuarios");
        $query->execute();
        $usuariosBD = $query->fetchAll(PDO::FETCH_ASSOC);
        return $usuariosBD;
    }

    public static function AgregarID() {}

    public static function getEmail($id) {
        $db = // establecer conexion
        $query = $db->prepare("SELECT email FROM usuarios WHERE id = $id");
        $query->execute();
        $email = $query->fetchAll(PDO::FETCH_ASSOC);
        return $email;
    }

    public static function getName($id) {
        $db = // establecer conexion
        $query = $db->prepare("SELECT nombre FROM usuarios WHERE id = $id");
        $query->execute();
        $nombre = $query->fetchAll(PDO::FETCH_ASSOC);
        return $nombre;
    }

    public static function getID($email) {
        $db = // establecer conexion
        $query = $db->prepare("SELECT email FROM usuarios WHERE email = $email");
        $query->execute();
        $id = $query->fetchAll(PDO::FETCH_ASSOC);
        return $id;
    }

    public static function getPass($id) {
        $db = // establecer conexion
        $query = $db->prepare("SELECT pass FROM usuarios WHERE id = $id");
        $query->execute();
        $pass = $query->fetchAll(PDO::FETCH_ASSOC);
        return $pass; // DEVUELVE EL HASH DEL PASSWORD
    }

    public static function getPhone($id) {
        $db = // establecer conexion
        $query = $db->prepare("SELECT phone FROM usuarios WHERE id = $id");
        $query->execute();
        $phone = $query->fetchAll(PDO::FETCH_ASSOC);
        return $phone;
    }

    public static function getAvatar($id) {
        $db = // establecer conexion
        $query = $db->prepare("SELECT avatar FROM usuarios WHERE id = $id");
        $query->execute();
        $avatar = $query->fetchAll(PDO::FETCH_ASSOC);
        return $avatar;
    }

}

?>