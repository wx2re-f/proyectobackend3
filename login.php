<?php
$usuario = $_POST ["usuario"];
$contraseña = $_POST ["contraseña"];
session_start();
$_SESSION["usuario"] = $usuario;

$conexion = mysqli_connect("127.0.0.1", "root", "");
mysqli_select_db($conexion, "validar");

$consulta = "SELECT * FROM usuarios WHERE usuario ='$usuario'  and contraseña='$contraseña' ";
$datos= mysqli_query($conexion, $consulta);

$filas= mysqli_fetch_array($datos);

if ($contraseña == $reg["contraseña"]) {
  header("location:listar.php");
}
else {
  header("location:error.html");
}

 ?>
