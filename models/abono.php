<?php

class Abono{
    private $id;
    private $venta_id;
    private $cliente_id;
    private $monto;
    private $fecha;
    private $hora;
    private $estado;
    private $saldo;
    private $fechaInicial;
    private $fechaFinal;
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

    public function getVenta_id()
    {
        return $this->venta_id;
    }


    public function setVenta_id($venta_id)
    {
        $this->venta_id = $venta_id;

        return $this;
    }

    public function setCliente_id($cliente_id)
    {
        $this->cliente_id = $cliente_id;

        return $this;
    }

    public function getCliente_id()
    {
        return $this->cliente_id;
    }


    public function getMonto()
    {
        return $this->monto;
    }

    public function setMonto($monto)
    {
        $this->monto = $monto;

        return $this;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getHora()
    {
        return $this->hora;
    }

    public function setHora($hora)
    {
        $this->hora = $hora;

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

    public function getSaldo()
    {
        return $this->saldo;
    }

    public function setSaldo($saldo)
    {
        $this->saldo = $saldo;

        return $this;
    }

    public function getFechaInicial()
    {
        return $this->fechaInicial;
    }

    public function setFechaInicial($fechaInicial)
    {
        $this->fechaInicial = $fechaInicial;

        return $this;
    }

    public function getFechaFinal()
    {
        return $this->fechaFinal;
    }

    public function setFechaFinal($fechaFinal)
    {
        $this->fechaFinal = $fechaFinal;

        return $this;
    }

    public function getAll(){
        $abonos = $this->db->query("SELECT * FROM abonos ORDER BY id DESC");

        return $abonos;
    }

    public function getOne(){
        $abono = $this->db->query("SELECT * FROM abonos WHERE id = {$this->getId()}");

        return $abono->fetch_object();
    }


    public function getAllByUser(){
        $sql = "SELECT p.* FROM abonos p "
        . "WHERE p.cliente_id = {$this->getCliente_id()} ORDER BY id DESC";
        $abono = $this->db->query($sql);

        return $abono;
    }

    public function paginacion($offset, $numero_elementos_por_pagina){
        $limiteAbono = $this->db->query("SELECT p.* FROM abonos p WHERE p.cliente_id = {$this->getCliente_id()} ORDER BY id DESC LIMIT $offset, $numero_elementos_por_pagina");
         return $limiteAbono;
     }
    public function getAllBySale(){
        $sql = "SELECT a.* FROM abonos a "
        . "WHERE a.ventas_id = {$this->getVenta_id()} ORDER BY id ASC";
        $abono = $this->db->query($sql);

        return $abono;
    }

    public function getAllByDate(){
        $abono_array = array();

        $abonos = $this->db->query("SELECT * FROM abonos WHERE fecha >= '{$this->getFechaInicial()}' AND fecha <= '{$this->getFechaFinal()}'");
        while($abon = $abonos->fetch_assoc()){
            $abono_array[] = $abon;
        }

        return $abono_array;
    }

    public function save(){
        $sql = "INSERT INTO abonos VALUES(NUll, '{$this->getVenta_id()}',  '{$this->getCliente_id()}', {$this->getMonto()}, CURDATE(), CURTIME(),{$this->getSaldo()} );";
        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result=true;
        }

        return $result;
    }


    public function updateOne(){
         $sql = "UPDATE ventas SET saldo='{$this->getSaldo()}' ";
         $sql .= " WHERE id={$this->getVenta_id()};";
         $save = $this->db->query($sql);

         $result = false;
         if($save){
             $result=true;
         }

         return $result;
     }
}