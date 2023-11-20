<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link rel="stylesheet" href="inicio_sesion.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="icon" href="🦆 icon _Cardiogram_.png">

</head>
<body>
    
    <div class="wrapper">
        <form action="" method="POST"> 
            <img src="corazon.svg" alt="">
            <h1 >  HOSPITAL</h1>
            <div class="input-box">
                <input type="text"  name="us"   placeholder="Usuario" required>
                <i class="fa-solid fa-user"></i>
        


            </div>
            <div class="input-box">
                <input type="password" name="con"   placeholder="Contraseña" required>
                <i class="fa-solid fa-lock"></i>
            </div>
          

            <div class="remember-forgot">
            <label><input type="checkbox">  Recordar contraseña 
            </label>
            <div class="boton1">
            <a href="restablecer contraseña.html">  ¿olvido su contraseña?</a>
        </div>
        </div>
<div class="contenedor1"> 
    <button id="paginasiguente1" type="submit" class="btn"  onclick="confirmacion()">Ingresar</button>

</div>
        <div class="register-link">
            <p>No tengo una cuenta  <a 
            href="registro.php">Registrarse</a> </p> 
            <script src="script.js"></script>
     
            
        </div>
        </form>

    </div>
</body>
</html>
<?php
// Conexión a la base de datos
$conn = mysqli_connect("localhost", "root", "", "hospital2");

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $usuario = $_POST['us'];
    $contrasena = $_POST['con'];

    // Consultar la tabla de pacientes
    $sqlPacientes = "SELECT * FROM pacientes WHERE REG_ID ='$usuario'";
    $resultPacientes = $conn->query($sqlPacientes);

    // Consultar la tabla de médicos
    $sqlMedicos = "SELECT * FROM medicos WHERE REG_ID ='$usuario'";
    $resultMedicos = $conn->query($sqlMedicos);

    // Iniciar sesión
    session_start();

    // Verificar si el usuario es un paciente
    if ($resultPacientes->num_rows > 0) {
        $row = $resultPacientes->fetch_assoc();
        $contrasenaAlmacenada = $row['reg_contra'];

        if ($contrasena == $contrasenaAlmacenada) {
            // Contraseña verificada correctamente
            $_SESSION['usuario'] = $usuario; // Almacenar el nombre de usuario en la sesión
            header("Location: home_paciente.html");
            exit();
        } else {
            // Contraseña incorrecta
            echo "<script>alert('Contraseña incorrecta.'); window.history.back();</script>";
        }
    } elseif ($resultMedicos->num_rows > 0) {
        // Verificar si el usuario es un médico
        $row = $resultMedicos->fetch_assoc();
        $contrasenaAlmacenada = $row['reg_contra'];

        if ($contrasena == $contrasenaAlmacenada) {
            // Contraseña verificada correctamente
            $_SESSION['usuario'] = $usuario; // Almacenar el nombre de usuario en la sesión
            header("Location: home_doctor.html");
            exit();
        } else {
            // Contraseña incorrecta
            echo "<script>alert('Contraseña incorrecta.'); window.history.back();</script>";
        }
    } else {
        // Usuario no encontrado en ninguna tabla
        echo "<script>alert('Usuario no encontrado.'); window.history.back();</script>";
    }
}
$conn->close();
?>