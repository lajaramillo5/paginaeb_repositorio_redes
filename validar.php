<?php
include('db.php');
$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];
session_start();
$_SESSION['usuario'] = $usuario;


$conexion = mysqli_connect("usuarios.cf3uw8swbu5z.us-east-2.rds.amazonaws.com", "admin","luis123456", "login");

$consulta = "SELECT*FROM usuarios where usuario='$usuario' and contraseña='$contraseña'";
$resultado = mysqli_query($conexion, $consulta);

$filas = mysqli_num_rows($resultado);

if ($filas) {

  header("location:html/index.html");
} else {
?>
  <?php
  include("loguin.html");

  ?>
  <h1 class="bad">ERROR DE AUTENTIFICACION</h1>
<?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);
