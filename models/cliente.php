<?php
class Cliente{
    private $id;
    private $nombre;
    private $estado;
    private $localidad;
    private $direccion;
    private $edad;
    private $telefono;

//Conexion base de datos
    private $db;

    public function __construct()
    {
        $this->db=DataBase::connect();
    }
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getNombre()
    {
        return  $this->nombre;
    }


    public function setNombre($nombre)
    {
        $this->nombre = $this->db->real_escape_string($nombre);

        return $this;


    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    public function getLocalidad()
    {
        return $this->localidad;
    }

    public function setLocalidad($localidad)
    {
        $this->localidad = $localidad;

        return $this;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    public function getEdad()
    {
        return $this->edad;

    }

    public function setEdad($edad)
    {
        $this->edad = $edad;

        return $this;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getAll(){
        $clientes = $this->db->query("SELECT * FROM clientes ORDER BY id DESC");
        return $clientes;
    }

    public function paginacion($offset, $numero_elementos_por_pagina){
        $limiteCliente = $this->db->query("SELECT * FROM clientes LIMIT $offset, $numero_elementos_por_pagina");
         return $limiteCliente;
     }


    public function getOne(){
        $cliente = $this->db->query("SELECT * FROM clientes WHERE id = {$this->getId()}");

        return $cliente->fetch_object();
    }

    public function getRandom($limit){
        $clientes= $this->db->query("SELECT * FROM clientes ORDER BY RAND() LIMIT $limit");
        return $clientes;
    }

    public function search(){
        $clientes= $this->db->query("SELECT * FROM clientes WHERE id like {$this->id}");
        return $clientes;
    }

    public function save(){
        $sql = "INSERT INTO clientes VALUES(NULL, '{$this->getNombre()}',  '{$this->getEstado()}', '{$this->getLocalidad()}', '{$this->getDireccion()}', {$this->getEdad()}, '{$this->getTelefono()}', CURDATE());";
        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result=true;
        }

        return $result;
    }

    public function edit(){
        $sql = "UPDATE clientes SET nombre='{$this->getNombre()}', estado='{$this->getEstado()}', localidad='{$this->getLocalidad()}', direccion='{$this->getDireccion()}', edad={$this->getEdad()}, telefono='{$this->getTelefono()}' WHERE id={$this->id};";
        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result=true;
        }

        return $result;
    }

    public function delete(){
        $sql = "DELETE FROM clientes WHERE id = {$this->id}";
        $delete=$this->db->query($sql);

        $result = false;
        if($delete){
            $result=true;
        }

        return $result;
    }

}
?>