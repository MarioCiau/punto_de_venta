<?php if(isset($_SESSION['identify'])):?>
<div class="container-fluid">
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="form-group">
                                <h4 class="text-center">Abonar a venta N° <?=$ven->id?></h4>
                            </div>
                        </div>
                        <hr>

                        <div class="col-lg-10">
                        <div class="card-body">
                                        <div class="row d-flex flex-column">
                                            <div class="col-lg-10">
                                            <form action="?controller=venta&action=descontar" method="POST">
                                            <div class="form-group">
                                                    <label>Fecha de Venta</label>
                                                    <input type="hidden"  class="form-control" name="id_venta" value="<?=isset($ven) && is_object($ven) ? $ven->id : ''?>" required>
                                                    <input type="hidden"  class="form-control" name="cliente_id" value="<?=isset($ven) && is_object($ven) ? $ven->cliente_id : ''?>" required>
                                                    <input type="text"  class="form-control mt-1"  value="<?=isset($ven) && is_object($ven) ? $ven->fecha : ''?>" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-10 mt-2">
                                                <div class="form-group">
                                                    <label>Total</label>
                                                    <input type="phone" class="form-control mt-1"   name="total" value="<?=isset($ven) && is_object($ven) ? $ven->total : ''?>" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-10 mt-2">
                                                <div class="form-group">
                                                    <label>Enganche</label>
                                                    <input type="text" class="form-control mt-1"  name="enganche" value="<?=isset($ven) && is_object($ven) ? $ven->enganche : ''?>" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-10 mt-2">
                                                <div class="form-group">
                                                    <label>Saldo</label>
                                                    <input type="text" class="form-control mt-1"  name="saldo" value="<?=isset($ven) && is_object($ven) ? $ven->saldo : ''?>" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-10 mt-2">
                                                <div class="form-group">
                                                    <label>Monto</label>
                                                    <input type="text" class="form-control mt-1"  name="monto" required>
                                                </div>
                                            </div>
                                            <div id="div_registro_cliente" style="margin-top:5px">
                                            <input type="submit" class="btn btn-success" value="Abonar a cuenta">
                                            </div>
                                        </div>
                                        </form>
                                </div>
                            </div>
                            <?php endif;?>
</div>
</div>

