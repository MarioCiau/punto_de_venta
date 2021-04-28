<?php
require_once ('../models/cliente.php');
require_once ('../models/producto.php');
require_once ('../models/venta.php');
require ('../config/db.php');
session_start();

if(isset($_POST['search'])){
            $search = $_POST['search'];
            $cliente = new Cliente();
            $cliente->setId($search);
            $searched=$cliente->search();

            if($searched && $searched->num_rows > 0){
                $json = array();
            while($row = $searched->fetch_assoc()){
                $json[]=array(
                    'id'=>$row['id'],
                    'nombre'=>$row['nombre'],
                    'telefono'=>$row['telefono'],
                    'direccion'=>$row['direccion']
                );
            }
            $json_string = json_encode($json);
            echo $json_string;
            }else{
                echo '404';
            }
}


if(isset($_POST['busqueda'])){
    $busqueda = $_POST['busqueda'];
    $producto = new Producto();
    $producto->setNombre($busqueda);
    $searched=$producto->busqueda();

    if($searched && $searched->num_rows > 0){
        $json = array();
    while($row = $searched->fetch_assoc()){
        $json[]=array(
            'id'=>$row['id'],
            'nombre'=>$row['nombre'],
            'precio'=>$row['precio'],
            'stock'=>$row['stock']
        );
    }
    $json_string = json_encode($json);
    echo $json_string;
    $_SESSION['busquedaProductos']='complete';
    }else{
        echo '404';
    }
}


if(isset($_POST['product'])){
    $product = $_POST['product'];
    $producto = new Producto();
    $producto->setId($product);
    $searched=$producto->search();

    if($searched && $searched->num_rows > 0){
        $json = array();
    while($row = $searched->fetch_assoc()){
        $json[]=array(
            'id'=>$row['id'],
            'nombre'=>$row['nombre'],
            'precio'=>$row['precio'],
            'stock'=>$row['stock']
        );
    }
    $json_string = json_encode($json);
    echo $json_string;
    }else{
        echo '404';
    }
}


if(isset($_POST['id'])){
    $ventaId = $_POST['id'];
    $venta = new Venta();
    $data_cliente_productos = $venta->facturaVenta($ventaId);
    $_SESSION['resultado'] = $data_cliente_productos;
    echo '202';
}

if(isset($_POST['id2'])){
    $ventaId = $_POST['id2'];
    $venta = new Venta();
    $data_cliente_productos = $venta->facturaVenta($ventaId);
    $_SESSION['abonos'] = $data_cliente_productos;
    echo '202';
}

if(isset($_POST['venta'])){
    $sale = $_POST['venta'];
    $venta = new Venta();
    $venta->setId($sale);
    $searched=$venta->search();

    if($searched && $searched->num_rows > 0){
        $json = array();
    while($row = $searched->fetch_assoc()){
        $json[]=array(
            'id'=>$row['id'],
            'cliente_id'=>$row['cliente_id'],
            'total'=>$row['total'],
            'fecha'=>$row['fecha'],
            'enganche'=>$row['enganche'],
            'saldo'=>$row['saldo']
        );
    }
    $json_string = json_encode($json);
    echo $json_string;
    }else{
        echo '404';
    }
}



?>