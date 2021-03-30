<div class="container">
<h2 class="border-bottom pb-2 ">Informacion del Reporte</h2>
<div class="col-md-12 d-flex justify-content-evenly border rounded">
<div class="col-md-5">
<div class="table-responsive">
<table class="table table-sm table-bordered mt-1">
    <thead class="table-dark">
    <tr>
<th>Total de Ventas</th>
      </tr>
    </thead>
    <tbody>
<?php $total_ventas=0; $contador=0; $contadorArray=0; while($contadorArray < count($_SESSION['informacion'][0])): $total_ventas=$total_ventas+ $_SESSION['informacion'][0][$contadorArray]['enganche'] ?>
<!-- <tr>
<td><?=$_SESSION['informacion'][0][$contadorArray]->id?></td>
<td><?=$_SESSION['informacion'][0][$contadorArray]->enganche?></td>
<td><?=$_SESSION['informacion'][0][$contadorArray]->tipo?></td>
</tr> -->
<?php $contador++; $contadorArray++; endwhile;?>
<tr>
<td><h3>$<?=$formato_numero = number_format($total_ventas, 2, '.', '');?></h3></td></tr>
<tr>
<td>Cantidad de ventas: <?=$contador?></td>
</tr>
    </tbody>
  </table>
</div>
</div>

<div class="col-md-5">
<div class="table-responsive">
<table class="table table-sm table-bordered mt-1">
    <thead class="table-dark">
    <tr>
<th>Total de Abonos</th>
      </tr>
    </thead>
    <tbody>
<?php $total_abonos=0; $contador=0; $contadorArray=0; while($contadorArray < count($_SESSION['informacion'][1])):  $total_abonos=$total_abonos+$_SESSION['informacion'][1]['monto']?>
<tr>
<td><?=$abo->ventas_id?></td>
<td><?=$abo->monto?></td>
</tr>
<?php $contador++; $contadorArray++; endwhile;?>
<tr> 
<td><h3>$<?=$formato_numero = number_format($total_abonos, 2, '.', '');?></h3></td></tr>
<tr>
<td>Cantidad de abonos: <?=$contador?></td> 
</tr>
    </tbody>
  </table>
  <h3> </h3>
  <?php $total_fin=$total_abonos+$total_ventas;?>
</div>
</div>
</div>
<br>
<h3>Ingresos totales: $<?=$formato_numero = number_format($total_fin, 2, '.', '');?></h3>
<button onclick="generarTotales()"type="button" class="btn btn-outline-secondary">Generar Reporte <i class="fas fa-file-medical-alt"></i></button>
</div>