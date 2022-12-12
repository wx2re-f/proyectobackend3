<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
          <link rel="stylesheet" href="css/estilos2.css">
        <title>Tienda Ugareño</title>
  <br>
  <br>
  <h1>BIENVENIDOS : <?php echo $_SESSION["usuario"] ?></h1>
  <a href="cerrarsesion.php">cerrar sesion</a>
  <br>
  <br>
  <div class="cabecera">
    <div class="titulo">
        <h2 class="display-4 fw-bolder">Tienda Ugareño</h2>
      <br>
    </div>
  </div>
<br>
<div class="botones">
  <button type="submit"><a href="index.php">Inicio</a></button>
  <button type="submit"><a href="listar.php">Listar ropa</a></button>
  <button type="submit"><a href="index.html">Otras opciones</a></button>
  <button type="submit"><a href="agregar.html">Agregar ropa</a></button>
</div>
    <br>
    <br>
    <div class="titulo2">
      <h3>Lista de ropa</h3>
      <p>La siguiente lista muestra los datos de la ropa actualmente en stock.</p>
    </div>
<br>
<div class="tabla">
    <table border="1">
    <tr>
        <th>ID</th>
        <th>TIPO DE PRENDA</th>
        <th>MARCA</th>
        <th>TALLE</th>
        <th>PRECIO</th>
        <th>IMAGEN</th>
        <th>EDITAR</th>
        <th>BORRAR</th>
    </tr>
    </div>
    <?php
    // 1) Conexion
    $conexion = mysqli_connect("127.0.0.1", "root", "");
    mysqli_select_db($conexion, "tienda_ropa");


    // 2) Preparar la orden SQL
    // Sintaxis SQL SELECT
    // SELECT * FROM nombre_tabla
    // => Selecciona todos los campos de la siguiente tabla
    // SELECT campos_tabla FROM nombre_tabla
    // => Selecciona los siguientes campos de la siguiente tabla
    $consulta='SELECT * FROM ropa';

    // 3) Ejecutar la orden y obtenemos los registros
    $datos= mysqli_query($conexion, $consulta);

    /*nueva forma con foreach
    while ($reg=mysqli_fetch_array($datos, MYSQLI_ASSOC)){
      foreach ($reg as $key => $value) {
        print ("<p>$key: $value</p>\n");
      };
    };*/

    // 4) Mostrar los datos del registro
     while ($reg=mysqli_fetch_array($datos)) { ?>
        <tr>
        <td><?php echo $reg['id']; ?></td>
        <td><?php echo $reg['tipo_prenda']; ?></td>
        <td><?php echo $reg['marca']; ?></td>
        <td><?php echo $reg['talle']; ?></td>
        <td><?php echo $reg['precio']; ?></td>
        <td><img src="data:image/png;base64, <?php echo base64_encode($reg['imagen'])?>" alt="" width="100px" height="100px"></td>
        <td><a href="modificar.php?id=<?php echo $reg['id'];?>">Editar</a></td>
        <td><a href="borrar.php?id=<?php echo $reg['id'];?>">Borrar</a></td>
        </tr>
    <?php } ?>
  </table>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <!-- Footer-->
  <footer class="contenedor-footer">
      <section class="Copyright">
      <p>&copy Copyright Paola Alejandra Romero / 2022</p>
      <br>
      <p>Final Backend Development Project-Potrero Digital</p>
                  </section>
          </footer>
  </body>
  </html>
