<?php 
require_once 'vendor/autoload.php';


//Hacer paginacion
$paginacion = new Zebra_Pagination();
$numero_elementos_por_pagina = 10;
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
<?php if(isset($_SESSION['cliente'])&&  $_SESSION['cliente'] == 'complete'):?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
  Se ha agregado el nuevo cliente correctamente.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php elseif(isset($_SESSION['cliente'])&&  $_SESSION['cliente'] != 'complete'):?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
  No se ha agregado el nuevo cliente.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php endif?>
<?php Utils::deleteSession('cliente');?>


<?php if(isset($_SESSION['delete'])&&  $_SESSION['delete'] == 'complete'):?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
        Cliente eliminado correctamente.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php elseif(isset($_SESSION['delete'])&&  $_SESSION['delete'] != 'complete'):?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
  El cliente no se ha borrado correctamente.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php endif?>
<?php Utils::deleteSession('delete');?>
<h2 class="border-bottom pb-2 ">Gestion de Clientes</h2>
<br>

<a href="?controller=cliente&action=crear"><button type="button" class="btn btn-outline-primary pd-3">Cliente Nuevo <span data-feather="plus-circle"></span></button></a>
<div class="table-responsive">
<table class="table table-sm table-bordered mt-3">
    <thead class="table-dark">
    <tr>
<th>ID</th>
<th>NOMBRE</th>
<th>ESTADO</th>
<th>DIRECCION</th>
<th>EDAD</th>
<th>TELEFONO</th>
<th>ACCIONES</th>
      </tr>
    </thead>
    <tbody>
<?php while($cli=$clientesLimite->fetch_object()):?>
<tr>
<td><?=$cli->id?></td>
<td><?=$cli->nombre?></td>
<td><?=$cli->estado?></td>
<td><?=$cli->direccion?></td>
<td><?=$cli->edad?></td>
<td><?=$cli->telefono?></td>
<td>
<a href="?controller=cliente&action=editar&id=<?=$cli->id?>" class="btn btn-success"><i class='fas fa-edit'></i></a>
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModalDefault" onclick="getId3(<?=$cli->id?>)">
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
      ¿Estás seguro que deseas eliminar este cliente?
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<script>
 function getId3(Id){
  $('.modal-footer').html( "<a href='?controller=cliente&action=eliminar&id="+Id+"' class='btn btn-primary mt-1'>Si</a> <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>No</button>");
 }
</script>