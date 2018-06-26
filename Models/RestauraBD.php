<?php 

namespace DigitalHouse\Models;
use PDO;

class RestauraBD 
{
   public static function Restaurar() {

    $dsn = 'mysql:host=127.0.0.1';
  
    $db_user = $_POST['user'];
    $db_pass = $_POST['pass'];

    $opt = [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION];
    $db = new PDO($dsn, $db_user, $db_pass, $opt);

    $query = $db->query('drop database if exists ddl');

    $query = $db->query('create database ddl;');

    $query = $db->query('use ddl;');

    $query = $db->query('create table usuarios (
      id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
      nombre VARCHAR(100) NOT NULL,
      email VARCHAR(100) UNIQUE NOT NULL,
      pass VARCHAR(100) NOT NULL,
      phone VARCHAR(100),
      avatar VARCHAR(100) NOT NULL
    );');

    $query = $db->query('create table carrito (
      id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
      cantidad INT NOT NULL,
      precio_total INT NOT NULL
    );');

    $query = $db->query('create table producto (
      id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
      precio INT NOT NULL
    );');

    $query = $db->query('create table marca (
      id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
      nombre VARCHAR(50) NOT NULL
    );');

    $query = $db->query('create table genero (
      id TINYINT UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
      nombre VARCHAR(50) NOT NULL
    );');

    $query = $db->query('create table tipo (
      id TINYINT UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
      nombre VARCHAR(50) NOT NULL
    );');

    $query = $db->query("INSERT INTO marca (nombre)
    VALUES
      ('breitling'),
      ('cartier'),
      ('longines'),
      ('montblanc'),
      ('omerga'),
      ('piaget'),
      ('rolex'),
      ('tag'),
      ('zenith');");

    $query = $db->query("INSERT INTO genero (nombre)
    VALUES ('masculino'), ('femenino'), ('unisex');");

    $query = $db->query("INSERT INTO tipo (nombre)
    VALUES
      ('deportivo'),
      ('automatico'),
      ('cronografo'),
      ('buceo'),
      ('smart'),
      ('vintage');");

  $credenciales = json_encode($_POST);
  file_put_contents('credenciales.json', $credenciales);  

  }
}


?>