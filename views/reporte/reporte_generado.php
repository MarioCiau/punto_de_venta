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
<?php $total_ventas=0; $contador=0; while($ven=$ventas->fetch_object()): $total_ventas=$total_ventas+$ven->enganche ?>
<!-- <tr>
<td><?=$ven->id?></td>
<td><?=$ven->enganche?></td>
<td><?=$ven->tipo?></td>
</tr> -->
<?php $contador++; endwhile;?>
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
<?php $total_abonos=0; $contador=0; while($abo=$abonos->fetch_object()):  $total_abonos=$total_abonos+$abo->monto?>
<!-- <tr>
<td><?=$abo->ventas_id?></td>
<td><?=$abo->monto?></td>
</tr> -->
<?php $contador++; endwhile;?>
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
<button onclick="generarTotales(<?=$fecha_inicial?>, <?=$fecha_final?>)"type="button" class="btn btn-outline-secondary">Generar Reporte <i class="fas fa-file-medical-alt"></i></button>
</div>