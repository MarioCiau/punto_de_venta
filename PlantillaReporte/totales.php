<?php
require '../vendor/autoload.php';
session_start();
$informacion = $_SESSION['informacion'][0];
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reporte</title>

  <style>
    * {
      padding: 0;
      margin: 0;
      box-sizing: border-box;
    }

    body {
      font-family: helvetica;
      font-size: 12px;
      color: black;
      text-align: center;
    }


    .ancho{
      width: 100%;
    }

    .cabecera .nombreEmpresa{
      width: 100%;
      text-align: center;
      padding: 10px;
    }

    .cabecera .nombreEmpresa h3, p{
       padding: 2px 5px;
    }

    .cabecera .ventaId div{
      width: 250px;
      border: 3px solid black;
      border-radius: 5px;
      text-align: center;
      margin-left: 490px;
      margin-bottom: 20px;
    }

    .cabecera .ventaId div span{
     color: red;
     text-align: center;
     font-size: 28px;
    }
   
    .informacionRegimen{
      width: 100%;
    }

    .informacionRegimen .regimen{
      width: 100%;
      font-size: 10px;
      color: black;
      font-weight: bold;
      text-align: center;
      padding: 10px 0px;
    }

    .informacionCliente tr th{
      width: 50%;
    }

    .informacionCliente{
    border: 2px solid black;
    border-radius: 5px;
    font-size: 16px;
    text-align: left;
    margin-top: 5px;
    padding: 10px 15px;
    }

    .informacionCliente tr th p{
       font-weight: bold;
       text-transform:uppercase;
    }

    .informacionCliente tr th p span{
       font-weight: normal;
    }

    .tabla_factura{
      margin-top: 5px;
      border:  1px solid black;
      height: 250px;
    }

    .tabla_factura .cabe th{
      width: 25%;
      text-align: center;
      background-color: red;
      color: white;
    }

    .importe_letras{
    border: 1px solid black;
    margin-top: 3px;
    }

    .importe_letras tr td{
      width: 100%;
    }

    .titulo{
       font-size: 16px;
       text-transform:uppercase;
    }

    .textoImporte{
      font-size: 10px;
      font-weight: 400;
    }

    .ultimaFila{
      border: 1px solid black;
      margin-top: 3px;
    }

    .ultimaFila tr td{
      width: 33.33%;
      padding: 5px;
    }

    .metodoPago{
      font-size: 14px;
      font-weight: 400;
      text-transform:uppercase;
    }

    .subtotal{
      background-color: red;
      text-align: center;
      color: white;
    }
    .finalPrecio{
      text-align: right;
    }
  </style>
</head>

<body>
    <table class="cabecera ancho">
      <tr>
        <th class="ventaId">
          <div>
              <h2>FECHA EXPEDICION DE REPORTE</h2>
              <span><?php echo date("d") . " del " . date("m") . " de " . date("Y"); ?></span>
          </div>
        </th>
      </tr>

         <tr>
        <th class="nombreEmpresa">
            <h3>MARTHA ELENA CHUIL POOL</h3>
              <p>R.F.C. CUPM690224NC7</p>
              <P>CURP: CUPM690224MYNHLR00</P>
              <p>Calle 25 No. 127-A x 24 y 26</p>
              <p>Col. Santiago Umán, Yuc.</p>
        </th>
      </tr>
  </table>
