<?php
$conexion = new mysqli("localhost", "root", "", "tsj_sports");

if ($conexion->connect_error) {
    header("Location: ../dashboard.html");
} else {
    // ✅ Si la conexión fue exitosa, redirige al dashboard
    header("Location: ../dashboard.html");
    exit();
}

// Recibir datos del formulario
$usuario = $_POST['nombre'] ?? '';   // en tu formulario usas name="nombre"
$email   = $_POST['email'] ?? '';
$clave   = password_hash($_POST['password'] ?? '', PASSWORD_DEFAULT);

// Usar sentencia preparada para evitar inyección SQL
$stmt = $conexion->prepare("INSERT INTO usuarios (usuario, email, contrasena) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $usuario, $email, $clave);

if ($stmt->execute()) {
    // Redirige al login después de registrarse
    header("Location: ../index.html");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conexion->close();
?>