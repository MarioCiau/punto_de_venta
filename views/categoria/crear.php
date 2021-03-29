<div class="container">
<?php if(isset($edit) && isset($cat) && is_object($cat)):?>
  <h2 class="border-bottom pb-2 "><i class="fas fa-edit"></i> <?=$cat->nombre?></h2>
<?php
        $url_action = "?controller=categoria&action=save&id=".$cat->id;
    ?>
<?php else:?>
  <h2 class="border-bottom pb-2 ">Crear nueva categoria</h2>
<?php
        $url_action = "?controller=categoria&action=save";
    ?>
<?php endif;?>

<form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">
  <div class="form-group mt-3">
    <label for="nombre" class="mb-2">Categoria</label>
    <input type="text" class="form-control" name="nombre" placeholder="Ingrese nueva categoria de productos" required value="<?=isset($cat) && is_object($cat) ? $cat->nombre : ''?>">
  </div>
    <button type="submit" class="btn btn-success mt-3">Guardar</button>
  </form>
</div>
