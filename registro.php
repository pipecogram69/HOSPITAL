<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="registro.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="icon" href="🦆 icon _Cardiogram_.png">
</head>
<body>
    
    <div class="wrapper">
        <form action="" method="POST">
            <img src="corazon.svg" alt="">
            <h1> HOSPITAL </h1>
            <div class="input-box">
                <input type="text" name="nom" placeholder="Nombres" required>
                <i class="fa-solid fa-signature"></i>
            </div>

            <div class="input-box">
                <input type="text" name="ape" placeholder="Apellidos" required> <!-- Cambiado de 'id' a 'name' -->
                <i class="fa-solid fa-otter"></i>          
            </div>

            <div class="input-box">
                <input type="text" name="cor" placeholder="Correo electronico" required>
                <i class="fa-solid fa-envelope"></i>
                </div>
    
    
                <div class="input-box">
                <input type="number" name="cel" placeholder="Celular" required>
                <i class="fa-solid fa-mobile-retro"></i>
                </div>
    
                <div class="input-box">
                <input type="text" name="nss" placeholder="Número de Seguridad Social" required>
                <i class="fa-solid fa-hashtag"></i>
                </div>
    
                <div class="input-box">
                <input type="text" name="tid" placeholder="Tipo de identificación " required>
                <i class="fa-solid fa-address-card"></i>
                </div>
    
                <div class="input-box">
                <input type="number" name="id" placeholder="Numero de identificación " required>
                <i class="fa-solid fa-address-card"></i>
                </div>
    
                <div class="input-box">
                <input type="password"  name="con" placeholder="Contraseña" required>
                <i class="fa-regular fa-calendar-days"></i>
                </div>

            <button id="paginasiguente1" type="submit" class="btn" onclick="confirmacion()">Registrarse!</button>
        
            <div class="register-link">
                <p>Ya tengo una cuenta <a href="inicio.php">Iniciar sesión</a></p> 
            </div>
        </form>
    </div>
</body>
</html>

<?php
$conn = mysqli_connect("localhost", "root", "", "hospital2"); 

if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nom'];
    $apellido = $_POST['ape'];
    $correo = $_POST['cor'];
    $celular = $_POST['cel'];
    $num_seguridad_social = $_POST['nss'];
    $tipo_identificacion = $_POST['tid'];
    $identificacion = $_POST['id'];
    $contraseña = $_POST['con'];

    $sql_verificar = "SELECT * FROM registros WHERE reg_id = '$identificacion'";
    $resultado_verificar = mysqli_query($conn, $sql_verificar);

    if(mysqli_num_rows($resultado_verificar) > 0) {
        echo "<script>alert('Este número de identificación ya está registrado. Por favor, intente con otro número de identificación.'); window.history.back();</script>";
    } else {
        if (strlen($contraseña) < 8 || !preg_match("/[A-Z]/", $contraseña) || !preg_match("/[!@#$%^&*(),.?\":{}|<>]/", $contraseña)) {
            echo "<script>alert('La contraseña debe tener al menos 8 caracteres, una letra mayúscula y un carácter especial.'); window.history.back();</script>";
        } else {
            $sql_insertar_registro = "INSERT INTO registros(reg_nombres, reg_apellidos, reg_correo, reg_celular, reg_num_seg, reg_tipo_id, reg_id, reg_contra) 
                VALUES ('$nombre', '$apellido', '$correo', '$celular', '$num_seguridad_social', '$tipo_identificacion', '$identificacion', '$contraseña')";
            
            if(mysqli_query($conn, $sql_insertar_registro)){
                echo "<script>alert('Registro creado con éxito'); window.location.href = 'nombre_de_la_pagina_actual.php';</script>"; 

                $sql_insertar_paciente = "INSERT INTO pacientes (reg_nombres, reg_apellidos, reg_correo, reg_celular, reg_num_seg, reg_tipo_id, reg_id, reg_contra)
                    VALUES ('$nombre', '$apellido', '$correo', '$celular', '$num_seguridad_social', '$tipo_identificacion', '$identificacion', '$contraseña')";
                
                if(mysqli_query($conn, $sql_insertar_paciente)){
                    header("Location: inicio.php");
                }
            } else {
                echo "Error al crear el registro: " . mysqli_error($conn);
            }
        }
    }
}

mysqli_close($conn);
?>
