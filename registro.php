<?php

//--------------------------------------------------validación de datos----------------------------

require('autoload.php');

<<<<<<< HEAD
if (estaLogueado()) {
    header('location:index.php');
    exit;
}

=======
use DigitalHouse\Models\Autenticaciones;
use DigitalHouse\Models\Validaciones;
use DigitalHouse\Models\RepositorioJSON;

if (Autenticaciones::estaLogueado()) {
    header('location:index.php');
    exit;
}

>>>>>>> 9febde2e36880d1b7ffb176856d45044e329493a
$nombre = '';
$email = '';
$phone = '';
$password = '';
$rePassword = '';

if ($_POST) {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
<<<<<<< HEAD
    $avatar = '/img/fotosPerfil/avatar-generico.jpg';
    $errores = ValidarRegistro($_POST, $avatar);
}
=======
    $avatar = 'img/fotosPerfil/avatar-generico.jpg';
    $errores = Validaciones::ValidarRegistro($_POST, $avatar);
}

>>>>>>> 9febde2e36880d1b7ffb176856d45044e329493a
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
                    <input type="text" name="nombre" value="<?php echo $nombre ?>" placeholder="Nombre de usuario" />
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
