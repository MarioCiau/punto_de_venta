<?php
require_once 'vendor/autoload.php';


//Hacer paginacion
$paginacion = new Zebra_Pagination();
$numero_elementos_por_pagina = 10;
$numeros_pagina_limite = $categorias->num_rows;
//Numero total de elementos a paginar
$paginacion->records($numeros_pagina_limite);

//Numero de elementos por pagina
$paginacion->records_per_page($numero_elementos_por_pagina);

$page= $paginacion->get_page();
$empieza_aqui = (($page - 1)*$numero_elementos_por_pagina);
$categoriaLimite = $categoria->paginacion($empieza_aqui, $numero_elementos_por_pagina);
?>


<div class="container">
<?php if(isset($_SESSION['deleteCategoria'])&&  $_SESSION['deleteCategoria'] == 'complete'):?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
        Categoria eliminada correctamente.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php elseif(isset($_SESSION['deleteCategoria'])&&  $_SESSION['deleteCategoria'] != 'complete'):?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Categoria no se eliminado correctamente, la categoria tiene productos activos.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php endif?>
<?php Utils::deleteSession('deleteCategoria');?>
<h2 class="border-bottom pb-2 ">Gestionar Categorias</h2>
<br>

<a href="?controller=categoria&action=crear"><button type="button" class="btn btn-outline-primary pd-3">Crear Categoria <span data-feather="plus-circle"></span></button></a>
<div class="table-responsive">
<table class="table table-sm table-bordered mt-3">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>ACCIONES</th>
      </tr>
    </thead>
    <tbody>
<?php while($cat=$categoriaLimite->fetch_object()):?>
<tr>
<td><?=$cat->id?></td>
<td><?=$cat->nombre?></td>
<td>
<a href="?controller=categoria&action=editar&id=<?=$cat->id?>" class="btn btn-success"><i class='fas fa-edit'></i></a>
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModalDefault" onclick="getId2(<?=$cat->id?>)">
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
      ¿Estás seguro que deseas eliminar esta categoria?
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<script>
 function getId2(Id){
  $('.modal-footer').html( "<a href='?controller=categoria&action=eliminar&id="+Id+"' class='btn btn-primary mt-1'>Si</a> <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>No</button>");
 }
</script>