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

    $query = $db->query('create table customers (
      id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
      first_name VARCHAR(45) NOT NULL,
      last_name VARCHAR(45) NOT NULL,
      email VARCHAR(45) UNIQUE NOT NULL,
      password VARCHAR(70) NOT NULL,
      address_id INT,
      phone VARCHAR(45),
      credit_card_id INT,
      create_time TIMESTAMP,
      update_time TIMESTAMP ,
      avatar VARCHAR(45) NOT NULL
    );');

    $query = $db->query('create table products (
      id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
      brand_id INT ,
      model_id INT,
      model_id INT,
      genero_id INT,
      description VARCHAR(300),
      price DECIMAL,
      is_available INT,
      picture VARCHAR(45)
    );');

    $query = $db->query('create table brands (
      id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
      brand_name VARCHAR(45) NOT NULL
    );');

    $query = $db->query('create table genres (
      id TINYINT UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
      genre_name VARCHAR(1) NOT NULL
    );');

    $query = $db->query('create table types (
      id TINYINT UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
      type_name VARCHAR(45) NOT NULL
    );');

    $query = $db->query('create table order_details (
      id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
      order_id INT,
      product_id INT,
      price DECIMAL,
      quantity INT,
      total_amount DECIMAL
    );');

    $query = $db->query('create table orders (
      id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
      customer_id INT,
      order_date DATE,
      status_inProcess_date DATE,
      status_shiped_date DATE,
      statis_delivered_date DATE
    )');

    $query = $db->query('create table credit_cards (
      id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
      credit_card_number VARCHAR(20),
      credit_card_brand VARCHAR(20),
      credit_card_expm INT,
      credit_card_expy INT
    )');

    $query = $db->query('create table addresses (
      id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
      city VARCHAR(45),
      province VARCHAR(45),
      country VARCHAR(45),
      zipcode VARCHAR(10)
    )');

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

    $query = $db->query("INSERT INTO genres (genre_name)
    VALUES ('m'), ('f'), ('u');");

    $query = $db->query("INSERT INTO types (type_name)
    VALUES
      ('deportivo'),
      ('automatico'),
      ('cronografo'),
      ('buceo'),
      ('smart'),
      ('vintage')
    ;");

  $credenciales = json_encode($_POST);
  file_put_contents('credenciales.json', $credenciales);  

  }
}


?>