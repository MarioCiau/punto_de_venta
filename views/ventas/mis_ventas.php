<?php
require_once 'vendor/autoload.php';


//Hacer paginacion
$paginacion = new Zebra_Pagination();
$numero_elementos_por_pagina = 8;
$numeros_pagina_limite = $ventas->num_rows;
//Numero total de elementos a paginar
$paginacion->records($numeros_pagina_limite);

//Numero de elementos por pagina
$paginacion->records_per_page($numero_elementos_por_pagina);

$page= $paginacion->get_page();
$empieza_aqui = (($page - 1)*$numero_elementos_por_pagina);
$ventasLimite = $venta->paginacion2($empieza_aqui, $numero_elementos_por_pagina);
?>
<div class="container">
<?php if(isset($gestion)):?>
<h1>Gestionar Ventas</h1>
<?php else: ?>
<h1>Mis Compras</h1>
<?php endif;?>
<div class="table-responsive">
<table class="table table-sm table-bordered mt-3">
<thead class="table-secondary">
<tr>
    <th>Folio de Venta</th>
    <th>Total de Venta</th>
    <th>Fecha</th>
    <th>Tipo</th>
    <th>Estado</th>
    <th>Saldo</th>
    <th>Accion</th>
</tr>
</thead>
<tbody>
<?php while($ven = $ventasLimite->fetch_object()): ?>

    <tr>
    <td>
    <a href="?controller=venta&action=detalle&id=<?=$ven->id?>" style="text-decoration:none"><?=$ven->id?></a>
    </td>
    <td>
    <span class="badge bg-light text-dark">$<?=$ven->total?></span>
    </td>
    <td>
    <span class="badge bg-light text-dark"><?=$ven->fecha?></span>
    </td>
    <td>
    <span class="badge bg-light text-dark" style="text-transform:uppercase"><?=$ven->tipo?></span>
    </td>
    <td>
    <span class="badge bg-light text-dark" style="text-transform:uppercase"><?=$ven->estado?></span>
    </td>
    <td>
    <span class="badge bg-warning">$<?=$ven->saldo?></span>
    </td>
    <td>
    <?php if($ven->saldo==0): ?>
        <a href="?controller=abonos&action=abonar&id=<?=$ven->id?>" class="btn btn-outline-success mt-1">Facturar <i class="fas fa-file-import"></i></i></a>
<?php else:?>
    <a href="?controller=abonos&action=abonar&id=<?=$ven->id?>" class="btn btn-outline-success mt-1">Abonar <i class="fas fa-hand-holding-usd"></i></a>
<?php endif;?>
</td>
    </tr>
<?php endwhile;?>
</tbody>
</table>
<div>
</div>
<?php $paginacion->render(); ?>