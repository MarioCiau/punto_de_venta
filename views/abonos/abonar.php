<?php if(isset($_SESSION['identify'])):?>
<div class="container-fluid">
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="form-group">
                                <h4 class="text-center">Buscar venta</h4>
                            </div>
                            <div class="card mt-3">
                                <div class="card-body">
                                    <form action="#" method="post" id="form_buscar">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group d-flex justify-content-evenly align-items-center flex-no-wrap">
                                                    <label>Folio Venta</label>
                                                    <input type="number" name="venta" id="venta" class="form-control " style="margin-left:5px">
                                                    <button type="submit" class="btn btn-primary disabled" id="btn_buscar" style="margin-left:5px"><i class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-10" style="">
                        <div class="card-body" style="">
                                        <div class="row d-flex flex-column" style="">
                                            <div class="col-lg-10">
                                            <form action="?controller=venta&action=descontar" method="POST">
                                            <div class="form-group">
                                                    <label>Fecha de Venta</label>
                                                    <input type="hidden"  class="form-control" id="r1"  name="id_venta" required>
                                                    <input type="hidden"  class="form-control" id="c1"  name="cliente_id" required>
                                                    <input type="text"  class="form-control mt-1" id="r2" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-10 mt-2">
                                                <div class="form-group">
                                                    <label>Total</label>
                                                    <input type="phone" class="form-control mt-1"  id="r3"  name="total" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-10 mt-2">
                                                <div class="form-group">
                                                    <label>Enganche</label>
                                                    <input type="text" class="form-control mt-1" id="r4" name="enganche" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-10 mt-2">
                                                <div class="form-group">
                                                    <label>Saldo</label>
                                                    <input type="text" class="form-control mt-1" id="r5" name="saldo" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-10 mt-2">
                                                <div class="form-group">
                                                    <label>Monto</label>
                                                    <input type="text" class="form-control mt-1"  name="monto" required>
                                                </div>
                                            </div>
                                            <div id="div_registro_cliente" style="margin-top:10px">
                                            <input type="submit" class="btn btn-success" value="Abonar a cuenta">
                                            </div>
                                        </div>
                                        </form>
                                </div>
                            </div>
                            <?php endif;?>
</div>
</div>