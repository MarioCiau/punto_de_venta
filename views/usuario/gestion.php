<div class="container">
<?php if(isset($_SESSION['producto'])  &&  $_SESSION['producto'] == 'complete'):?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
          El producto se ha modificado correctamente.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php elseif(isset($_SESSION['producto'])&&  $_SESSION['producto'] != 'complete'):?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
  El producto no se ha modificado correctamente.
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
<h2 class="border-bottom pb-2 ">Gestion de Usuarios</h2>
<br>

<div class="table-responsive">
<table class="table table-sm table-bordered mt-3">
    <thead class="table-dark">
    <tr>
<th>NOMBRE</th>
<th>ROL</th>
<th>ACCIONES</th>
      </tr>
    </thead>
    <tbody>
<?php while($usu=$usuarios->fetch_object()):?>
<tr>
<td><?=$usu->nombre?></td>
<td><?=$usu->rol?></td>
<td>
<a href="?controller=producto&action=editar&id=<?=$usu->id?>" class="btn btn-success mt-1"><i class='fas fa-edit'></i></a>
<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModalDefault" onclick="getId(<?=$usu->id?>)">
<i class='fas fa-trash-alt'></i>
</button>
</td>
</tr>
<?php endwhile;?>
    </tbody>
  </table>
</div>