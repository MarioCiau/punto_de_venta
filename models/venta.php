<?php

class Venta{
    private $id;
    private $cliente_id;
    private $tipo;
    private $total;
    private $enganche;
    private $saldo;
    private $fecha;
    private $hora;
    private $estado;
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

    public function getCliente_id()
    {
        return $this->cliente_id;
    }

    public function setCliente_id($cliente_id)
    {
        $this->cliente_id = $cliente_id;

        return $this;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    public function getEnganche()
    {
        return $this->enganche;
    }

    public function setEnganche($enganche)
    {
        $this->enganche = $enganche;

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

    public function search(){
        $venta= $this->db->query("SELECT * FROM ventas WHERE id like {$this->id}");
        return $venta;
    }

    public function getAll(){
        $ventas = $this->db->query("SELECT * FROM ventas ORDER BY id DESC");

        return $ventas;
    }

    public function paginacion($offset, $numero_elementos_por_pagina){
        $limiteVenta = $this->db->query("SELECT * FROM ventas LIMIT $offset, $numero_elementos_por_pagina");
         return $limiteVenta;
     }

     public function paginacion2($offset, $numero_elementos_por_pagina){
        $limiteVenta2 = $this->db->query("SELECT p.* FROM ventas p WHERE p.cliente_id = {$this->getCliente_id()} ORDER BY id DESC LIMIT $offset, $numero_elementos_por_pagina");
         return $limiteVenta2;
     }

    public function getOne(){
        $venta = $this->db->query("SELECT * FROM ventas WHERE id = {$this->getId()}");

        return $venta->fetch_object();
    }

    public function getOneByUser(){
        $sql = "SELECT v.id, v.saldo, v.tipo, v.enganche FROM ventas v "
        //."INNER JOIN lineas_pedido lp ON lp.pedido_id = p.id "
        ."WHERE v.cliente_id = {$this->getCliente_id()} ORDER BY id DESC LIMIT 1";
        $venta = $this->db->query($sql);

        return $venta->fetch_object();
    }

    public function getAllByUser(){
        $sql = "SELECT p.* FROM ventas p "
        . "WHERE p.cliente_id = {$this->getCliente_id()} ORDER BY id DESC";
        $venta = $this->db->query($sql);

        return $venta;
    }

    public function getAllByDate(){
        $ventas = $this->db->query("SELECT * FROM ventas WHERE fecha >= '{$this->getFechaInicial()}' AND fecha <= '{$this->getFechaFinal()}'");

        return $ventas;
    }

    public function getProductosByPedido($id){
        //$sql = "SELECT * FROM productos WHERE id IN"
        //."(SELECT producto_id FROM lineas_pedidos WHERE pedido_id={$id})";

        $sql= "SELECT pr.*, lp.unidades FROM productos pr "
        ."INNER JOIN lineas_ventas lp ON pr.id = lp.producto_id "
        ."WHERE lp.venta_id={$id}";

        $productos = $this->db->query($sql);

        return $productos;
    }

    public function save(){
        $sql = "INSERT INTO ventas VALUES(NUll, '{$this->getCliente_id()}', '{$this->getTipo()}', {$this->getTotal()}, {$this->getEnganche()}, {$this->getSaldo()}, CURDATE(), CURTIME(), '{$this->getEstado()}');";
        $save = $this->db->query($sql);
        $result = false;
        if($save){
            $result=true;
        }

        return $result;
    }

    public function save_linea(){
        $sql= "SELECT LAST_INSERT_ID() as 'venta';";
        $query = $this->db->query($sql);

        $venta_id= $query->fetch_object()->venta;

        foreach($_SESSION['carrito'] as $elemento){
        $producto = $elemento['producto'];

        $insert = "INSERT INTO lineas_ventas VALUES(NULL, {$venta_id}, {$producto->id}, {$elemento['unidades']})";
        $save= $this->db->query($insert);

        if($save){
            $unidades_vendidas =$elemento['unidades'];
            $id_Producto = $producto->id;
            $stock = (int) $producto->stock;

            $nuevo_stock = $stock - $unidades_vendidas;
            $sql = "UPDATE `productos` SET `stock`= $nuevo_stock WHERE id = $id_Producto";
            $save = $this->db->query($sql);
        }
        }

        $result = false;
        if($save){
            $result=true;
        }

        return $result;

    }


    public function updateOne(){
         $sql = "UPDATE ventas SET estado='{$this->getEstado()}' ";
         $sql .= " WHERE id={$this->getId()};";
         $save = $this->db->query($sql);

         $result = false;
         if($save){
             $result=true;
         }

         return $result;
     }

     public function discount(){
        $sql = "UPDATE ventas SET saldo={$this->getSaldo()} ";
        $sql .= " WHERE id={$this->getId()};";
        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result=true;
        }

        return $result;
    }

    public function facturaVenta($id_venta){

        $data = array();

        $sql = "SELECT ventas.id, ventas.tipo, ventas.enganche, ventas.saldo, ventas.fecha, ventas.hora, ventas.estado, clientes.nombre AS 'nombreCliente', clientes.localidad, clientes.estado AS 'lugar', clientes.direccion, clientes.edad, clientes.telefono FROM ventas";
        $sql.= " INNER JOIN lineas_ventas ON ventas.id=lineas_ventas.venta_id";
        $sql.= " INNER JOIN clientes ON ventas.cliente_id = clientes.id";
        $sql.= " WHERE ventas.id = $id_venta";

        $respuesta = $this->db->query($sql);

        $data[] = $respuesta->fetch_assoc();

        $sql = "SELECT * FROM lineas_ventas INNER JOIN productos ON lineas_ventas.producto_id = productos.id WHERE lineas_ventas.venta_id = $id_venta";
        $productosInformacion = $this->db->query($sql);

        while ($producto = $productosInformacion->fetch_assoc()){
           $data[] = $producto;
        }
        return $data;
    }

}