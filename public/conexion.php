<?php

    //base de datos
    $servidor = "localhost";
    $basedatos = "hospital";
    $usuario = "root";
    $password = "";

    $conexion = mysql_connect($servidor,$usuario,"") or die ("Error");
    $bd = mysqli_select_db($conexion, $basedatos) or die ("Error");

    $reg_nombres = $_POST['nom'];
    $reg_apellidos = $_POST['ape'];
    $reg_correo  = $_POST['cor'];
    $reg_celular = $_POST['cel'];
    $reg_num_seg = $_POST['nss'];
    $reg_tipo_id = $_POST['tid'];
    $reg_id = $_POST['id'];
    $reg_contra = $_POST['con'];

    $sql ="INSERT INTO registros VALUES ('$reg_nombres', '$reg_apellidos', '$reg_correo', '$reg_celular', '$reg_num_seg', '$reg_tipo_id', '$reg_id', '$reg_contra')"

    $ejecutar=mysql_query($conexion, $sql);
?>