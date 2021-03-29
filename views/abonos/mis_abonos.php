<?php 
require_once 'vendor/autoload.php';


//Hacer paginacion
$paginacion = new Zebra_Pagination();
$numero_elementos_por_pagina = 15;
$numeros_pagina_limite = $abonos->num_rows;
//Numero total de elementos a paginar
$paginacion->records($numeros_pagina_limite);

//Numero de elementos por pagina
$paginacion->records_per_page($numero_elementos_por_pagina);

$page= $paginacion->get_page();
$empieza_aqui = (($page - 1)*$numero_elementos_por_pagina);
$abonosLimite = $abono->paginacion($empieza_aqui, $numero_elementos_por_pagina);
?>
<div class="container">

<h1>Historial de abonos</h1>
<div class="table-responsive">
<table class="table table-sm table-bordered mt-3">
<thead class="table-secondary">
<tr>
    <th>N° Abono</th>
    <th>Folio Venta</th>
    <th>Fecha</th>
    <th>Hora</th>
    <th>Monto</th>
</tr>
</thead>
<tbody>
<?php while($abono = $abonosLimite->fetch_object()): ?>

    <tr>
    <td>
    <?=$abono->id?>
    </td>
    <td>
    <a href="?controller=venta&action=detalle&id=<?=$abono->ventas_id?>" style="text-decoration:none;"><?=$abono->ventas_id?></a>
    </td>
    <td>
    <span class="badge bg-light text-dark"><?=$abono->fecha?></span>
    </td>
    <td>
    <span class="badge bg-light text-dark"><?=$abono->hora?></span>
    </td>
    <td>
    <span class="badge bg-dark"><?=$abono->monto?></span>
    </td>
    </tr>
<?php endwhile;?>
</tbody>
</table>
<div>
</div>
<?php $paginacion->render(); ?>