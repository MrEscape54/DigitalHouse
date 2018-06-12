<?php 

require('autoload.php');

use DigitalHouse\Models\RestauraBD;

if($_POST) {
  RestauraBD::Restaurar();
}


?>

