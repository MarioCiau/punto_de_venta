<?php
require_once 'models/abono.php';
require_once 'models/venta.php';
class abonosController{
    public function index(){

        require_once 'views/abonos/abonar.php';
    }

    public function abonar(){

        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $venta = new Venta();
            $venta->setId($id);
           $ven= $venta->getOne();
        require_once 'views/abonos/abonar2.php';
        }
    }

    public function mis_abonos(){
        if(isset($_GET)){
            $cliente_id=$_GET['cliente_id'];
            $abono = new Abono();

        //Sacar los ventas del usuario
        $abono->setCliente_id($cliente_id);
        $abonos=$abono->getAllByUser();
        }

        require_once 'views/abonos/mis_abonos.php';
    }

    public function abonos_venta(){
        if(isset($_GET)){
            $venta_id=$_GET['venta_id'];
            $abono = new Abono();

        //Sacar los ventas del usuario
        $abono->setVenta_id($venta_id);
        $abonos=$abono->getAllBySale();


        $venta= new Venta();
        $venta->setId($venta_id);
        $ven=$venta->getOne();
        }

        require_once 'views/abonos/historial.php';
    }

    public function gestion(){
        Utils::isAdmin();
        $abono = new  Abono();
        $abonos = $abono->getAll();
        require_once 'views/abonos/gestion.php';
    }

}