<?php

include_once('autoload.php');

use DigitalHouse\Models\Autenticaciones;
use DigitalHouse\Models\RepositorioMySQL;

if (Autenticaciones::estaLogueado() == false) {
  header('location:index.php');
  exit;
}

include_once('header.php');

$nombre = '';
$email = '';

if (isset($_SESSION['id'])) {
    $nombre = RepositorioMySQL::getName($_SESSION['id']);
    $email = RepositorioMySQL::getEmail($_SESSION['id']);

} else if(isset($_COOKIE['id'])){
    $nombre = RepositorioMySQL::getName($_COOKIE['id']);
    $email = RepositorioMySQL::getEmail($_COOKIE['id']);
}

?>

<main class="profile">

  <div class="profile-pic">
    <img src="<?php echo $avatar; ?>" alt="Profile Picture">
  </div>

  <div class="profile-data">
    <div class="input-group input-group-icon">
      <p class="profile-name"><?php echo $nombre; ?></p>
      <div class="input-icon">
          <i class="fas fa-user"></i>
      </div>
    </div>
  </div>

  <div class="profile-data">
    <div class="input-group input-group-icon">
      <p class="profile-email"><?php echo $email; ?></p>
      <div class="input-icon">
          <i class="fas fa-envelope"></i>
      </div>
    </div>
  </div>

  <table id="historial-compra">
    <tr>
      <th colspan="5">Historial de Compras</th>
    </tr>
    <tr>
      <th>Numero de orden</th>
      <th>Producto</th>
      <th>Status</th>
      <th>Fecha</th>
      <th>Total</th>
    </tr>
    <tr>
      <td>#0203186</td>
      <td>Cartier - Tank</td>
      <td>Entregado</td>
      <td>25/05/2018</td>
      <td>$15.000</td>
    </tr>
    <tr>
      <td>#0204985</td>
      <td>Rolex - Explorer II</td>
      <td>Entregado</td>
      <td>15/05/2018</td>
      <td>$12.250</td>
    </tr>
  </table>

  <div class="logout">
    <p><a href="logout.php">Cerrar Sesion</a></p>
  </div>

</main>

<?php

include ('footer.php');

 ?>
