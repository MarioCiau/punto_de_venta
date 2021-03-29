<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">

<?php ob_start();?>
<?php if(isset($_SESSION['error_login'])&&  $_SESSION['error_login'] == 'Identificacion fallida'):?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Los datos ingresados no son correctos.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php endif;?>
<?php Utils::deleteSession('error_login');?>
<?php $stats = Utils::statsCarrito(); ?>
<?php if(isset($_SESSION['carrito'])):?>
        <h4 class="d-flex justify-content-evenly align-items-center mt-2">
          <span class="text-muted">Carrito</span>
          <span class="badge bg-secondary rounded-pill"><?=$stats['count']?></span>
        </h4>
        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
            <a href="?controller=carrito&action=index" style="text-decoration:none; color:#888;">
              <h6 class="my-0">Productos</h6>
              </a>
            </div>
            <span class="text-muted">(<?=$stats['count']?>)</span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span>Total (MXN)</span>
            <strong>$<?=$stats['total']?></strong>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-sm nav-item">
            <div>
            <a href="?controller=carrito&action=index" style="text-decoration:none; color:#888;">
              <h6 class="my-0">Ver el carrito</h6>
              </a>
            </div>
            <span class="text-muted"><i class="fas fa-eye"></i></span>
          </li>
        </ul>
<?php endif;?>

      <div class="position-sticky pt-2">
        <ul class="nav flex-column">
        <?php if(isset($_SESSION['identify'])):?>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="?controller=usuario&action=index">
              <span data-feather="home"></span>
              Inicio
            </a>
          </li>
          <?php $categorias = Utils::showCategorias();?>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <span data-feather="file"></span>
          Categorias
                  </a>
            <div class="dropdown-menu">
        <?php while($cat = $categorias->fetch_object()):?>
        <a class="dropdown-item" href="?controller=categoria&action=ver&id=<?=$cat->id?>"><?=$cat->nombre?></a>
        <?php endwhile;?>
      </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?controller=producto&action=index">
              <span data-feather="shopping-cart"></span>
              Productos
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?controller=cliente&action=index">
              <span data-feather="users"></span>
              Clientes
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?controller=venta&action=index">
              <span data-feather="layers"></span>
              Vender
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?controller=abonos&action=index">
              <span data-feather="bar-chart-2"></span>
              Abonar
            </a>
          </li>
<?php else:?>
        <li>
        <a class="nav-link" href="?controller=usuario&action=registro">
        <span data-feather="user-plus"></span>
              Registrate
            </a>
        </li>
<?php endif;?>
</ul>


<?php if(isset($_SESSION['admin'])):?>
<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted"><span>Acciones de Administrador</span></a></h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="?controller=categoria&action=index">
              <span data-feather="settings"></span>
              Gestionar Categorias
            </a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="?controller=producto&action=gestion">
              <span data-feather="settings"></span>
              Gestionar Productos
            </a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="?controller=cliente&action=gestion">
              <span data-feather="settings"></span>
              Gestionar Clientes
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?controller=reporte&action=index">
              <span data-feather="settings"></span>
              Gestionar Reportes
            </a>
          </li>
        </ul>
<?php endif;?>

<?php if(!isset($_SESSION['identify'])):?>
      <div class="login">
      <form action="?controller=usuario&action=login" method="POST">
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center mt-2 mb-1 text-muted">
          <span>INICIAR SESIÓN</span>
        </h6>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="user" placeholder="name@example.com">
            <label for="email">Usuario</label>
          </div>
          <div class="form-floating">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <label for="password">Contraseña</label>
          </div>
          <div class="col-12">
            <button class="btn btn-primary mt-2" type="submit">Entrar <span data-feather="log-in"></span></button>
          </div>
        </form>
  </div>
<?php else:?>
    <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#">
              <span data-feather="user"></span>
              Bienvenido, <?=$_SESSION['identify']->nombre?>
            </a>
          </li>
      </ul>
<?php endif;?>
    </nav>
<!--Principal-->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex align-items-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3" >
     <!--Parte superior-->
