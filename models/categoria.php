<?php

class Categoria{
    private $id;
    private $nombre;
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
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $this->db->real_escape_string($nombre);

        return $this;
    }

    public function getAll(){
        $categorias=$this->db->query("SELECT * FROM categorias ORDER BY id DESC");
        return $categorias;
    }

    public function paginacion($offset, $numero_elementos_por_pagina){
        $limiteCategoria = $this->db->query("SELECT * FROM categorias LIMIT $offset, $numero_elementos_por_pagina");
         return $limiteCategoria;
     }
 


    public function getOne(){
        $categoria=$this->db->query("SELECT * FROM categorias WHERE id = {$this->getId()}");
        return $categoria->fetch_object();
    }

    public function save(){
        $sql = "INSERT INTO categorias VALUES(NULL, '{$this->getNombre()}');";
        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result=true;
        }

        return $result;
    }

    public function edit(){
        $sql = "UPDATE categorias SET nombre='{$this->getNombre()}' WHERE id={$this->id};";
        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result=true;
        }

        return $result;
    }

    public function delete(){
        $sql = "DELETE FROM categorias WHERE id = {$this->id}";
        $delete=$this->db->query($sql);

        $result = false;
        if($delete){
            $result=true;
        }

        return $result;
    }
}
?>