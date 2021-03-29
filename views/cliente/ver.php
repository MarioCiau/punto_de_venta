<div class="container">
<?php if(isset($client)):?>
<div class="card">
              <div class="card-header bg-dark text-white">
              N° Cliente: <?=$client->id?>
              </div>
              <div class="card-body d-flex flex-column aling-items-center">
                <h5 class="card-title"><?=$client->nombre?></h5>
                <cite title="Source Title"><?=$client->telefono?> <i class="fas fa-phone"></i> </cite>
                <p class="card-text mt-1">Historial del cliente, compras realizadas, productos comprados, y abonos realizados.</p>
                <div class="card-text col-md-6 d-flex justify-content-evenly align-items-center flex-wrap">
                <a href="?controller=abonos&action=mis_abonos&cliente_id=<?=$client->id?>"" class="btn btn-outline-warning mt-2" ><i class="fas fa-money-bill-wave"></i> Abonos</a>
                <a href="?controller=venta&action=mis_ventas&cliente_id=<?=$client->id?>" class="btn btn-outline-info mt-2"><i class="fas fa-shopping-bag"></i> Compras</a>
                <a href="?controller=venta&action=cliente&id_cliente=<?=$client->id?>" class="btn btn-outline-success mt-2"><i class="fas fa-cart-plus"></i> Nueva Venta</a>
                </div>
              </div>
              <div class="card-footer text-muted">
              Cliente desde: <?=$client->fecha?>
              </div>
</div>
<?php else:?>
<h1>El producto no existe</h1>
<?php endif;?>
</div>