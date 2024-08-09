<?php

class Conexion {
    private $host = 'localhost:3307'; // se coloca :3307 por configuracion del xampp @Cristhian
    private $usuario = 'root';
    private $contrasena = '';
    private $base_de_datos = 'Norliajeff';
    private $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->usuario, $this->contrasena, $this->base_de_datos);
        if ($this->conn->connect_error) {
            die("Error de conexión: " . $this->conn->connect_error);
        }
    }

    public function getConexion() {
        return $this->conn;
    }

    public function cerrarConexion() {
        $this->conn->close();
    }
}

?>
