<?php
// Conexión a la BD
$conn = mysqli_connect("localhost", "root", "", "hospital"); 

// Recibir datos del formulario usando POST
$nombre = $_POST['nom'];
$apellido = $_POST['ape'];
$correo = $_POST['cor'];
$celular = $_POST['cel'];
$num_seguridad_social = $_POST['nss'];
$tipo_identificacion = $_POST['tid'];
$identificacion = $_POST['id'];
$contraseña = $_POST['con'];

// Verificar si el número de identificación ya existe en la base de datos
$sql_verificar = "SELECT * FROM registros WHERE REG_ID = '$identificacion'";
$resultado_verificar = mysqli_query($conn, $sql_verificar);

if(mysqli_num_rows($resultado_verificar) > 0) {
    // Si el número de identificación ya existe, mostrar un mensaje y evitar la inserción
    echo "Este número de identificación ya está registrado. Por favor, intente con otro número de identificación.";
} else {
    // Si el número de identificación no existe, realizar la inserción en registros
    $sql_insertar_registro = "INSERT INTO registros(REG_NOMBRES, REG_APELLIDOS, REG_CORREO, REG_CELULAR, REG_NUM_SEG, REG_TIPO_ID, REG_ID, REG_CONTRA) 
            VALUES ('$nombre', '$apellido', '$correo', '$celular', '$num_seguridad_social', '$tipo_identificacion', '$identificacion', '$contraseña')";
        
    // Ejecutar la consulta de inserción en registros
    if(mysqli_query($conn, $sql_insertar_registro)){
        // Mostrar mensaje de éxito
        echo "Registro creado con éxito"; 
        
        // Después de crear el registro, insertarlo en la tabla de pacientes
        $sql_insertar_paciente = "INSERT INTO pacientes(reg_id, reg_contra) 
            VALUES ('$identificacion', '$contraseña')";
        
        // Ejecutar la consulta de inserción en pacientes
        if(mysqli_query($conn, $sql_insertar_paciente)){
            // Mostrar mensaje de éxito
            echo "Paciente registrado con éxito"; 
        
            // Redireccionar 
            header("Location: inicio sesion.html");
        } else {
            echo "Error al registrar paciente";
        }
    } else {
        echo "Error al crear el registro";
    }
}
?>
