<div class="container">

<?php if(isset($_SESSION['deleteAbono'])&&  $_SESSION['deleteAbono'] == 'complete'):?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
Abono eliminado correctamente.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php elseif(isset($_SESSION['deleteAbono'])&&  $_SESSION['deleteAbono'] != 'complete'):?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
  El Abono no se ha borrado correctamente.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php endif?>
<?php Utils::deleteSession('delete');?>
<h2 class="border-bottom pb-2 ">Gestion de Abonos</h2>
<br>


<div class="table-responsive">
<table class="table table-bordered mt-3">
    <thead class="table-dark">
    <tr>
<th>ID</th>
<th>N° Cliente</th>
<th>N° Venta</th>
<th>FECHA</th>
<th>SALDO</th>
<th>MONTO</th>
<th>ACCIONES</th>
      </tr>
    </thead>
    <tbody>
<?php while($abo=$abonos->fetch_object()):?>
<tr>
<td><?=$abo->id?></td>
<td><?=$abo->cliente_id?></td>
<td><?=$abo->ventas_id?></td>
<td><?=$abo->fecha?></td>
<td><?=$abo->saldo?></td>
<td><?=$abo->monto?></td>
<td>
<a href="?controller=cliente&action=editar&id=<?=$cli->id?>" class="btn btn-success mt-1"><i class='fas fa-edit'></i></a>
<a href="?controller=cliente&action=eliminar&id=<?=$cli->id?>" class="btn btn-danger mt-1"><i class='fas fa-trash-alt'></i></a>
</td>
</tr>
<?php endwhile;?>
    </tbody>
  </table>
  </div>
</div>