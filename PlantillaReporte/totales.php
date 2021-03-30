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