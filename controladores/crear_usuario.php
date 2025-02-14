<?php
require_once('../modelos/Usuarios.php');

if ($_POST) {
  $Nombre = $_POST['nombre'];
  $Usuario = $_POST['usuario'];
  $Contrasena = $_POST['contrasena'];
  $Perfil = $_POST['perfil'];
  $Estado = $_POST['estado'];

  $ModeloUsuarios = new Usuarios();
  if ($ModeloUsuarios->add($Nombre, $Usuario, $Contrasena, $Perfil, $Estado)) {
    echo json_encode(['estado' => 'success']);
  } else {
    echo json_encode(['estado' => 'error']);
  }
} else {
  header('location:../../index.php');
}
?>