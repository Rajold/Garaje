<?php
require_once('../modelos/Usuarios.php');

if ($_POST) {
  $Nombre = $_POST['nombre'];
  $Usuario = $_POST['usuario'];
  $Contrasena = $_POST['contrasena'];
  $Perfil = $_POST['perfil'];
  $Estado = $_POST['estado'];

  $ModeloUsuarios = new Usuarios();

  $statement= $ModeloUsuarios-> db-> prepare("SELECT * FROM usuarios WHERE usuario= :Usuario");
  $statement-> bindParam(":Usuario", $Usuario);
  $statement-> execute();

  if ($statement-> rowCount() > 0) {
    echo json_encode(['estado'=> 'El usuarios ya existe']);
  }else {    
    if ($ModeloUsuarios->add($Nombre, $Usuario, $Contrasena, $Perfil, $Estado)) {
      echo json_encode(['estado' => 'success', 'mensaje'=> 'Usuario agregado']);
    } else {
      echo json_encode(['estado' => 'error', 'mensaje'=> 'Error al agregar usuario']);
      }
      }
  }
  
?>