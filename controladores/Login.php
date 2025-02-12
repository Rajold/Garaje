<?php
require_once ("../modelos/Usuarios.php");

if ($_POST) {
    $Usuario = $_POST['usuario'];
    $Password = $_POST['contrasena'];

    $Modelo = new Usuarios();

    if ($Modelo->login($Usuario, $Password)) {
        $perfil= $Modelo->getPerfil();

        if ($perfil== 'admin') {
            echo json_encode(['estado' => 'success', 'perfil'=> 'admin']);
        }else {
            echo json_encode(['estado'=> 'success', 'perfil'=> 'operador']);
        }
    } else {
        echo json_encode(['estado' => 'error']);
    }
}
?>