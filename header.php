<?php 

    require_once('functions.php');

    if (estaLogueado()) {
        if (isset($_SESSION['avatar'])) {$avatar = $_SESSION['avatar'];}
        else {$avatar = '/php/DigitalHouse/img/fotosPerfil/avatar-generico.jpg';}
    }
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DDL | Relojes de Lujo</title>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/sanitize.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/contact.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700|Open+Sans:800|Open+Sans+Condensed:300" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <div class="search-scart">
            <i class="fas fa-search fa-lg"></i>
            <div class="scart">
                <a href="#"><i class="fas fa-shopping-cart fa-lg"></i></a>
                <span class="badge">13</span>
            </div>
            <div class="ingreso">
                <a href="login.php"><?php echo !isset($avatar) ? 'Ingresar' :  ''; ?></a>
                <a href="perfil.php"><?php echo isset($avatar) ? '<img src="' . $avatar . '">' : ''; ?></a>
            </div>
        </div>
        <hr style="border:0.2px solid #ccc; width: 80%;">
        <div class="logo-container">
            <a href="index.php"><img src="img/logo.png" alt="logo"></a>
            <h4>RELOJES DE LUJO</h4>
        </div>

        <nav id="MainNavOuter">
            <span>Marca</span>
            <ul id="MainNav" class="">
                <li class="active"><a href="#">Breguet</a></li>
                <li><a href="#">Breitling</a></li>
                <li><a href="#">Cartier</a></li>
                <li><a href="#">Longines</a></li>
                <li><a href="#">Montblanc</a></li>
                <li><a href="#">Omega</a></li>
                <li><a href="#">Piaget</a></li>
                <li><a href="#">Rolex</a></li>
                <li><a href="#">TAG Heuer</a></li>
                <li class="last"><a href="#">Todos</a></li>
            </ul>
        </nav>

        <nav id="SubNavOuter">
            <span>Tipo</span>
            <ul id="SubNav" class="">
                <li class="active"><a href="#">Deportivo</a></li>
                <li><a href="#">Automático</a></li>
                <li><a href="#">Cronógrafo</a></li>
                <li><a href="#">Buceo</a></li>
                <li><a href="#">Smart</a></li>
                <li><a href="#">Vintage</a></li>
                <li class="last"> <a href="#">Todos</a></li>
            </ul>
        </nav>

        <nav id="GenderOuter">
            <span>Género</span>
            <ul id="Gender" class="">
                <li class="active"><a href="#">Hombre</a></li>
                <li><a href="#">Mujer</a></li>
                <li class="last"><a href="#">Todos</a></li>
            </ul>
        </nav>
    </header>