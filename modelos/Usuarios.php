<?php
require_once("../app/conexion.php");
session_start();

class Usuarios extends Conexion{
    public function __construct(){
        $this->db= parent:: __construct();
    }

    public function Saludar(){
        echo "Hello moto";
    }

    public function login($Usuario, $Password){
        //echo "Método login alcanzado... ";
    
        $statement=$this->db->prepare("SELECT* FROM usuarios WHERE usuario=:Usuario AND contrasena=:Password");
        $statement-> bindParam(":Usuario", $Usuario);
        $statement-> bindParam(":Password", $Password);
        $statement-> execute();
        if ($statement-> rowCount()== 1) {
            $result= $statement-> fetch();
            $_SESSION["NOMBRE"]= $result["nombre"];
            $_SESSION["ID"]= $result["id_usuario"];
            $_SESSION["PERFIL"]= $result["perfil"];
            //echo "Datos de Usuario encontrados";
            return true;
        }
        //echo "Datos de Usuarios no encontrados";
        return false;
    }

    public function getNombre(){
        return $_SESSION["NOMBRE"];
    }

    public function getId(){
        return $_SESSION["ID"];
    }

    public function getPerfil(){
        return $_SESSION["PERFIL"];
    }

    public function validateSesion(){
        if($_SESSION["ID"]== null){
            header("Location: ../../index.php");
        }
    }

    public function validateSesionAdmin(){
        if($_SESSION["ID"]!= null){
            if($_SESSION["PERFIL"]== "Docente"){
            header("Location: ../../Administradores/Pages/index.php");
            }
        }
    }

    public function salir(){
        $_SESSION['ID']= null;
        $_SESSION['NOMBRE']= null;
        $_SESSION['PERFIL']= null;
        session_destroy();
        header('location: ../../index.php');
    }

    public function add(
    $Nombre, 
    $Usuario,
    $Contrasena,
    $Perfil,
    $Estado){
        $statement= $this-> db-> prepare("INSERT INTO usuarios (nombre, usuario, contrasena, perfil, estado) 
        VALUES (:Nombre, :Usuario, :Contrasena, :Perfil, :Estado)");

        $statement-> bindParam(":Nombre", $Nombre);
        $statement-> bindParam(":Usuario", $Usuario);
        $statement-> bindParam(":Contrasena", $Contrasena);
        $statement-> bindParam(":Perfil", $Perfil);
        $statement-> bindParam(":Estado", $Estado);
        if ($statement-> execute()) {
            return true;
        }else {
            return false;
        }
    }

}

?>