<?php
$conn = mysqli_connect("localhost", "root", "", "hospital"); 

// Verificar la conexión
if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}

// Obtener los datos del formulario
$usuario = $_POST['reg_id'];
$contraseña = $_POST['reg_contra'];

// Consulta SQL para verificar las credenciales en la base de datos
$sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND contraseña='$contraseña'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Las credenciales son válidas, redirigir al usuario a la página de inicio del paciente
    header("Location: home_paciente.html");
} else {
    // Las credenciales son incorrectas, puedes mostrar un mensaje de error o redirigir a otra página de error
    header("Location: error.html");
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
