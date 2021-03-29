<div class="container">
<?php if(isset($_SESSION['sinStock'])):?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <?= $_SESSION['sinStock'] ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php endif?>
<?php Utils::deleteSession('error_unidades');?>
<h1>Carrito de venta</h1>

<?php if(isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1):?>
<div class="table-responsive">
<table  class="table table-bordered mt-3">
<tr>
    <th>Imagen</th>
    <th>Nombre</th>
    <th>Precio</th>
    <th>Unidades</th>
    <th>Eliminar</th>
</tr>
<?php
    foreach($carrito as $indice => $elemento):
    $producto = $elemento['producto'];
    ?>

    <tr>
    <td>
            <?php if($producto->imagen != null):?>
            <img src="uploads/images/<?=$producto->imagen?>" alt=""  class="img-fluid" style="width:5rem;">
            <?php else:?>
            <img src="assets/dist/img/camiseta.png" alt=""  class="img-fluid" style="width:5rem;">
            <?php endif;?>
    </td>
    <td>
    <a class="nav-link" href="?controller=producto&action=ver&id=<?=$producto->id?>"><?=$producto->nombre?></a>
    </td>
    <td>
    <?=$producto->precio?>
    </td>
    <td>
    <?=$elemento['unidades']?>
    <div class="d-flex justify-content-evenly align-items-strech flex-no-wrap">
    <a href="?controller=carrito&action=up&index=<?=$indice?>" class="btn btn-outline-secondary">+</i></a>
    <a href="?controller=carrito&action=down&index=<?=$indice?>" class="btn btn-outline-secondary">-</i></a>
    </div>
    </td>
    <td>
    <a href="?controller=carrito&action=delete&index=<?=$indice?>" class="btn btn-outline-warning" style="margin-left:15px;">Quitar producto <i class="far fa-trash-alt"></i></a>
    </td>
    </tr>

<?php endforeach;?>
</table>
</div>
<div class="themed-grid-col">
<div class="d-flex justify-content-between align-items-strech flex-no-wrap">
<?php $stats = Utils::statsCarrito();?>
<a href="?controller=carrito&action=delete_all" class="btn btn-danger" style="margin-right:15px;">Cancelar</a>
<h3>Precio total : $<?=$stats['total']?></h3>
<a href="?controller=venta&action=index" class="btn btn-success" style="margin-left:15px; text-aling:center">Procesar Venta   <i class="far fa-caret-square-right"></i> </a>
</div>
</div>
<?php else:?>
    <div class="alert alert-warning" role="alert">
          <h4 class="alert-heading">¡Aviso!</h4>
          <p>El carrito esta vacio, añade algun producto</p>
    </div>
<?php endif;?>
</div>