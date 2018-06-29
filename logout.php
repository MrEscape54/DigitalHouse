<?php

session_start();
// var_dump($_SESSION);
if (isset($_SESSION['id'])) {
   setcookie('id', $_SESSION['id'], time() -1);
session_destroy();
}

header('Location: index.php');
exit;

 ?>
