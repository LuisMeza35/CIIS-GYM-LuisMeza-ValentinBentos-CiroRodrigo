<!-- PHP -->
<?php
session_start();

require("../../Administrativo/php/conexion.php");

$txtEmail = !empty($_POST['txtEmail']) ? $_POST['txtEmail'] : "";
$txtContrasena = !empty($_POST['txtContrasena']) ? $_POST['txtContrasena'] : "";

$message;

if ((!empty($txtEmail)) && (!empty($txtContrasena))) {
    $sentenciaSQL = $conexion->prepare('SELECT email, contrasena FROM cliente WHERE email=:email');
    $sentenciaSQL->bindParam(':email', $txtEmail);
    $sentenciaSQL->execute();
    $user = $sentenciaSQL->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($txtContrasena, $user['contrasena'])) {
        $_SESSION['user_id'] = $user['id'];
        header('Location: ../index.php');
        exit(); 
    } else {
      $message = 'Usuario o contraseña incorrectos.';
    }
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
    <link rel="stylesheet" href="../css/login.css">
    <!-- Icono de la Pagina -->
    <link rel="icon" sizes="64x64" href="../img/Icono.ico">

</head>
<body>
  
    <header>
        <a href="../index.php"><span>Regresar</span></a>
    </header>
    
    <?php if (!empty($message)) :  ?>
        <p><?= $message ?></p>
    <?php endif; ?>

    <div class="luz-neon">
      <div class="container">
        <div class="logo">
          <img src="../img/Logo.png" alt="logo de ciis GYM">
        </div>
        <div class="title">Inicia Sesión</div>
        <div class="content">
          <form action="login.php" method="post">
            <div class="user-details">
              <div class="input-box">
                <span class="details">Email</span>
                <input type="email" name="txtEmail" placeholder="Ingresa tu email" required>
              </div>
              <div class="input-box">
                <span class="details">Contraseña</span>
                <input type="password" name="txtContrasena" placeholder="Ingresa tu contraseña" required>
              </div>
            </div>
            <div class="button">
              <input type="submit" value="Iniciar Sesión">
            </div>
            <div class="register-link">
                <p>¿No ténes una cuenta? <a href="register.php"><b>Registrate acá</b></a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
</body>
</html>