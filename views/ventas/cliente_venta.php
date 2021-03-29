<?php if(isset($_SESSION['identify'])):?>
<div class="container-fluid">
                    <div class="row">
                    <h4 class="text-center">Datos del Cliente</h4>

                        <div class="col-lg-12">
                        <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-4">
                                            <form action="?controller=venta&action=add" method="POST">
                                            <div class="form-group">
                                                    <label>Nombre</label>
                                                    <input type="hidden"  class="form-control"  name="cliente" required value="<?=isset($cli) && is_object($cli) ? $cli->id : ''?>">
                                                    <input type="text"  class="form-control"  required value="<?=isset($cli) && is_object($cli) ? $cli->nombre : ''?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Teléfono</label>
                                                    <input type="phone" class="form-control"   name="telefono" required value="<?=isset($cli) && is_object($cli) ? $cli->telefono : ''?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Dirección</label>
                                                    <input type="text" class="form-control" name="direccion" required value="<?=isset($cli) && is_object($cli) ? $cli->direccion : ''?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Tipo</label>
                                                    <select class="form-select form-select-md" aria-label=".form-select-sm example" name="tipo" id='tipo' required>
                                                    <option value="credito">Credito</option>
                                                    <option value="contado">Contado</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Enganche / Pago</label>
                                                    <input type="number" class="form-control" name="anticipo" required>
                                                </div>
                                            </div>
                                            <div id="div_registro_cliente" style="margin-top:5px">
                                            <input type="submit" class="btn btn-success" value="Generar Venta">
                                            </div>
                                        </div>
                                        </form>
                                </div>
                            </div>
                            <?php endif;?>
                            <h4 class="text-center">Detalle de Venta</h4>
<?php if(!isset($_SESSION['carrito'])):?>
    <div class="alert alert-danger text-center" role="alert">
          <h4 class="alert-heading">¡Aviso!</h4>
          <p>El carrito esta vacio, añade algun producto</p>
          <a class="nav-link" href="?controller=producto&action=index">Agregar Productos <i class="fas fa-search-plus"></i></a>
    </div>
<?php else:?>
    <div class="alert alert-info text-center" role="alert">
          <h4 class="alert-heading">Ver detalle de la venta</h4>
          <a class="nav-link" href="?controller=carrito&action=index"><i class="far fa-eye"></i> Ver los productos y el precio de venta</a>
    </div>
<?php endif;?>
</div>
</div>