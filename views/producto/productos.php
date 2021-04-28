<?php 
require_once 'vendor/autoload.php';


//Hacer paginacion
$paginacion = new Zebra_Pagination();
$numero_elementos_por_pagina = 4;
$numeros_pagina_limite = $productos->num_rows;
//Numero total de elementos a paginar
$paginacion->records($numeros_pagina_limite);

//Numero de elementos por pagina
$paginacion->records_per_page($numero_elementos_por_pagina);

$page= $paginacion->get_page();
$empieza_aqui = (($page - 1)*$numero_elementos_por_pagina);
$productosLimite = $producto->paginacion($empieza_aqui, $numero_elementos_por_pagina);
?>

<div class="container">
<h2 class="border-bottom pb-2 ">Nuestros productos</h2>
<!-- <form action="">
<input class="form-control form-control-sm" id="busqueda" type="text" placeholder="Busqueda.." aria-label=".form-control-sm example">
</form> -->

<div class="d-flex justify-content-between align-items-strech flex-wrap">
<?php while($product = $productosLimite->fetch_object()):?>

  <div class="col-md-3" style="margin-left:1px; margin-bottom:10px; width:250px;" >
          <a href="?controller=producto&action=ver&id=<?=$product->id?>" class="nav-link" style="color:black;">
            <div class="card" style="width: 100%; height:100%;">
            <?php if($product->imagen != null):?>
            <img src="uploads/images/<?=$product->imagen?>" alt="" class="img-fluid">
            <?php else:?>
            <img src="assets/dist/img/default.png" alt=""  class="img-fluid">
            <?php endif;?>

              <div class="card-body">
                <h5 class="card-title"><?=$product->nombre?></h5>
                <h6 class="text-muted"><span><?=$product->precio?></span></a></h6>
                 <?php if($product->stock == '0'):?>
                 <div class="existencia"><p>Agotado</p></div>
                 <?php else:?>
                 <a href="?controller=carrito&action=add&id=<?=$product->id?>" class="btn btn-outline-dark" style="margin-left:15px;">Vender</a>
                 <?php endif;?>
              </div>

            </div>

            </a>
          </div>
        <?php endwhile;?>
</div>

 <?php $paginacion->render(); ?>