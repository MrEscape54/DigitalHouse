<?php

session_start();
// var_dump($_SESSION);
if (isset($_SESSION['ID'])) {
   setcookie('ID', $_SESSION['ID'], time() -1);
session_destroy();
}

header('Location: index.php');
exit;

 ?>
