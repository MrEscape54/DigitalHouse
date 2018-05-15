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
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700|Open+Sans:800|Open+Sans+Condensed:300" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
</head>
<body>

<?php
    include 'header.php';
?>

    <main>
        <div class="slider">
            <input type="radio" id="control1" name="controls" checked="checked" />
            <label for="control1"></label>
            <input type="radio" id="control2" name="controls" />
            <label for="control2"></label>
            <input type="radio" id="control3" name="controls" />
            <label for="control3"></label>
            <input type="radio" id="control4" name="controls" />
            <label for="control4"></label>

            <div class="sliderinner">
                <ul>
                    <li><img src="img/Showcase/rolex-hero-april-desktop.jpg" /></li>
                    <li><img src="img/Showcase/hublot-world-cup-desktop.jpg" /></li>
                    <li><img src="img/Showcase/cartiersantos-desktop.jpg " /></li>
                    <li><img src="img/Showcase/tag-comp-hp-hero.jpg" /></li>
                </ul>
            </div>
        </div>
        <div class="about">
                <h3>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi impedit saepe nihil ea, eligendi exercitationem
                    ipsum quia, quibusdam et porro distinctio enim vero consectetur incidunt vel aliquam autem, nam sapiente.
                </p>
                <a class="boton-tr" href="login.php">Registrarse</a>
        </div>
        <section>
            <div class="second-sponsor">
                <div class="sp-description">
                    <div class="sp-text">
                        <a href="#">Profesional</a>
                        <p> Uno de los lemas más antiguos de Breitling es "Instrumentos para profesionales". Esas palabras están vigentes hoy más que nunca.
                            Los relojes de la "Colección Profesional" están equipados con las características necesarias para ser los socios perfectos
                            de los aventurero.
                         </p>
                        <a class="sp-button" href="#" class="button outline">Descubre la colección</a>
                    </div>
                    <div class="sp-img">
                        <a href="#" title="Breitling-clock">
                            <img src="img/breitling-home.png" alt="Professional">
                         </a>
                    </div>
                </div>
            </div>
        </section>
        <div class="brands">
            <ul>
                <li><a href="#"><img src="img/logos/breguet.png" alt=""></a></li>
                <li><a href="#"><img src="img//logos/breitling-logo-update-1.png" alt=""></a></li>
                <li><a href="#"><img src="img/logos/cartier.png" alt=""></a></li>
                <li><a href="#"><img src="img/logos/longines.png" alt=""></a></li>
                <li><a href="#"><img src="img/logos/montblanc.png" alt=""></a></li>
                <li><a href="#"><img src="img/logos/omega.png" alt=""></a></li>
                <li><a href="#"><img src="img/logos/piaget.png" alt=""></a></li>
                <li><a href="#"><img src="img/logos/rolex.png" alt=""></a></li>
                <li><a href="#"><img src="img/logos/tag-heuer.png" alt=""></a></li>
                <li><a href="#"><img src="img/logos/zenith.jpg" alt=""></a></li>
            </ul>
            <a class="boton-tr" href="#">todas las marcas</a>
        </div>
        <hr style="border:0.2px solid #ccc; width: 80%; margin: 0 auto;">
        <div class="destacados">
            <h3>Colección 2018</h3>
            <div class="collections">
                <img class="foto" src="img/collections/cartier-brand.jpg">
                    <img class="logo" src="img/collections/cartier.png">
                    <a class="boton-tr" href="#">Ver colección</a>
            </div>
            <div class="collections">
                <img class="foto" src="img/collections/brand-hublot.jpg">
                <img class="logo" src="img/collections/hublot.png">
                <a class="boton-tr" href="#">Ver colección</a>
            </div>
            <div class="collections">
                <img class="foto" src="img/collections/iwc-image.jpg">
                <img class="logo" src="img/collections/iwc.png">
                <a class="boton-tr" href="#">Ver colección</a>
            </div>
            <div class="collections">
                <img class="foto" src="img/collections/omega-brand.jpg">
                <img class="logo" src="img/collections/omega.png">
                <a class="boton-tr" href="#">Ver colección</a>
            </div>
        </div>
    </main>

<?php
    include 'footer.php';
?>  

</body>
</html>
