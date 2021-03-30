<<<<<<< HEAD
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
=======
<?php session_start(); if(isset($_SESSION['informacion'])): ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte</title>

    <style>
    * {
         margin: 0;
         padding: 0;
         box-sizing: border-box;
    }
  .tablaReporte{
      border: 1px black solid;
      width: 100%;
      padding: 10px;
      margin: 20px 0px;
  }

    .cabecera{
        width: 100%;
    }

    .cabecera th{
        width: 33.33333%;
        text-align: center;
        padding: 10px;
        background-color: red;
        color: white;
    }

     .cabeceraAbonos th{
        width: 50%;
        text-align: center;
        padding: 10px;
        background-color: red;
        color: white;
    }

    h1{
        text-align: center;
    }

    .cuerpo{
        text-align: center;
    }

    .cuerpo td{
         padding: 5px;
    }

.footer{
   background-color: red;
   color: white;
  
}

.footer td{
     padding: 5px;
    text-align: right;
    }

    </style>
</head>
<body>
  <h1>Tabla de ventas</h1>
  <table class="tablaReporte">
      <tr class="cabecera">
          <th>ID</th>
          <th>PAGOS</th>
          <th>METODO DE PAGO</th>
      </tr>

      <?php $total_ventas=0; $contador=0; $contadorArray=0; while($contadorArray < count($_SESSION['informacion'][0])): $total_ventas=$total_ventas+ $_SESSION['informacion'][0][$contadorArray]['enganche'] ?>
            <tr class="cuerpo">
               <td><?=$_SESSION['informacion'][0][$contadorArray]['id']?></td>
               <td>$<?=$_SESSION['informacion'][0][$contadorArray]['enganche']?></td>
               <td><?=$_SESSION['informacion'][0][$contadorArray]['tipo']?></td>
            </tr>
        <?php $contador++; $contadorArray++; endwhile;?>

        <tr class="footer">
          <td>
              <h3>Ganancias: $<?=$formato_numero = number_format($total_ventas, 2, '.', '');?></h3>
              <p>Cantidad de ventas: <?=$contador?></p>
          </td>
        </tr>
  </table>


  <h1>Tabla de abonos</h1>
  <table class="tablaReporte">
      <tr class="cabeceraAbonos">
          <th>VENTAS_ID</th>
          <th>MONTO</th>
      </tr>

     <?php $total_abonos=0; $contador=0; $contadorArray=0; while($contadorArray < count($_SESSION['informacion'][1])):  $total_abonos=$total_abonos+$_SESSION['informacion'][1][$contadorArray]['monto']?>
<tr class="cuerpo">
<td><?= $_SESSION['informacion'][1][$contadorArray]['ventas_id'] ?></td>
<td>$<?= $_SESSION['informacion'][1][$contadorArray]['monto'] ?></td>
</tr>
<?php $contador++; $contadorArray++; endwhile;?>

        <tr class="footer">
         <td><h3>$<?=$formato_numero = number_format($total_abonos, 2, '.', '');?></h3>
         <p>Cantidad de abonos: <?=$contador?></p> 
        </td>
        </tr>
  </table>
  
  <?php
   $total_fin=$total_abonos+$total_ventas;
  ?>
  <h3>Ingresos totales: $<?=$formato_numero = number_format($total_fin, 2, '.', '');?></h3>
</body>
</html>
<?php endif; ?>
>>>>>>> 4326ad40ed874c7cf3625a7e09d84cc6d2196710
