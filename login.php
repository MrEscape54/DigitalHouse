<?php
//--------------------------------------------------validación de datos----------------------------

require_once('functions.php');

$email = '';
$msg = 'none';
$checked = '';

if(isset($_COOKIE['email'])) {
    $email = $_COOKIE['email'];
    $checked = 'checked';
}

if($_POST) {
    $email = $_POST['email'];
    $error = ValidarIngreso($_POST);

    if($error === true) {
        if(isset($_POST['recordar'])) {
            setcookie('email', $_POST['email'], time() + 60*60*24*30);
        }

        if(isset($_COOKIE['email']) && !isset($_POST['recordar'])) {
            setcookie('email', $email, time() -1);
        }
        header('Location: index.php');
    }
    else {
        $msg = 'flex';
    }
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
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700|Open+Sans:800" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
</head>
<style>
    .warning{display: <?php echo $msg ?> ;}
</style>
<body>
   
<?php
    include 'header.php';
?>
    <div class="warning">
        <div class="input-icon">
        <i style="font-size:1.5em; color:Tomato; margin-right:5px;" class="fas fa-exclamation-triangle"></i>
        </div>
        <p>Usuario o contraseña incorrecta</p>
    </div>

    <main class="login-page">
        <div class="contact login">
            <div class="titulos">
                <p>Ingresar</p>
                <p><a href="registro.php">Soy nuevo</a></p>
            </div>

            <form method="post">
                <div class="input-group input-group-icon">
                    <input type="email" name="email" placeholder="Correo electrónico" value="<?php echo $email ?>"/>
                    <div class="input-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="password" name="password" placeholder="Contraseña"/>
                    <div class="input-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                </div>
                <div class="input-group">
                    <input type="submit" value="Ingresar" />
                    <a href="#">Olvidé mi contraseña</a>
                </div>
                <div>
                <label>
                    <input type="checkbox" name="recordar" id="cbox1" value="recordar" <?php echo $checked; ?>>
                    <span>Recordar mi usuario</span>
                </label>
                </div>
            </form>

        </div>
    </main>    

<?php
    include 'footer.php';
?>  

</body>
</html>
