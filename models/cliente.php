<?php

class Cliente {
    private $ID;
    private $Nombre;
    private $Apellido;
    private $Correo;
    private $Direccion;
    private $Telefono;
    private $UsuarioID;

    public function __construct($ID, $Nombre, $Apellido, $Correo, $Direccion, $Telefono, $UsuarioID) {
        $this->ID = $ID;
        $this->Nombre = $Nombre;
        $this->Apellido = $Apellido;
        $this->Correo = $Correo;
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

    public function getApellido() {
        return $this->Apellido;
    }

    public function getCorreo() {
        return $this->Correo;
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

    public function setApellido($Apellido) {
        $this->Apellido = $Apellido;
    }

    public function setCorreo($Correo) {
        $this->Correo = $Correo;
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
