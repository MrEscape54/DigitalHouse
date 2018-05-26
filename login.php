<?php
//--------------------------------------------------validación de datos----------------------------

require_once('functions.php');

if (estaLogueado()) {
    header('location:index.php');
    exit;
}

$email = '';
$msg = 'none';
$checked = '';

if(isset($_COOKIE['email'])) {
    $email = $_COOKIE['email'];
    $checked = 'checked';
}

if($_POST) {
    $email = $_POST['email'];
    $datosValidos = ValidarIngreso($_POST);

    if($datosValidos === true) {

        Ingresar($email);
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
