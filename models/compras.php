<?php
class Compra {
    private $id;
    private $fecha;
    private $total;
    private $cantidad;
    private $precio;
    private $productoID;
    private $usuarioID;
    private $proveedorID;

    public function __construct($id, $fecha, $total, $cantidad, $precio, $productoID, $usuarioID, $proveedorID) {
        $this->id = $id;
        $this->fecha = $fecha;
        $this->total = $total;
        $this->cantidad = $cantidad;
        $this->precio = $precio;
        $this->productoID = $productoID;
        $this->usuarioID = $usuarioID;
        $this->proveedorID = $proveedorID;
    }

    public function getID() {
        return $this->id;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getTotal() {
        return $this->total;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getProductoID() {
        return $this->productoID;
    }

    public function getUsuarioID() {
        return $this->usuarioID;
    }

    public function getProveedorID() {
        return $this->proveedorID;
    }
}
?>
