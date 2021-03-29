<div class="container">
<?php if(isset($_SESSION['venta']) && $_SESSION['venta'] == 'complete'): ?>
<?php if(isset($venta)):?>
    <div class="alert alert-success text-center" role="alert">
          <h4 class="alert-heading">Tu venta se ha confirmado</h4>
          <p> Tu venta ha <b><?=$venta->tipo?></b> ha sido guardado con <b>exito</b>.</p>
    </div>
<div class="alert alert-info text-center" role="alert">
          <h4 class="alert-heading">Datos de la venta</h4>
          Numero de venta: <b> <?=$venta->id?></b> <br>
          <?php if($venta->tipo == 'contado'):?>
          Pago: <b> <?=$venta->enganche?></b> <br>
          Saldo: <b><?=$venta->saldo?></b> <br>
          <button onclick="generarReporte(<?=$venta->id?>)" class="btn btn-warning mt-1">Generar Factura <i class="fas fa-file-invoice-dollar"></i></button>
          <?php else:?>
          Enganche: <b> <?=$venta->enganche?></b> <br>
          Total a pagar: <b><?=$venta->saldo?></b> <br>
          <button onclick="generarPagos(<?=$venta->id?>)" class="btn btn-warning mt-1">Comprobante <i class="fas fa-file-invoice-dollar"></i></button>
          <?php endif;?>
    </div>
    <span class="badge bg-primary">PRODUCTOS:</span>

    <div class="d-flex justify-content-evenly align-items-strech flex-wrap mt-3">
<?php while($producto = $productos->fetch_object()):?>
        <div class="row  row-cols-2 row-cols-md-2 g-8 mt-2">
          <div class="col" style="margin-left:15px;">
            <div class="card" style="width: 18rem;">
            <?php if($producto->imagen != null):?>
            <img src="uploads/images/<?=$producto->imagen?>" alt="" class="img-fluid">
            <?php else:?>
            <img src="assets/dist/img/default.png" alt=""  class="img-fluid">
            <?php endif;?>

              <div class="card-body">
                <h5 class="card-title"><?=$producto->nombre?></h5>
                <h6 class="text-muted">Precio: <span><?=$producto->precio?></span></a></h6>
                <h6 class="text-muted">Unidades: <span><?=$producto->unidades?></span></a></h6>
              </div>
            </div>

          </div>
        </div>
        <?php endwhile;?>
</div>
<?php endif;?>
<?php elseif (isset($_SESSION['venta']) && $_SESSION['venta'] != 'complete'):?>
    <h1>La venta no se ha podido procesar</h1>
<?php endif;?>

<?php if (isset($_SESSION['carrito_vacio']) && $_SESSION['carrito_vacio'] == 'error'):?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
          Carrito Vacio, agregue productos
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php endif;?>
<?php Utils::deleteSession('carrito_vacio');?>
</div>