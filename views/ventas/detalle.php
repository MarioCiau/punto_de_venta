<div class="container">
<h1>Detalle de la venta</h1>
<?php if(isset($venta)):?>
<?php if(isset($_SESSION['admin'])):?>
<h3>Cambiar el estado de la venta</h3>
<form action="?controller=venta&action=estado" method="POST">
<input type="hidden" value="<?=$venta->id?>" name="venta_id">
<select name="estado" id="" class="form-select form-select-sm mb-2">
<option value="pendiente" <?=$venta->estado == "Pendiente" ? 'selected' : '';?>>Pendiente</option>
<option value="pagado" <?=$venta->estado == "pagado" ? 'selected' : '';?>>Pagado</option>
</select>
<input type="submit" class="btn btn-primary" value="Cambiar estado">
</form>
<br>
<?php endif;?>
<div class="alert alert-success text-center" role="alert">
<h4 class="alert-heading">Informacion Venta</h4>
Fecha: <?=$venta->fecha?> <br>
Total: $<?=$venta->total?> <hr>
<p class="mb-0">Enganche: <?=$venta->enganche?></p>
</div>

<div class="alert alert-info text-center" role="alert">
<h4 class="alert-heading">Datos de la venta:</h4>
Estado: <span class="badge bg-warning" style="text-transform:uppercase;"><?=$venta->estado?></span> <br>
Folio de venta: <?=$venta->id?> <hr>
<?php if($venta->saldo==0):?>
    <button onclick="generarReporte(<?=$venta->id?>)" class="btn btn-warning mt-1">Generar Factura <i class="fas fa-file-invoice-dollar"></i></button>
<?php else:?>
    Total a pagar: <span class="badge bg-danger" style="text-transform:uppercase;">$<?=$venta->saldo?></span>  <br>
    <a href="?controller=abonos&action=abonos_venta&venta_id=<?=$venta->id?>" class="nav-link"><i class="fas fa-eye"></i> Ver historial de pagos</a>
    <a  href="?controller=abonos&action=abonar&id=<?=$venta->id?>"  class="btn btn-outline-primary mt-2">Abonar</a>
<?php endif?>

</div>
<span class="badge bg-secondary" >Productos:</span>
<div class="table-responsive">
<table class="table table-bordered mt-3">
    <thead class="table-secondary">
<tr>
    <th>Imagen</th>
    <th>Nombre</th>
    <th>Precio</th>
    <th>Unidades</th>
</tr>
</thead>
    <tbody>
<?php while($producto = $ventas->fetch_object()):?>
    <tr>
    <td>
            <?php if($producto->imagen != null):?>
            <img src="uploads/images/<?=$producto->imagen?>" alt="" class="img-fluid"  style="width:8rem;">
            <?php else:?>
            <img src="assets/dist/img/default.png" alt="" class="img-fluid"  style="width:8rem;">
            <?php endif;?>
    </td>
    <td>
    <a href="?controller=producto&action=ver&id=<?=$producto->id?>"><?=$producto->nombre?></a>
    </td>
    <td>
    <?=$producto->precio?>
    </td>
    <td>
    <?=$producto->unidades?>
    </td>
    </tr>
<?php endwhile;?>
</tbody>
</table>
<?php endif;?>
</div>
<div>