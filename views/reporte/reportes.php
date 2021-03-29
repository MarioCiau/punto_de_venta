<div class="container">
<h2 class="border-bottom pb-2 ">Seleccione periodo de reporte</h2>

<form action="?controller=reporte&action=generar" method="POST" enctype="multipart/form-data">
<div class="col-lg-12 d-flex justify-content-evenly">
<div class="col-lg-5">
  <div class="form-group mt-3">
    <label for="fecha_ini" class="mb-2">Fecha Inicial</label>
    <input type="date" class="form-control" name="fecha_ini" required>
  </div>
  </div>
  <div class="col-lg-5">
  <div class="form-group mt-3">
    <label for="fecha_fin" class="mb-2">Fecha Final</label>
    <input type="date" class="form-control" name="fecha_fin" required>
  </div>
  </div>
  </div>
  <div class="col-lg-12 text-center">
    <button type="submit" class="btn btn-success mt-3">Procesar Reporte</button>
    </div>
  </form>

</div>