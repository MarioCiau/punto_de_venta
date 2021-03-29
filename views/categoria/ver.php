<?php 
require_once 'vendor/autoload.php';


//Hacer paginacion
$paginacion = new Zebra_Pagination();
$numero_elementos_por_pagina = 4;
$numeros_pagina_limite = $productosCategorias->num_rows;
//Numero total de elementos a paginar
$paginacion->records($numeros_pagina_limite);

//Numero de elementos por pagina
$paginacion->records_per_page($numero_elementos_por_pagina);

$page= $paginacion->get_page();
$empieza_aqui = (($page - 1)*$numero_elementos_por_pagina);
$productosLimite = $producto->paginacion2($empieza_aqui, $numero_elementos_por_pagina);
?>

<div class="container">
<?php if(isset($categoria)):?>
<h2 class="border-bottom pb-2 "><?=$categoria->nombre?></h2>
<?php if($productosCategorias->num_rows == 0):?>
<p>No hay productos a mostrar</p>
<?php else:?>
  <div class="d-flex justify-content-evenly align-items-strech flex-wrap">
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
                <a href="?controller=carrito&action=add&id=<?=$product->id?>" class="btn btn-outline-dark" style="margin-left:15px;">Vender</a>
              </div>

            </div>

            </a>
          </div>
        <?php endwhile;?>
<?php endif;?>
<?php else:?>
<h1>La categoria no existe</h1>
<?php endif;?>
</div>

<?php $paginacion->render(); ?>
