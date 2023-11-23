<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="perfil.css">
    <link rel="icon" href="🦆 icon _Cardiogram_.png">
</head>
<body>

<?php
$conn = mysqli_connect("localhost", "root", "", "hospital2");
// Iniciar la sesión para acceder a los datos almacenados en $_SESSION
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    // Si no ha iniciado sesión, redirigir a la página de inicio de sesión
    header("Location: inicio.php");
    exit();
}

// Obtener el nombre de usuario de la sesión
$usuario = $_SESSION['usuario'];

// Realizar la consulta para obtener los datos del usuario
$sqlPerfil = "SELECT * FROM registros WHERE REG_ID ='$usuario'";
$resultPerfil = $conn->query($sqlPerfil);

// Verificar si se encontraron datos
if ($resultPerfil->num_rows > 0) {
    $rowPerfil = $resultPerfil->fetch_assoc();

    // Obtener datos del usuario
    $nombre = $rowPerfil['reg_nombres'];
    $apellidos = $rowPerfil['reg_apellidos'];
    $correo = $rowPerfil['reg_correo'];
} else {
    // Manejar el caso en que no se encuentren datos del usuario
    echo "No se encontraron datos del usuario.";
}

?>

<div class="perfil">
    <img src="Perfil (1).png" alt="">
    <div class="frame-10">
        <div class="documents">Documents</div>
    </div>
    <div class="rectangle-10"></div>
    <div class="rectangle-102"></div>
    <div class="frame-23">
        <div class="frame-22">
            <div class="nombre"><?php echo $nombre; ?></div>
            <div class="apellidos"><?php echo $apellidos; ?></div>
            <div class="correo"><?php echo $correo; ?></div>
        </div>
    </div>
    <div class="frame-32">
        <div class="frame-24">
            <img class="home-1" src="inicio.svg" />
            <a href="home_paciente.html" class="inicio" >Inicio</a>
        </div>
        <div class="frame-25">
            <img class="edit-1" src="editar perfil.svg" />
         <a href="editar_perfil.html">Editar Perfil </a>    
    </div>
        <div class="frame-29">
            <img class="info-1" src="sobre nosotros.svg" />
        <a href="sobre_nosotros.html">Sobre Nosotros </a>
        </div>
        <div class="frame-30">
            <img class="contact-2-1" src="contactese con nosotros.svg" />
          <a href="contactenos.html">Contactenos </a>
        </div>
        <div class="frame-31">
            <img class="logout-1" src="cerrarsesion.svg" />
            <a href="bienvenida.html"  class="cerrarsesion "> Cerrar Sesion</a>
        </div>
    </div>
    <img class="image-2" src="image 2.png" />
</div>

</body>
</html>