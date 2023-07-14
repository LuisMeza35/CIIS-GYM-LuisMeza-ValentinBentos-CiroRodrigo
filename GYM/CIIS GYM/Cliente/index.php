<!-- PHP -->
<?php

session_start();

include("../Administrativo/php/conexion.php");

if( isset($_SESSION['user_id'])) {
    $sentenciaSQL = $conexion->prepare("SELECT id, email, contrasena FROM cliente WHERE id=:id");
    $sentenciaSQL->bindParam(':id', $_SESSION['user_id']);
    $sentenciaSQL->execute();
    $cuenta = $sentenciaSQL->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if(count($cuenta) > 0) {
        $user = $cuenta;
    }

    if (!isset($_SESSION['user_id'])) {
        header("Location: ../index.php");
        session_destroy();
        exit;
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
    <title>CIIS GYM</title>

    <!-- Icono de la Pagina -->
    <link rel="icon" sizes="64x64" href="img/Icono.ico">
    
    <!-- Linkeado a CSS -->
    <link rel="stylesheet" href="index.css">

    <!-- Linkeado de Box Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Css Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  
</head>

<body>
    <!-- HEADER -->
    <div class="contenedor-header">
        <header>
            <h1>CIIS <span class="txtCeleste">GYM</span></h1>
            <nav id="nav">
                <a href="#carouselExampleCaptions">Inicio</a>
                <a href="#seccion-equipo">Nosotros</a>
                <a href="#seccion-planes">Planes</a>
                <a href="#seccion-rutinas">Rutinas</a>
                <a href="html/diadeprueba.php">Dia de Prueba</a>

                <!-- Cerrar Sesion -->
                <?php if(!empty($user)): ?>
                    <a href="html/logout.php">Cerrar Sesion</a>
                
                <!-- INICIAR SESION O REGISTRARSE -->
                <?php else: ?>
                    <a href="html/login.php"> Iniciar Sesión </a>
                    <a href="html/register.php"> Registrarme </a>
                <?php endif; ?>

                <a href="#direccion-footer">Contactanos</a>
            </nav>

            <div class="noche-dia">
                <input id="item-cambio" type="checkbox" onclick="enableDarkMode()">
            </div>

        </header>
    </div>

    <!-- Fondo Header -->
    <div class="fondo-header"></div>
    
    <!-- Carrusel de Boostrap -->
    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">

          
            <div class="carousel-item active">
                <img src="img/slade1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>
         
            <div class="carousel-item">
                <img src="img/slade2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>
           
            <div class="carousel-item">
                <img src="img/slade3.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
    </div> 
    <br>
    <br>
    <!-- SECCION GRUPO DE TRABAJO-->
    <div class="seccion-equipo" id="seccion-equipo">
        <div class="contenedor-titulo">
            <div class="numero">
                01
            </div>
            <div class="info">
                <span class="frase">LOS MEJORES</span>
                <H2>ENTRENADORES</H2>
            </div>
        </div>
    </div>
    <section id="equipo" class="equipo">
            <div class="fila">
                <div class="col">
                    <img src="img/Profesor Lucas.png" alt="">
                    <div class="info">
                        <h2>LUCAS</h2>
                        <p>Fitnness - Pilates - Yoga</p>
                        <a href="#"></a>
                        <a href="#"></a>
                    </div>
                </div>
                
                <div class="col">
                    <img src="img/Profesora Luna.png" alt="">
                    <div class="info">
                        <h2>LUNA</h2>
                        <p>Fitnness - Pilates - Yoga</p>
                        <a href="#"></a>
                        <a href="#"></a>
                    </div>
                </div>
                
                <div class="col">
                    <img src="img/Profesor Facundo.png" alt="">
                    <div class="info">
                        <h2>FACUNDO</h2>
                        <p>Fitnness - Pilates - Yoga</p>
                        <a href="#"></a>
                        <a href="#"></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br>

    <!-- SECCION DE PLANES GIMNASIOS -->
    <div class="seccion-planes" id="seccion-planes">
        <div class="contenedor-titulo">
            <div class="numero">
                02 
            </div>
            <div class="info">
                <span class="frase">LA MEJORES PLANES</span>
                <H2>EN UN SOLO LUGAR</H2>
            </div>
        </div>
    </div>
    <br>
    <section class="planes" id="planes">
        
        <div class="plan-basico">
            <h3>PLAN BASICO</h3>
            <div class="precio"><span>$</span>4500<span>/ars</span></div>
        <div class="list">
            <p> <i class='bx bx-check'></i> LIBRE ACCESO  </p>
            <p> <i class='bx bx-check'></i> PERSONAL TRAINER </p>
            <p> <i class='bx bx-x'></i> SEGUIMIENTO DINAMICO </p>
            <p> <i class='bx bx-x'></i> 5 INVITACIONES MENSUALES</p>
            <p> <i class='bx bx-x'></i> SILLONES DE MASAJE</p>
        </div>
        <a href="#" class="btn">Inscribirme</a>
        </div>

        <div class="plan-platino">
            <h3>PLAN PLATINO</h3>
            <div class="precio"><span>$</span>5000<span>/ars</span></div>
        <div class="list">
            <p> <i class='bx bx-check'></i> LIBRE ACCESO </p>
            <p> <i class='bx bx-check'></i> PERSONAL TRAINER </p>
            <p> <i class='bx bx-check'></i> SEGUIMIENTO DINAMICO </p>
            <p> <i class='bx bx-x'></i> 5 INVITACIONES MENSUALES</p>
            <p> <i class='bx bx-x'></i> SILLONES DE MASAJE</p>
        </div>
        <a href="#" class="btn">Inscribirme</a>
        </div>

        <div class="plan-platino">
            <h3>PLAN PLATINO</h3>
            <div class="precio"><span>$</span>5000<span>/ars</span></div>
        <div class="list">
            <p> <i class='bx bx-check'></i> LIBRE ACCESO </p>
            <p> <i class='bx bx-check'></i> PERSONAL TRAINER </p>
            <p> <i class='bx bx-check'></i> SEGUIMIENTO DINAMICO </p>
            <p> <i class='bx bx-check'></i> 5 INVITACIONES MENSUALES</p>
            <p> <i class='bx bx-check'></i> SILLONES DE MASAJE</p>
        </div>
        <a href="#" class="btn">Inscribirme</a>
        </div>
    </section>
    <br>
    <br>
    <!-- SECCION RUTINAS -->
    <div class="seccion-planes" id="seccion-rutinas">
        <div class="contenedor-titulo">
            <div class="numero">
                03
            </div>
            <div class="info">
                <span class="frase">LAS MEJORES RUTINAS</span>
                <H2>EN UN SOLO LUGAR</H2>
            </div>
        </div>
    </div>
    <section class="tienda" id="tienda"> 
        <div class="row">
            <div class=" col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card">
                    <a href="html/rutinas/pecho.php"><img src="img/pechos.jpg" alt="PECHOS"></a>
                    <br>
                    <button class="btn btn-primary">PECHO</button>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card">
                    <a href="html/rutinas/brazos.php"><img src="img/brazos.jpg" alt="BRAZOS"></a>
                    <br>
                    <button class="btn btn-primary">BRAZOS</button>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                <div class="card">
                    <a href="html/rutinas/espalda.php"><img src="img/espalda.jpg" alt="ESPALDA"></a>
                    <br>
                    <button class="btn btn-primary">ESPALDA</button>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                <div class="card">
                    <a href="html/rutinas/piernas.php"><img src="img/piernas.jpg" alt="PIERNAS"></a>
                    <br>
                    <button class="btn btn-primary">PIERNAS</button>
                </div>            
            </div>
        </div>
    </section>
    <br>
    <br>
    <br>
    <br>
    <!-- FOOTER -->
    <footer class="footer" id="direccion-footer">
  	 <div class="container">
  	 	<div class="row">
  	 		<div class="footer-columnas">
  	 			<h4>Nosotros</h4>
  	 			<ul>
  	 				<li><a href="#seccion-equipo">Profesores</a></li>
  	 				<li><a href="#seccion-planes">Planes</a></li>
  	 				<li><a href="#seccion-rutina">Rutinas</a></li>
  	 				<li><a href="#">Inscribirme</a></li>
  	 			</ul>
  	 		</div>
            <div class="footer-columnas">
  	 			<h4>Información</h4>
  	 			<ul>
  	 				<li><a href="#">Ubicación</a></li>
  	 				<li><a href="#">Horario</a></li>
  	 				<li><a href="#">Celular</a></li>
  	 				<li><a href="#">Formas de pago</a></li>
  	 			</ul>
  	 		</div>
  	 		<div class="footer-columnas">
  	 			<h4>Tienda Online</h4>
  	 			<ul>
  	 				<li><a href="#">Remeras</a></li>
  	 				<li><a href="#">Pantalones Cortos</a></li>
  	 				<li><a href="#">Pantalones Largos</a></li>
  	 				<li><a href="#">Suplementos</a></li>
  	 			</ul>
  	 		</div>
  	 		<div class="footer-columnas">
  	 			<h4>Redes Sociales</h4>
  	 			<div class="social-links">
  	 				<a href="#"><i class='bx bxl-facebook-circle' ></i></a>
  	 				<a href="#"><i class='bx bxl-twitter' ></i></a>
  	 				<a href="#"><i class='bx bxl-instagram-alt' ></i></a>
  	 				<a href="#"><i class='bx bxs-envelope' ></i></a>
  	 			</div>
  	 		</div>
  	 	</div>
  	 </div>
  </footer>

    <!-- Link a JavaScript -->
    <script src="js/main.js"></script>

    <!-- Bootstrap Js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>