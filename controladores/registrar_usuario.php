<?php
header("Content-Type: application/json");
require '../app/conexion.php';

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['nombre']) || !isset($data['usuario']) || !isset($data['contrasena']) || !isset($data['perfil']) || !isset($data['estado'])) {
    echo json_encode(["status" => "error", "message" => "Faltan datos"]);
    exit;
}

$nombre = trim($data['nombre']);
$usuario = trim($data['usuario']);
$contrasena = password_hash($data['contrasena'], PASSWORD_BCRYPT); // Encriptar contraseña
$perfil = trim($data['perfil']);
$estado = trim($data['estado']);


try {
    $stmt = $pdo->prepare("INSERT INTO usuarios (nombre, usuario, contrasena, perfil, estado) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$nombre, $usuario, $contrasena, $perfil, $estado]);
    echo json_encode(["status" => "success", "message" => "Usuario registrado con éxito"]);
} catch (PDOException $e) {
    echo json_encode(["status" => "error", "message" => "Error: " . $e->getMessage()]);
}
?>