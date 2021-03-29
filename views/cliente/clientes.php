<?php 
require_once 'vendor/autoload.php';


//Hacer paginacion
$paginacion = new Zebra_Pagination();
$numero_elementos_por_pagina = 4;
$numeros_pagina_limite = $clientes->num_rows;
//Numero total de elementos a paginar
$paginacion->records($numeros_pagina_limite);

//Numero de elementos por pagina
$paginacion->records_per_page($numero_elementos_por_pagina);

$page= $paginacion->get_page();
$empieza_aqui = (($page - 1)*$numero_elementos_por_pagina);
$clientesLimite = $cliente->paginacion($empieza_aqui, $numero_elementos_por_pagina);
?>


<div class="container">
  <div class="d-flex align-items-center p-3 my-3 text-dark bg-primary rounded shadow-sm">
    <img class="me-3" src="assets/brand/bootstrap-logo-white.svg" alt="" width="48" height="38">
    <div class="lh-1">
      <h1 class="h6 mb-0 text-white lh-1">Clientes Gran Tope</h1>
      <small></small>
    </div>
  </div>

  <div class="my-3 p-3 bg-white rounded shadow-sm">
    <h6 class="border-bottom pb-2 mb-0">Todos los clientes</h6>
    <div class="col-12  d-flex justify-content-evenly align-items-strech flex-wrap">
    <?php while($cli = $clientesLimite->fetch_object()):?>
    <div class="col-sm-3">
      <a href="?controller=cliente&action=ver&id=<?=$cli->id?>" class="nav-link" style="text-decoration:none; margin-top:10px; border-radius:5px;">
      <div class="card">
              <svg class="bd-placeholder-img card-img-top" width="50%" height="100" xmlns="http://www.w3.org/2500/svg" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#ffffff"></rect><text x="50%" y="50%" fill="#000000" dy=".3em"><?=$cli->nombre?></text></svg>

              <div class="card-body text-dark">
                <h5 class="card-title text-primary">Informacion del cliente</h5>
               Telefono: <?=$cli->telefono?> <br>
               Edad: <?=$cli->edad?> <br>
              Localidad: <?=$cli->estado?>, <?=$cli->localidad?> <br>
              Cliente desde: <small class="text-muted"><?=$cli->fecha?></small>
              </div>
            </div>
      </a>
      </div>
      <?php endwhile;?>
    </div>
  <?php $paginacion->render(); ?>
</div>

