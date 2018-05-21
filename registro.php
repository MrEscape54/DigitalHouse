<?php
//--------------------------------------------------validación de datos----------------------------

require_once('functions.php');


$avatar = dirname(__FILE__);
$avatar = $avatar . '\img\fotosPerfil\Avatar_generico.png';

$errores = ValidarRegistro($_POST, $avatar);
$nombre = '';
$email = '';
$phone = '';
$password = '';
$rePassword = '';

if ($_POST) {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
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
<body>
   
<?php
    include 'header.php';
?>

    <main class="login-page">
        <div class="contact signin">
        <div class="titulos">
                <p>Registrarse</p>
                <p><a href="login.php">Ya tengo cuenta</a></p>
            </div>
            <form method="post" enctype="multipart/form-data">

                <div class="input-group input-group-icon">
                    <input type="text" name="nombre" value="<?php echo $nombre ?>" placeholder="Nombre completo" />
                    <div class="input-icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <span class="obligatorio" ><?php if(isset($errores['nombre'])) { echo $errores['nombre'];}?></span>
                    
                </div>
                <div class="input-group input-group-icon">
                    <input type="email" name="email" value="<?php echo $email ?>" placeholder="Correo electrónico" />
                    <div class="input-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <span class="obligatorio" ><?php if(isset($errores['email'])) { echo $errores['email'];}?></span>
                </div>

                <div class="input-group input-group-icon">
                    <input type="tel" name="phone" value="<?php echo $phone ?>" placeholder="Teléfono (opcional)" />
                    <div class="input-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                </div>

                <div class="input-group input-group-icon">
                    <input type="password"  name="password" placeholder="Contraseña" />
                    <div class="input-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <span class="obligatorio" ><?php if(isset($errores['password'])) { echo $errores['password'];}?></span>
                </div>

                <div class="input-group input-group-icon">
                    <input type="password"  name="rePassword" placeholder="Repite la contraseña" />
                    <div class="input-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <span class="obligatorio" ><?php if(isset($errores['rePassword'])) { echo $errores['rePassword'];}?></span>
                </div>

                <div class="input-group input-group-icon">
                    <input type="file"  name="avatar" />
                    <div class="input-icon">
                    <i class="fas fa-file-image"></i>
                    </div>
                    <span class="obligatorio" ><?php if(isset($errores['avatar'])) { echo $errores['avatar'];}?></span>
                    
                </div>
                
                <div class="input-group">
                    <input type="submit" value="Registrarse" />
                    <input type="reset" value="Limpiar campos" />
                </div>
            </form>
        </div>
    </main>

<?php
    include 'footer.php';
?>  

</body>
</html>
