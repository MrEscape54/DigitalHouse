<?php 

require('functions.php');

if (!estaLogueado()) {
   header('location:login.php');
   exit;
}

include('header.php');

?>

<h1 style="text-align: center;">Under fucking construction</h1>

<?php 

include('footer.php');

?>

</body>
</html>

