<main class="container">
  <div class="d-flex align-items-center p-3 my-3 text-dark bg-primary rounded shadow-sm">
    <img class="me-3" src="assets/brand/Gran Tope.svg" alt="" width="100" height="38">
    <div class="lh-1">
      <h1 class="h6 mb-0 text-white lh-1">Clientes</h1>
      <small></small>
    </div>
  </div>

  <div class="my-3 p-3 bg-white rounded shadow-sm">
    <h6 class="border-bottom pb-2 mb-0">Clientes puto</h6>

    <div class="col-12  d-flex justify-content-evenly align-items-strech flex-wrap">
    <?php while($cli = $clientes->fetch_object()):?>
    <div class="col-sm-4">
      <a href="?controller=cliente&action=ver&id=<?=$cli->id?>" class="nav-link" style="text-decoration:none; margin-top:10px; border-radius:5px;">
      <div class="card">
              <svg class="bd-placeholder-img card-img-top" width="50%" height="100" xmlns="http://www.w3.org/2500/svg" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#ffffff"></rect><text x="50%" y="50%" fill="#000000" dy=".3em"><?=$cli->nombre?></text></svg>

              <div class="card-body text-dark">
                <h5 class="card-title text-primary">Informacion del cliente</h5>
               Telefono: <?=$cli->telefono?> <br>
               Edad: <?=$cli->edad?> <br>
              Localidad: <?=$cli->estado?>, <?=$cli->localidad?> <br>
              Cliente desde: <small class="text-muted"><?=$cli->fecha?></small>
              </div>
            </div>
      </a>
      </div>
      <?php endwhile;?>
    </div>


      <!-- <a href="?controller=cliente&action=ver&id=<?=$cli->id?>" class="nav-link" style="border:1px solid #ccc; margin-top:10px; border-radius:5px;">
    <div class="d-flex justify-content-between align-items-center flex-wrap text-muted pt-2" >
    <i class="fas fa-portrait fa-4x text-primary pb-1"></i>
      <p class="pb-1 mb-0 small ">
      <strong class="d-block text-gray-dark"> N° Cliente: <?=$cli->id?></strong>
        <strong class="d-block text-gray-dark"><?=$cli->nombre?>, <?=$cli->edad?></strong>
        <strong class="d-block text-gray-dark">Telefono: <?=$cli->telefono?></strong>
      </p>
      <p class="pb-1 mb-0 small  border-bottom">
        <strong class="d-block text-gray-dark">Estado: <?=$cli->estado?></strong>
        <strong class="d-block text-blue-dark">Localidad: <?=$cli->localidad?></strong>
        <strong class="d-block text-blue-dark">Direccion: <?=$cli->direccion?></strong>
      </p>
      <p class="card-text"><small class="text-muted"><?=$cli->fecha?></small></p>
    </div>
    </a> -->
  
    <small class="d-block text-end mt-3">
      <a href="?controller=cliente&action=todos">Todos los clientes</a>
    </small>
  </div>

</main>