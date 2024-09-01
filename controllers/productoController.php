<?php

require_once '../models/producto.php';  
require_once '../models/conexion.php';  

class ProductoController {
    private $db;

    public function __construct() {
        $conexion = new Conexion();
        $this->db = $conexion->getConexion();
    }

    // Crear un nuevo producto
    public function crearProducto($Nombre, $Descripcion, $Precio, $Stock, $ProveedorID, $UsuarioID) {
        $sql = "INSERT INTO productos (Nombre, Descripcion, Precio, Stock, ProveedorID, UsuarioID) 
                VALUES (?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('ssdiis', $Nombre, $Descripcion, $Precio, $Stock, $ProveedorID, $UsuarioID);
        
        return $stmt->execute();
    }

    // Obtener un producto por ID
    public function obtenerProductoPorID($ID, $UsuarioID) {
        $sql = "SELECT * FROM productos WHERE ID = ? AND UsuarioID = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('ii', $ID, $UsuarioID);
        $stmt->execute();
        
        $resultado = $stmt->get_result()->fetch_assoc();
        if ($resultado) {
            return new Producto($resultado['ID'], $resultado['Nombre'], $resultado['Descripcion'], $resultado['Precio'], $resultado['Stock'], $resultado['ProveedorID']);
        }
        
        return null;
    }

    // Actualizar un producto
    public function actualizarProducto($ID, $Nombre, $Descripcion, $Precio, $Stock, $ProveedorID, $UsuarioID) {
        $sql = "UPDATE productos SET Nombre = ?, Descripcion = ?, Precio = ?, Stock = ?, ProveedorID = ? 
                WHERE ID = ? AND UsuarioID = ?";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('ssdiisi', $Nombre, $Descripcion, $Precio, $Stock, $ProveedorID, $ID, $UsuarioID);
        
        return $stmt->execute();
    }

    // Eliminar un producto
    public function eliminarProducto($ID, $UsuarioID) {
        $sql = "DELETE FROM productos WHERE ID = ? AND UsuarioID = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('ii', $ID, $UsuarioID);
        
        return $stmt->execute();
    }
    

    // Obtener todos los productos del usuario
    public function obtenerTodosLosProductos($usuario_id) {
        $sql = "SELECT * FROM productos WHERE UsuarioID = ?";
        $stmt = $this->db->prepare($sql);
        
        if (!$stmt) {
            die("Error en la preparación de la consulta: " . $this->db->error);
        }

        $stmt->bind_param('i', $usuario_id);
        $stmt->execute();
        
        $resultado = $stmt->get_result();

        $productos = [];
        while ($row = $resultado->fetch_assoc()) {
            $productos[] = new Producto($row['ID'], $row['Nombre'], $row['Descripcion'], $row['Precio'], $row['Stock'], $row['ProveedorID']);
        }
        
        $stmt->close();
        return $productos;
    }
}
?>
