<div class="container">
  <h2 class="border-bottom pb-2 ">Registrarse</h2>
  <?php 
if(isset($_SESSION['register'])&&  $_SESSION['register'] == 'complete'):?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
        Registro completado correctamente
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php elseif(isset($_SESSION['register'])&&  $_SESSION['register'] == 'failed'):?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
      Registro fallido, introduce bien los datos
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif;?>
    <?php Utils::deleteSession('register');?>



  <form action="?controller=usuario&action=save" method="POST">
  <div class="form-group mt-3">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" name="nombre" placeholder="Ingrese su nombre" required>
  </div>
  <div class="form-group mt-3">
    <label for="apellidos">Apellidos</label>
    <input type="text" class="form-control" name="apellidos" placeholder="Ingrese apellidos" required>
  </div>
  <div class="form-group mt-3">
  <label for="usuario">Usuario</label>
  <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1">@</span>
          <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="user">
  </div>
    </div>
  <div class="form-group mt-3">
    <label for="exampleInputEmail1">Correo</label>
    <input type="email" class="form-control" aria-describedby="emailHelp" name="email" placeholder="Ingrese un correo valido" required>
  </div>
  <div class="form-group mt-3">
    <label for="password">Contraseña</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Minimo 8 caracteres"   minlength="8" required>
  </div>
    <button type="submit" class="btn btn-success mt-2">Registrarse</button>
  </form>
</div>
