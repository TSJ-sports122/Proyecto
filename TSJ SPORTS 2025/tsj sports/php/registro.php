<?php
$conexion = new mysqli("localhost", "root", "", "tsj_sports");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$nombre = $_POST['nombre'] ?? '';
$correo = $_POST['email'] ?? '';
$clave = password_hash($_POST['password'] ?? '', PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios (nombre, correo, contraseña) VALUES ('$nombre', '$correo', '$clave')";

if ($conexion->query($sql) === TRUE) {
    header("Location: ../Animated Login and Signup Form Leaf/tsj sports/index.html"); // Cambia esto a tu página final
    exit();
} else {
    echo "Error: " . $conexion->error;
}

$conexion->close();
?>
