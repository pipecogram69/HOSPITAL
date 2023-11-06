<?php

// Conexión a la BD
$conn = mysqli_connect("localhost", "usuario", "contraseña", "basedatos"); 

// Recibir datos del formulario
$nombre = $_POST['nom'];
$apellido = $_POST['ape'];
// (...)

// Query para insertar usuarios
$sql = "INSERT INTO usuarios(nombre, apellido, ...) VALUES ('$nombre', '$apellido', ...)";

// Ejecutar query
if(mysqli_query($conn, $sql)){

 // Mostrar mensaje
 echo "Usuario registrado con éxito"; 
  
 // Esperar 3 segundos
 sleep(3); 
 
 // Redireccionar 
 header("Location: inicio_sesion.html");

} else {

 echo "Error al registrar";

}

// Cerrar conexión
mysqli_close($conn);

?>