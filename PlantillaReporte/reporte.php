<?php
require '../vendor/autoload.php';
use Luecano\NumeroALetras\NumeroALetras;
session_start();
$informacionCliente = $_SESSION['resultado'][0];
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Factura</title>

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
              <h2>REMISION FACTURA</h2>
              <span>Nº <?= $informacionCliente['id'] ?></span>
          </div>
        </th>
      </tr>

         <tr>
        <th class="nombreEmpresa">
            <h3><?=$_SESSION['dueña']?></h3>
              <p>R.F.C. <?=$_SESSION['rfc']?></p>
              <P>CURP: <?=$_SESSION['curp']?></P>
              <p><?=$_SESSION['direccionEmpresa']?></p>
              <p>Col. Santiago Umán, Yuc.</p>
        </th>
      </tr>
  </table>


  <table class="informacionRegimen ancho">
    <tr>
      <th class="regimen">
        <span class="regimen">REGIMEN DE PEQUEÑOS CONTRIBUYENTES</span>
      </th>
    </tr>
  </table>

  <table class="informacionCliente ancho">
    <tr>
      <th>
        <p>Facturado a: <span><?= $informacionCliente['nombreCliente'] ?></span></p>
      </th>

      <th>
         <p>Estado: <span><?= $informacionCliente['lugar'] ?></span></p>
      </th>
    </tr>

    <tr>
      <th>
        <p>Direccion: <span><?= $informacionCliente['direccion'] ?></span></p>
      </th>

      <th> 
        <p>Telefono: <span><?= $informacionCliente['telefono'] ?></span></p>
      </th>
    </tr>
    <tr>
      <th>
        <p>Delegacion / Municipio: <span><?= $informacionCliente['localidad'] ?></span></p>
      </th>
    </tr>
  </table>

  <table class="tabla_factura ancho">
      <tr class="cabe">
        <th>Cantidad</th>
        <th>Articulo</th>
        <th>Precio Unitario</th>
        <th>Importe</th>
      </tr>

    <tbody id="infoProductos">
     <?php 
     $producto_html='';
     $total_productos = 0;
     for($i=1; $i < count($_SESSION['resultado']); $i++){
       $total = (float)$_SESSION['resultado'][$i]['unidades'] * $_SESSION['resultado'][$i]['precio'];
       $total_productos = $total_productos + $total;
       $producto_html.= "<tr>";
       $producto_html.= "<td>".$_SESSION['resultado'][$i]['unidades']."</td>";
       $producto_html.= "<td>".$_SESSION['resultado'][$i]['nombre']."</td>";
       $producto_html.= "<td>$".$_SESSION['resultado'][$i]['precio']."</td>";
       $producto_html.= "<td>$".$total."</td>";
       $producto_html.= "</tr>";
     }
     echo $producto_html;
     ?>
    </tbody>
  </table>

  <table class="importe_letras ancho">
     <tr >
       <td>
         <h3 class="titulo">Importe con letra:</h3>
         <p class="textoImporte"><?php
         $formatter = new NumeroALetras();
         echo $formatter->toMoney($total_productos, 2, 'PESOS', 'CENTAVOS');
         ?></p>
       </td>
     </tr>
  </table>

  <table class="ultimaFila ancho">
    <tr>
      <td>
      <h3 class="titulo">Metodo de Pago: <span class="metodoPago"><?= $informacionCliente['tipo'] ?></span></h3>
      <p class="pago">PAGO EN UNA SOLA EXCIBICION</p>
      </td>

      <td class="subtotal">
      <p>SUBTOTAL</p>
      <p>TOTAL:</p>
      </td>

      <td class="finalPrecio">
       <p>$<?=  $formato_numero = number_format($total_productos, 2, '.', '');  ?></p>
      <p>$<?=  $formato_numero = number_format($total_productos, 2, '.', '');?></p>
      </td>
    </tr>
  </table>
</body>

</html>

