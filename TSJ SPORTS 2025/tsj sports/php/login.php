<?php
$conexion = new mysqli("localhost", "root", "", "tsj_sports");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$correo = $_POST['email'] ?? '';
$clave = $_POST['password'] ?? '';

$sql = "SELECT * FROM usuarios WHERE correo = '$correo'";
$resultado = $conexion->query($sql);

if ($resultado->num_rows === 1) {
    $usuario = $resultado->fetch_assoc();
    if (password_verify($clave, $usuario['contraseña'])) {
        header("Location: ../Animated Login and Signup Form Leaf/tsj sports/index.html"); // Cambia a la ruta que necesites
        exit();
    } else {
        echo "Contraseña incorrecta.";
    }
} else {
    echo "Usuario no encontrado.";
}

$conexion->close();
?>
