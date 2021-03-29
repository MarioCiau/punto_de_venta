<div class="container">
<div class="col-lg-8 pb-4" style="border:1px solid #ccc; margin:auto; padding:10px 5px; border-radius:5px;">
<h3 class="text-center">Venta N° <?=$ven->id?></h3>
<table class="table table-sm table-borderless" style="width:75%; margin:auto;">
<tr>
<th>Total de la venta: </th> <td>$<?=$ven->total?></td>
</tr>
<tr>
<th>Enganche: </th> <td>$<?=$ven->enganche?></td>
</tr>
<tr>
<th>Fecha de la venta: </th> <td>$<?=$ven->fecha?></td>
</tr>
<tr>
<th>Tipo: </th> <td> <span style="text-transform:uppercase"><?=$ven->tipo?></span></td>
</tr>
</table>
</div>
<h4 class="text-center mt-2">Historial de pagos</h4>
<div class="table-responsive">
<table class="table table-sm table-bordered">
          <thead class="table-dark">
          <tr>
            <th scope="col">N°</th>
            <th scope="col">Fecha Abono</th>
            <th scope="col">Hora Abono</th>
            <th scope="col">Saldo de venta</th>
            <th scope="col">Monto Abonado</th>
          </tr>
          </thead>
<?php $contador=0; while($abono = $abonos->fetch_object()): $contador++;?>
          <tbody>
          <tr>
            <th scope="row"><?=$contador?></th>
            <td><?=$abono->fecha?></td>
            <td><?=$abono->hora?></td>
            <td>$<?=$abono->saldo?></td>
            <td>$<?=$abono->monto?></td>
          </tr>
          </tbody>
<?php endwhile;?>
</table>
</div>
</div>