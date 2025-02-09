<?php
//echo "Archivo de Conexión alcanzado...  ";
class Conexion{
    protected $db;
    private $driver="mysql";
    private $host= "localhost";
    private $bd= "mioPark";
    private $usuario= "root";
    private $contrasena= "";

    public function __construct(){
        try {
            $db= new PDO("{$this->driver}:host={$this->host};dbname={$this->bd}", $this->usuario, $this->contrasena);
            $db->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Base de datos encontrada... ";
            return $db;
        } catch (PDOException $e) {
            echo "Error al conectar". $e->getMessage();
        }
    }
}