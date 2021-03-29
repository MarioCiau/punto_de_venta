<div class="container">
<?php if(isset($edit) && isset($cli) && is_object($cli)):?>
  <h2 class="border-bottom pb-2 "><i class="fas fa-edit"></i> <?=$cli->nombre?></h2>
<?php
        $url_action = "?controller=cliente&action=save&id=".$cli->id;
    ?>
<?php else:?>
  <h2 class="border-bottom pb-2 ">Agregar Nuevo Cliente</h2>
<?php
        $url_action = "?controller=cliente&action=save";
    ?>
<?php endif;?>

<form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">
  <div class="form-group mt-3">
    <label for="nombre" class="mb-2">Nombre</label>
    <input type="text" class="form-control" name="nombre" required value="<?=isset($cli) && is_object($cli) ? $cli->nombre : ''?>">

    <label for="estado" class="mb-2">Estado</label>
    <input type="text" class="form-control" name="estado" required value="<?=isset($cli) && is_object($cli) ? $cli->estado : ''?>">

    <label for="localidad" class="mb-2">Localidad</label>
    <input type="text" class="form-control" name="localidad" required value="<?=isset($cli) && is_object($cli) ? $cli->localidad : ''?>">

    <label for="direccion" class="mb-2">Direccion</label>
    <input type="text" class="form-control" name="direccion" required value="<?=isset($cli) && is_object($cli) ? $cli->direccion : ''?>">

    <label for="edad" class="mb-2">Edad</label>
    <input type="number" class="form-control" name="edad"  required value="<?=isset($cli) && is_object($cli) ? $cli->edad : ''?>">

    <label for="telefono" class="mb-2">Telefono</label>
    <input type="tel" class="form-control" name="telefono" required value="<?=isset($cli) && is_object($cli) ? $cli->telefono : ''?>">

    <button type="submit" class="btn btn-success mt-3">Guardar</button>
  </form>
</div>