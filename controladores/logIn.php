<?php
require_once('../app/conexion.php');
$Conexion= new Conexion();

if (isset($_POST['usuario']) && isset($_POST['contrasena'])) {
    $usuario= $_POST['usuario'];
    $contrasena= $_POST['contrasena'];
    
    $consultaSql= "SELECT usuario, contrasena FROM usuarios 
WHERE usuario= '$usuario' and contrasena= '$contrasena'";

$resultado= $Conexion-> query($consultaSql);

echo $resultado-> num_rows;
}

?>