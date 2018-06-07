<?php
    include ('header.php');
?>
    <main>
        <img class="map" src="img/map.PNG" alt="mapa con direccion">
        <div class="google-map">
            <a href="https://www.google.com.ar/maps/place/Lima+1111,+C1073AAW+CABA/@-34.6211613,-58.3887272,15.25z/data=!4m5!3m4!1s0x95bccb28ea8781cb:0x950feb519009506e!8m2!3d-34.6210713!4d-58.3816733"
                class="boton-tr boton-mapa" target="_blank">Ver mapa</a>
        </div>
        <div class="contact">
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
                <div class="input-group">
                    <input type="radio" name="gender" value="hombre" id="gender-male" />
                    <label for="gender-male">Hombre</label>
                    <input type="radio" name="gender" value="mujer" id="gender-female" />
                    <label for="gender-female">Mujer</label>
                </div>
                <div class="input-group">
                    <input type="text" placeholder="Asunto" />
                </div>
                <div class="input-group">
                    <textarea name="msg" rows="10" placeholder="Escribe tu mensaje aquí"></textarea>
                </div>
                <div class="input-group send-reset">
                    <input type="submit" value="Enviar" />
                    <input type="reset" value="Limpiar campos" />
                </div>
            </form>
        </div>
    </main>

<?php
    include 'footer.php';
?>
