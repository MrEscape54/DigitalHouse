<?php
//--------------------------------------------------validación de datos----------------------------
require('autoload.php');

use DigitalHouse\Models\Autenticaciones;
use DigitalHouse\Models\Validaciones;
// use DigitalHouse\Models\RepositorioJSON;
use DigitalHouse\Models\RepositorioMySQL;

if (Autenticaciones::estaLogueado()) {
    header('location:index.php');
    exit;
}

$nombre = '';
$email = '';
$msg = 'none';
$checked = '';

if(isset($_COOKIE['email'])) {
    $email = $_COOKIE['email'];
    $checked = 'checked';
}

if($_POST) {
    $email = $_POST['email'];
    $id = RepositorioMySQL::getID($email);
    $errores = Validaciones::ValidarIngreso($_POST);

    if(!$errores) {
        Autenticaciones::Ingresar($email);
        if(isset($_POST['recordar'])) {
          /* $arrayUsuarios = RepositorioJSON::TraerBaseDeUsuarios();
          foreach ($arrayUsuarios as $usuarios) {
            if($usuarios['email'] == $email){
              setcookie('email', $usuarios['email'], time() + 60*60*24*30);
            }
          } */
            setcookie('id', $id, time() + 60*60*24*30);

        }
        if(isset($_COOKIE['id']) && !isset($_POST['recordar'])) {
            /* $arrayUsuarios = RepositorioJSON::TraerBaseDeUsuarios();
          foreach ($arrayUsuarios as $usuarios) {
            if($usuarios['email'] == $email){
              setcookie('email', $usuarios['email'], time() - 1);
            }
          } */
            setcookie('id', $id, time() - 1);
        }
        if(!isset($_COOKIE['id'])) {
            /* $arrayUsuarios = RepositorioJSON::TraerBaseDeUsuarios();
            foreach ($arrayUsuarios as $usuarios) {
                if($_POST['email'] ==  $usuarios['email']) {
                    $_SESSION['ID'] = $usuarios['ID'];
                }
            } */
            $_SESSION['id'] = $id;
        }

        if(isset($_COOKIE['id'])) {
            /* $arrayUsuarios = RepositorioJSON::TraerBaseDeUsuarios();
            foreach ($arrayUsuarios as $usuarios) {
                if($usuarios['email'] == $email){
                    Autenticaciones::Ingresar($email);
                }
            } */
            Autenticaciones::Ingresar($email);
        }
        header('Location: index.php');
    }
    else if (isset($errores['passOK']) && !isset($errores['email']) && !isset($errores['password'])){
        $msg = 'flex';
    }
}

include 'header.php';

?>

<style>
    .warning{display: <?php echo $msg ?> ;}
</style>

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
                    <span class="obligatorio" ><?php if(isset($errores['email'])) { echo $errores['email'];}?></span>
                </div>

                <div class="input-group input-group-icon">
                    <input type="password" name="password" placeholder="Contraseña"/>
                    <div class="input-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <span class="obligatorio" ><?php if(isset($errores['password'])) { echo $errores['password'];}?></span>
                </div>

                <div class="input-group">
                    <input type="submit" value="Ingresar" />
                    <a href="#">Olvidé mi contraseña</a>
                </div>
                <div>
                <label>
                    <input type="checkbox" name="recordar" id="cbox1" value="recordar" <?php echo $checked ?>>
                    <span>Recordar mi usuario</span>
                </label>
                </div>
            </form>

        </div>
    </main>

<?php
    include 'footer.php';
?>