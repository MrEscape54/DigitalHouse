<?php

//---LOGIN

function validacion($datos){
$todoOk = false;
$dato = '';

  if($datos){
    $errores = [];

    foreach ($datos as $key => $value) {
      if(isset($datos['key'])) {
        $dato = trim($datos['key']);
        if($dato == ''){
          $errores['key'] = "Campo obligatorio";
        }
      }
    }
    if(!$errores){
      $todoOk = true;
    }
  }
  if($todoOk){
    header('Location: index.php');
    exit;
  }
}

 ?>
