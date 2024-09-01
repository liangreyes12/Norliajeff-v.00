<?php

class Venta {
    private $ID;
    private $Fecha;
    private $Total;
    private $Cantidad;
    private $Precio;
    private $ProductoID;
    private $UsuarioID;
    private $ClienteID;

    public function __construct($ID, $Fecha, $Total, $Cantidad, $Precio, $ProductoID, $UsuarioID, $ClienteID) {
        $this->ID = $ID;
        $this->Fecha = $Fecha;
        $this->Total = $Total;
        $this->Cantidad = $Cantidad;
        $this->Precio = $Precio;
        $this->ProductoID = $ProductoID;
        $this->UsuarioID = $UsuarioID;
        $this->ClienteID = $ClienteID;
    }

    // Getters
    public function getID() {
        return $this->ID;
    }

    public function getFecha() {
        return $this->Fecha;
    }

    public function getTotal() {
        return $this->Total;
    }

    public function getCantidad() {
        return $this->Cantidad;
    }

    public function getPrecio() {
        return $this->Precio;
    }

    public function getProductoID() {
        return $this->ProductoID;
    }

    public function getUsuarioID() {
        return $this->UsuarioID;
    }

    public function getClienteID() {
        return $this->ClienteID;
    }

    // Setters
    public function setID($ID) {
        $this->ID = $ID;
    }

    public function setFecha($Fecha) {
        $this->Fecha = $Fecha;
    }

    public function setTotal($Total) {
        $this->Total = $Total;
    }

    public function setCantidad($Cantidad) {
        $this->Cantidad = $Cantidad;
    }

    public function setPrecio($Precio) {
        $this->Precio = $Precio;
    }

    public function setProductoID($ProductoID) {
        $this->ProductoID = $ProductoID;
    }

    public function setUsuarioID($UsuarioID) {
        $this->UsuarioID = $UsuarioID;
    }

    public function setClienteID($ClienteID) {
        $this->ClienteID = $ClienteID;
    }
}
