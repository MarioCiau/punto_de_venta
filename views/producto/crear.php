<div class="container">
<?php if(isset($edit) && isset($pro) && is_object($pro)):?>
  <h2 class="border-bottom pb-2 "><i class="fas fa-edit"></i> <?=$pro->nombre?> </h2>
<?php
        $url_action = "?controller=producto&action=save&id=".$pro->id;
    ?>
<?php else:?>
  <h2 class="border-bottom pb-2 ">Crear nuevo producto</h2>
<?php
        $url_action = "?controller=producto&action=save";
    ?>
<?php endif;?>

<form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">
  <div class="form-group mt-3">
    <label for="nombre" class="mb-2">Nombre</label>
    <input type="text" class="form-control" name="nombre" required value="<?=isset($pro) && is_object($pro) ? $pro->nombre : ''?>">

    <label for="descripcion" class="mb-2">Descripcion</label>
    <textarea class="form-control" name="descripcion" aria-label="With textarea"><?=isset($pro) && is_object($pro) ? $pro->descripcion : ''?></textarea>

    <label for="precio" class="mb-2">Precio</label>
    <input type="number" class="form-control" name="precio" step="any" required value="<?=isset($pro) && is_object($pro) ? $pro->precio : ''?>">

    <label for="stock" class="mb-2">Stock</label>
    <input type="number" class="form-control" name="stock" required value="<?=isset($pro) && is_object($pro) ? $pro->stock : ''?>">

    <label for="categoria" class="mb-2">Categoria</label>
    <?php $categorias = Utils::showCategorias(); ?>
    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="categoria">
    <?php while($cat = $categorias->fetch_object()):?>
        <option value="<?=$cat->id?>" <?=isset($pro) && is_object($pro) && $cat->id == $pro->categoria_id ? 'selected' : ''?>><?=$cat->nombre?></option>
        <?php endwhile;?>
    </select>

    <label for="imagen" class="mb-2" >Imagen</label>
    <?php  if(isset($pro) && is_object($pro) && !empty($pro->imagen)): ?>
    <div class="col-md-4">
        <img src="uploads/images/<?=$pro->imagen?>" alt="" class="img-fluid" style="width:8rem;">
    </div>
    <?php  endif;?>
    <input type="file" class="form-control mt-2" id="customFile" name="imagen" >
  </div>
    <button type="submit" class="btn btn-success mt-3">Guardar</button>
  </form>
</div>