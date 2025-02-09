<?php
require_once ("../modelos/Usuarios.php");

if ($_POST) {
    $Usuario = $_POST['usuario'];
    $Password = $_POST['contrasena'];

    $Modelo = new Usuarios();

    if ($Modelo->login($Usuario, $Password)) {
        echo json_encode(['estado' => 'success']);
    } else {
        echo json_encode(['estado' => 'error']);
    }
}else {
    header('location: ../index.html');
}
?>