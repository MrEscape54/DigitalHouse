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
        <div class="contact login">
            <p>Ingresar</p>
            <form>
                <div class="input-group input-group-icon">
                    <input type="email" placeholder="Correo electrónico" />
                    <div class="input-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="password" placeholder="Contraseña" />
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
                    <input type="checkbox" id="cbox1" value="remember">
                    <span>Recordarme</span>
                </label>
                </div>
            </form>
        </div>

        <div class="contact signin">
            <p>Registrarse</p>
            <form>
                <div class="input-group input-group-icon">
                    <input type="text" placeholder="Nombre" />
                    <div class="input-icon">
                        <i class="fas fa-user"></i>
                    </div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="email" placeholder="Correo electrónico" />
                    <div class="input-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="tel" placeholder="Teléfono" />
                    <div class="input-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="password" placeholder="Contraseña" />
                    <div class="input-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="password" placeholder="Repite la contraseña" />
                    <div class="input-icon">
                        <i class="fas fa-lock"></i>
                    </div>
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
