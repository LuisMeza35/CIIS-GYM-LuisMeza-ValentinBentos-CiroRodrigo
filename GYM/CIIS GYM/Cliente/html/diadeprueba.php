<!-- PHP -->
<?php

include("../../Administrativo/php/conexion.php");

$txtNombre = !empty($_POST['txtNombre']) ? $_POST['txtNombre'] : "";
$txtApellido = !empty($_POST['txtApellido']) ? $_POST['txtApellido'] : "";
$txtEmail = !empty($_POST['txtEmail']) ? $_POST['txtEmail'] : "";
$txtTelefono = !empty($_POST['txtTelefono']) ? $_POST['txtTelefono'] : "";
$txtHora = !empty($_POST['txtHora']) ? $_POST['txtHora'] : "";
$txtFecha = !empty($_POST['txtFecha']) ? $_POST['txtFecha'] : "";


if( !empty($txtNombre) && (!empty($txtApellido)) && (!empty($txtEmail)) && (!empty($txtTelefono)) && (!empty($txtHora)) && (!empty($txtFecha)) ) {
  // ORDEN DE LA BASE DE DATOS 
    $sentenciaSQL = $conexion->prepare("INSERT INTO cliente (nombre, apellido, mail, telefono, hora, fecha) VALUES (:nombre, :apellido, :email, :telefono; :hora, :fecha )");
  // 
    $sentenciaSQL->bindParam(':nombre', $txtNombre);
    $sentenciaSQL->bindParam(':apellido', $txtApellido);
    $sentenciaSQL->bindParam(':email', $txtEmail);
    $sentenciaSQL->bindParam(':telefono', $txtTelefono);
    $sentenciaSQL->bindParam(':hora', $txtHora);
    $sentenciaSQL->bindParam(':fecha', $txtFecha);
    $sentenciaSQL->execute();

}

?>

<!-- HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Titulo -->
    <title>CIIS GYM</title>
    <!-- Link CSS -->
    <link rel="stylesheet" href="../css/diadeprueba.css">
    <!-- Icono de la Pagina -->
    <link rel="icon" sizes="64x64" href="../img/Icono.ico">

</head>
<body>
    <div class="luz-neon">
      <div class="container">
          <div class="logo">
              <img src="../img/Logo.png" alt="logo de ciis GYM">
          </div>
          <div class="title">Dia de prueba</div>
          <div class="content">
            <form action="#">
              <div class="user-details">
                <div class="input-box">
                  <span class="details">Nombre</span>
                  <input type="text" name="txtNombre" id="txtNombre" placeholder="Ingrese su nombre" required>
                </div>
                <div class="input-box">
                  <span class="details">Apellido</span>
                  <input type="text" name="txtApellido" id="txtApellido" placeholder="Ingrese su apellido" required>
                </div>
                <div class="input-box">
                  <span class="details">Email</span>
                  <input type="text" name="txtEmail" id="txtEmail" placeholder="Ingrese su email" required>
                </div>
                <div class="input-box">
                  <span class="details">Telefono</span>
                  <input type="text"  name="txtTelefono" id="txtTelefono" placeholder="Ingrese su numero de telefono" required>
                </div>
                <div class="input-box">
                  <span class="details">Hora</span>
                  <input type="time" name="txtHora" id="txtHora" placeholder="Ingrese el horario" required>
                </div>
                <div class="input-box">
                  <span class="details">Fecha</span>
                  <!-- INPUT DATE -->
                  <input class="date_input" name="txtFecha" id="txtFecha" type="date" required>
                </div>
              </div>
              <div class="Turno">
                  <input type="radio" name="Turno" id="dot-1">
                  <input type="radio" name="Turno" id="dot-2">
                  <input type="radio" name="Turno" id="dot-3">
                  <span class="turno-title">Turno</span>
                  <div class="category">
                    <label for="dot-1">
                    <span class="dot one"></span>
                    <span class="turno">Mañana</span>
                  </label>
                  <label for="dot-2">
                    <span class="dot two"></span>
                    <span class="turno">Tarde</span>
                  </label>
                  <label for="dot-3">
                    <span class="dot three"></span>
                    <span class="turno">Noche</span>
                    </label>
                  </div>
                </div>
                <div class="button">
                  <input class="enviar" type="submit" value="Solicitar Turno">
                </div>
              </form>
            </div>
        </div>
      </div>

        <script src="main.js"></script>
</body>
</html>