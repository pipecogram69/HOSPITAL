<?php
// Conexión a la base de datos
$conn = mysqli_connect("localhost", "root", "", "hospital");

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$usuario = $_POST['us'];
$contrasena = $_POST['con'];

// Consultar la tabla de pacientes
$sqlPacientes = "SELECT * FROM pacientes WHERE REG_ID ='$usuario'";
$resultPacientes = $conn->query($sqlPacientes);

// Consultar la tabla de médicos
$sqlMedicos = "SELECT * FROM medicos WHERE REG_ID ='$usuario'";
$resultMedicos = $conn->query($sqlMedicos);

// Verificar si el usuario es un paciente
if ($resultPacientes->num_rows > 0) {
    $row = $resultPacientes->fetch_assoc();
    $contrasenaAlmacenada = $row['reg_contra'];

    if ($contrasena == $contrasenaAlmacenada) {
        // Contraseña verificada correctamente
        header("Location: home_paciente.html");
        exit();
    } else {
        // Contraseña incorrecta
        echo "Contraseña incorrecta";
    }
} elseif ($resultMedicos->num_rows > 0) {
    // Verificar si el usuario es un médico
    $row = $resultMedicos->fetch_assoc();
    $contrasenaAlmacenada = $row['reg_contra'];

    if ($contrasena == $contrasenaAlmacenada) {
        // Contraseña verificada correctamente
        header("Location: home_doctor.html");
        exit();
    } else {
        // Contraseña incorrecta
        echo "Contraseña incorrecta y/o credenciales incorrectas";
    }
} else {
    // Usuario no encontrado en ninguna tabla
    echo "Usuario no encontrado";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
