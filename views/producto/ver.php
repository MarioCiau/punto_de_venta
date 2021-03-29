<div class="container">
<?php if(isset($product)):?>
<div class="card">
              <div class="row g-0">
                <div class="col-md-4">
            <?php if($product->imagen != null):?>
            <img src="uploads/images/<?=$product->imagen?>" alt="" class="img-fluid">
            <?php else:?>
            <img src="assets/dist/img/default.png" alt=""  class="img-fluid">
            <?php endif;?>
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                <h5 class="card-title"><?=$product->nombre?></h5>
                <p class="card-text"><?=$product->descripcion?></p>
                <h6 class="text-muted"><span><?=$product->precio?></span></a></h6>
                <p class="card-text">Existencia: <?=$product->stock?></p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                  </div>
                <?php if($product->stock == '0'):?>
                 <div class="existencia"><p>Agotado</p></div>
                 <?php else:?>
                 <a href="?controller=carrito&action=add&id=<?=$product->id?>" class="btn btn-outline-dark" style="margin-left:15px;">Vender</a>
                 <?php endif;?>
                </div>
              </div>
            </div>
<?php else:?>
<h1>El producto no existe</h1>
<?php endif;?>
</div>