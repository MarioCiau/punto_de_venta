<?php
require_once ('../models/abono.php');
require_once ('../models/venta.php');
require ('../config/db.php');



if(isset($_POST['fechaIni']) & isset($_POST['fechaFin'])){
    $fechaInicial = $_POST['fechaIni'];
    $fechaFinal = $_POST['fechaFin'];
    $venta = new Venta();
    $venta->setFechaInicial($fechaInicial);
    $venta->setFechaFinal($fechaFinal);
    $ventas=$venta->getAllByDate();
}

?>