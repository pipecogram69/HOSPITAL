<?php
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
$sql_verificar = "SELECT * FROM registros WHERE reg_id = '$identificacion'";
$resultado_verificar = mysqli_query($conn, $sql_verificar);

if(mysqli_num_rows($resultado_verificar) > 0) {
    // Si el número de identificación ya existe, mostrar un mensaje y evitar la inserción
    echo "<script>alert('Este número de identificación ya está registrado. Por favor, intente con otro número de identificación.'); window.history.back();</script>";
} else {
    // Verificar requisitos de la contraseña
    if (strlen($contraseña) < 8 || !preg_match("/[A-Z]/", $contraseña) || !preg_match("/[!@#$%^&*(),.?\":{}|<>]/", $contraseña)) {
        // Si la contraseña no cumple con los requisitos, mostrar un mensaje de error
        echo "<script>alert('La contraseña debe tener al menos 8 caracteres, una letra mayúscula y un carácter especial.'); window.history.back();</script>";
    } else {
        // Si el número de identificación no existe y la contraseña cumple con los requisitos, realizar la inserción en registros
        $sql_insertar_registro = "INSERT INTO registros(reg_nombres, reg_apellidos, reg_correo, reg_celular, reg_num_seg, reg_tipo_id, reg_id, reg_contra) 
                VALUES ('$nombre', '$apellido', '$correo', '$celular', '$num_seguridad_social', '$tipo_identificacion', '$identificacion', '$contraseña')";
            
        // Ejecutar la consulta de inserción en registros
        if(mysqli_query($conn, $sql_insertar_registro)){
            // Mostrar mensaje de éxito
            echo "<script>alert('Registro creado con éxito'); window.location.href = 'nombre_de_la_pagina_actual.php';</script>"; 
        
            // Después de crear el registro, insertarlo en la tabla de pacientes
            $sql_insertar_paciente = "INSERT INTO pacientes(reg_id, reg_contra) 
                VALUES ('$identificacion', '$contraseña')";
            
            // Ejecutar la consulta de inserción en pacientes
            if(mysqli_query($conn, $sql_insertar_paciente)){
                // Mostrar mensaje de éxito
                // echo "<script>alert('Paciente registrado con éxito');</script>"; 
            
                // Redireccionar 
                header("Location: inicio sesion.html");
            } else {
                //echo "Error al registrar paciente";
            }
        } else {
            //echo "Error al crear el registro";
        }
    }
}
?>
