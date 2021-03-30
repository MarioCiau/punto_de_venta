<?php
require_once "models/venta.php";
require_once "models/abono.php";
class reporteController{

    public function index(){

        require_once "views/reporte/reportes.php";
    }

    public function generar(){
        Utils::isAdmin();
        if(isset($_POST)){

            $fecha_inicial =isset($_POST['fecha_ini']) ? $_POST['fecha_ini'] : false;
            $fecha_final = isset($_POST['fecha_fin']) ? $_POST['fecha_fin'] : false;

            $venta = new Venta();
            $venta->setFechaInicial($fecha_inicial);
            $venta->setFechaFinal($fecha_final);
            $ventas=$venta->getAllByDate();

            $abono = new Abono();
            $abono->setFechaInicial($fecha_inicial);
            $abono->setFechaFinal($fecha_final);
            $abonos=$abono->getAllByDate();

            $_SESSION['informacion'][0] = $ventas;
            $_SESSION['informacion'][1]= $abonos;


            require_once "views/reporte/reporte_generado.php";
        }
    }
}

?>