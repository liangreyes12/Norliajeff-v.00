<?php

class Proveedor {
    private $ID;
    private $Nombre;
    private $Direccion;
    private $Telefono;
    private $UsuarioID;

    public function __construct($ID, $Nombre, $Direccion, $Telefono, $UsuarioID) {
        $this->ID = $ID;
        $this->Nombre = $Nombre;
        $this->Direccion = $Direccion;
        $this->Telefono = $Telefono;
        $this->UsuarioID = $UsuarioID;
    }

    // Getters
    public function getID() {
        return $this->ID;
    }

    public function getNombre() {
        return $this->Nombre;
    }

    public function getDireccion() {
        return $this->Direccion;
    }

    public function getTelefono() {
        return $this->Telefono;
    }

    public function getUsuarioID() {
        return $this->UsuarioID;
    }

    // Setters
    public function setID($ID) {
        $this->ID = $ID;
    }

    public function setNombre($Nombre) {
        $this->Nombre = $Nombre;
    }

    public function setDireccion($Direccion) {
        $this->Direccion = $Direccion;
    }

    public function setTelefono($Telefono) {
        $this->Telefono = $Telefono;
    }

    public function setUsuarioID($UsuarioID) {
        $this->UsuarioID = $UsuarioID;
    }
}
