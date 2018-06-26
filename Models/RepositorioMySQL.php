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

    public static function CrearUsuario($datos, $avatar) {
        $usuario = new Usuario($datos['nombre'], $datos['email'], $datos['phone'], $datos['password'], $avatar);
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
        $query = $db->query("INSERT INTO usuarios (id, nombre, email, pass, phone = null, avatar)
          VALUES ('$id', '$nombre', '$email', '$pass', '$phone', '$avatar')");
    }

    public static function EsUsuario($tablaUsuarios, $email) {
        $usuarioEmail = $db->query("SELECT email FROM usuarios WHERE email = $email");
        $usuarioEmail = $usuario->fetchAll(PDO::FETCH_ASSOC);
        if ($usuarioEmail = $email) {
            return True;
        } else {
            return False;
        }
    }

    public static function TraerBaseDeUsuarios() {
        $usuarios = $db->query("SELECT * FROM usuarios");
        $usuarios= $usuarios->fetchAll(PDO::FETCH_ASSOC);
        return $usuarios;
    }

    public static function AgregarID() {}

    public static function getEmail($id) {
        $email = $db->email("SELECT email FROM usuarios WHERE id = $id");
        $email = $email->fetchAll(PDO::FETCH_ASSOC);
        return $email;
    }

    public static function getName($id) {
        $nombre = $db->nombre("SELECT nombre FROM usuarios WHERE id = $id");
        $nombre = $nombre->fetchAll(PDO::FETCH_ASSOC);
        return $nombre;
    }

}

?>