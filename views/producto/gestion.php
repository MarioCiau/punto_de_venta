<?php 
require_once 'vendor/autoload.php';


//Hacer paginacion
$paginacion = new Zebra_Pagination();
$numero_elementos_por_pagina = 10;
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
<?php if(isset($_SESSION['producto'])  &&  $_SESSION['producto'] == 'complete'):?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
          El producto se ha creado correctamente.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php elseif(isset($_SESSION['producto'])&&  $_SESSION['producto'] != 'complete'):?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
  El producto no se ha creado correctamente.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php endif?>
<?php Utils::deleteSession('producto');?>

<?php if(isset($_SESSION['delete']) &&  $_SESSION['delete'] == 'complete'):?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
        Producto eliminado correctamente.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php elseif(isset($_SESSION['delete'])&&  $_SESSION['delete'] != 'complete'):?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
  El producto no se ha borrado correctamente.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php endif?>
<?php Utils::deleteSession('delete');?>
<h2 class="border-bottom pb-2 ">Gestion de productos</h2>
<br>

<a href="?controller=producto&action=crear"><button type="button" class="btn btn-outline-primary pd-3">Crear Producto <span data-feather="plus-circle"></span></button></a>
<div class="table-responsive">
<table class="table table-sm table-bordered mt-3">
    <thead class="table-dark">
    <tr>
<th>ID</th>
<th>NOMBRE</th>
<th>PRECIO</th>
<th>STOCK</th>
<th>ACCIONES</th>
      </tr>
    </thead>
    <tbody>
<?php while($pro=$productosLimite->fetch_object()):?>
<tr>
<td><?=$pro->id?></td>
<td><?=$pro->nombre?></td>
<td><?=$pro->precio?></td>
<td><?=$pro->stock?></td>
<td>
<a href="?controller=producto&action=editar&id=<?=$pro->id?>" class="btn btn-success mt-1"><i class='fas fa-edit'></i></a>
<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModalDefault" onclick="getId(<?=$pro->id?>)">
<i class='fas fa-trash-alt'></i>
</button>
</td>
</tr>
<?php endwhile;?>
    </tbody>
  </table>
</div>
<?php $paginacion->render(); ?>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalDefault" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmación de eliminación</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar">
        <!-- <button type="button" class="btn-close" data-dismiss="modal" aria-label="Cerrar"> -->
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
      ¿Estás seguro que deseas eliminar este producto?
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<script>
 function getId(Id){
  $('.modal-footer').html( "<a href='?controller=producto&action=eliminar&id="+Id+"' class='btn btn-primary mt-1'>Si</a> <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>No</button>");
 }
</script>