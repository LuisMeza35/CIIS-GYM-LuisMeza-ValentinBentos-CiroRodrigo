<!-- PHP -->
<?php

include("../../Administrativo/php/conexion.php");

$txtNombre = !empty($_POST['txtNombre']) ? $_POST['txtNombre'] : "";
$txtApellido = !empty($_POST['txtApellido']) ? $_POST['txtApellido'] : "";
$txtEmail = !empty($_POST['txtEmail']) ? $_POST['txtEmail'] : "";
$txtDni = !empty($_POST['txtDni']) ? $_POST['txtDni'] : "";
$txtTelefono = !empty($_POST['txtTelefono']) ? $_POST['txtTelefono'] : "";
$txtContrasena = !empty($_POST['txtContrasena']) ? $_POST['txtContrasena'] : "";
$txtEnfermedad = !empty($_POST['txtEnfermedad']) ? $_POST['txtEnfermedad'] : "";


if( !empty($txtNombre) && (!empty($txtApellido)) && (!empty($txtEmail)) && (!empty($txtDni)) && (!empty($txtTelefono)) && (!empty($txtContrasena)) && (!empty($txtEnfermedad)) ) {
  // ORDEN DE LA BASE DE DATOS


    $sentenciaSQL = $conexion->prepare("INSERT INTO cliente (nombre, apellido, email, DNI, telefono, contrasena, enfermedad) VALUES (:nombre, :apellido, :email, :dni, :telefono, :contrasena, :enfermedad )");
  // 
    $sentenciaSQL->bindParam(':nombre', $txtNombre);
    $sentenciaSQL->bindParam(':apellido', $txtApellido);
    $sentenciaSQL->bindParam(':email', $txtEmail);
    $sentenciaSQL->bindParam(':dni', $txtDni);
    $sentenciaSQL->bindParam(':telefono', $txtTelefono);
    $txtContrasena = password_hash(($txtContrasena), PASSWORD_BCRYPT);
    $sentenciaSQL->bindParam(':contrasena', $txtContrasena);
    $sentenciaSQL->bindParam(':enfermedad', $txtEnfermedad);
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
    <link rel="stylesheet" href="../css/register.css">
    <!-- Icono de la Pagina -->
    <link rel="icon" sizes="64x64" href="../img/Icono.ico">
    <!-- Linkeado de Box Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>

    <?php if( !empty($message) ) :  ?>
        <p><?= $message ?></p>   
    <?php endif; ?>

    <header>
        <a href="../index.php"><span>Regresar</span></a>
    </header>

    <!-- FORMULARIO -->
    <div class="luz-neon">
      <div class="container">
        <div class="logo">
          <img src="../img/Logo.png" alt="logo de ciis GYM">
        </div>
        <div class="title">Registrate</div>
        <div class="content">
          <form method="POST" action="register.php">
            <div class="user-details">
              <div class="input-box">
                <span class="details">Nombre</span>
                <input type="text" name="txtNombre" id="txtNombre" placeholder="Ingresa tu nombre" required>
              </div>
              <div class="input-box">
                <span class="details">Apellido</span>
                <input type="text" name="txtApellido" id="txtApellido" placeholder="Ingresa tu apellido" required>
              </div>
              <div class="input-box">
                <span class="details">Email</span>
                <input type="email" name="txtEmail" id="txtEmail" placeholder="Ingresa tu email" required>
              </div>
              <div class="input-box">
                <span class="details">DNI</span>
                <input type="text" name="txtDni" id="txtDni" placeholder="Ingresa tu dni" required>
              </div>
              <div class="input-box">
                <span class="details">Teléfono</span>
                <input type="text" name="txtTelefono" id="txtTelefono" placeholder="Ingresa tu número" required>
              </div>
              <div class="input-box">
                <span class="details">Contraseña</span>
                <input type="password" name="txtContrasena" id="txtContrasena" placeholder="Ingresa tu contraseña" required>
              </div>
            </div>
            <!-- <div class="gender-details">
                <input type="radio" name="gender" id="dot-1">
                <input type="radio" name="gender" id="dot-2">
                < <span class="gender-title">¿Alguna Enfermedad?</span>
                <div class="category">
                  <label for="dot-1">
                    <span class="dot one"></span>
                    <span class="gender">Si</span>
                  </label>
                  <label for="dot-2">
                    <span class="dot two"></span>
                    <span class="gender">No</span>
                  </label>
                </div>
            </div> -->
            <span class="gender-title">¿Alguna Enfermedad?</span>
            <div class="input-box enfermedad">
              <input type="text" name="txtEnfermedad" id="txtEnfermedad" placeholder="Especificanos la enfermedad">
            </div>
            <div class="button">
              <input type="submit" value="Registrarme">
            </div>
            <div class="register-link">
                <p>¿Ya ténes una cuenta? <a href="login.php"><b>Iniciá Sesión acá</b></a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
</body>
</html>