<?php 
require_once 'vendor/autoload.php';


//Hacer paginacion
$paginacion = new Zebra_Pagination();
$numero_elementos_por_pagina = 6;
$numeros_pagina_limite = $ventas->num_rows;
//Numero total de elementos a paginar
$paginacion->records($numeros_pagina_limite);

//Numero de elementos por pagina
$paginacion->records_per_page($numero_elementos_por_pagina);

$page= $paginacion->get_page();
$empieza_aqui = (($page - 1)*$numero_elementos_por_pagina);
$ventasLimite = $venta->paginacion($empieza_aqui, $numero_elementos_por_pagina);
?>


<div class="container">
<h2 class="border-bottom pb-2 ">Nuestros ventas</h2>

<div class="col-12 d-flex justify-content-evenly align-items-strech flex-wrap" >

<?php while($ven = $ventasLimite->fetch_object()):?>
  <div class="col-sm-4" >
    <ul class="list-group m-2 ">
          <li class="list-group-item list-group-item-dark d-flex justify-content-between" aria-current="true">Folio Venta : <?=$ven->id?> <span class="badge bg-light text-dark" style="text-transform:uppercase"><?=$ven->estado?></span></li> </li>
          <li class="list-group-item">Total de la venta: <?=$ven->total?></li>
          <li class="list-group-item" aria-disabled="true">Enganche: <?=$ven->enganche?> </li>
          <li class="list-group-item">Fecha y Hora: <?=$ven->fecha?> <?=$ven->hora?></li>
          <li class="list-group-item">Tipo: <span class="badge bg-info" style="text-transform:uppercase"><?=$ven->tipo?></span></li>
          <li class="list-group-item disabled"> <span class="badge bg-dark">Saldo: <?=$ven->saldo?></span></li>
        </ul>
        </div>
        <?php endwhile;?>
</div>

<?php $paginacion->render(); ?>