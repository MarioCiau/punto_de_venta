<?php if(isset($_SESSION['identify'])):?>
<div class="container">
<?php if(isset($_SESSION['datos'])):?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
  Se ha cambiado correctamente los datos del sistema.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php endif;?>
<?php Utils::deleteSession('datos');?>
<h2 class="border-bottom pb-2 ">Panel de administración</h2>
<div class="row">


<a class="col-xl-3 col-md-6 mb-4 cartas" href="?controller=usuario&action=gestion">
    <div class="card border-primary   shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Usuarios</div>
<?php $totalUsuarios=0; while($user=$usuarios->fetch_object()):
$totalUsuarios++;?>
<?php endwhile;?>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalUsuarios;?></div>
                </div>
                <div class="col-auto">
                <i class="fas fa-user fa-2x"></i>
                </div>
            </div>
        </div>
    </div>
</a>

<a class="col-xl-3 col-md-6 mb-4 cartas" href="?controller=cliente&action=todos">
    <div class="card border-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Clientes</div>
<?php $totalClientes=0; while($cust=$custumers->fetch_object()):
$totalClientes++;?>
<?php endwhile;?>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalClientes;?></div>
                </div>
                <div class="col-auto">
                <i class="fas fa-users fa-2x"></i>
                </div>
            </div>
        </div>
    </div>
</a>

<a class="col-xl-3 col-md-6 mb-4 cartas" href="?controller=producto&action=index">
    <div class="card border-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Productos</div>
<?php $totalProductos=0; while($pro=$products->fetch_object()):
$totalProductos++;?>
<?php endwhile;?>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalProductos;?></div>
                </div>
                <div class="col-auto">
                <i class="fas fa-clipboard-list fa-2x"></i>
                </div>
            </div>
        </div>
    </div>
</a>


<!-- Pending Requests Card Example -->
<a class="col-xl-3 col-md-6 mb-4 cartas" href="?controller=venta&action=ventas">
    <div class="card border-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Ventas</div>
                    <?php $totalVentas=0; while($pro=$sales->fetch_object()):
$totalVentas++;?>
<?php endwhile;?>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalVentas;?></div>
                </div>
                <div class="col-auto">
                <i class="fas fa-dollar-sign fa-2x"></i>
                </div>
            </div>
        </div>
    </div>
</a>
</div>

<h2 class="border-bottom pb-2 ">Configuración</h2>
<div class="row">
		<div class="col-lg-6 mt-2">
			<div class="card">
				<div class="card-header bg-dark text-white">
					Información Personal
				</div>
				<div class="card-body">
					<div class="form-group pb-2">
						<label>Nombre: <strong><?=$_SESSION['identify']->nombre?> <?=$_SESSION['identify']->apellidos?></strong></label>
					</div>
					<div class="form-group pb-2">
						<label>Correo: <strong><?=$_SESSION['identify']->email?></strong></label>
					</div>
					<div class="form-group pb-2">
						<label>Rol: <strong><?=$_SESSION['identify']->rol?></strong></label>
					</div>
				</div>
			</div>
		</div>
        
			<div class="col-lg-6 mt-2">
				<div class="card">
					<div class="card-header bg-dark text-white ">
						Datos de la Empresa
					</div>
					<div class="card-body">
						<form action="?controller=usuario&action=datos" method="post" class="p-1">
                        <div class="form-group">
								<label>Nombre Dueña:</label>
								<input type="text" name="dueña" class="form-control" value="<?php echo $_SESSION['dueña']?>" id="txtNombre" placeholder="Nombre de la Empresa" required class="form-control">
							</div>
							<div class="form-group">
								<label>RFC:</label>
								<input type="text" name="rfc" placeholder="RFC de la Empresa" required class="form-control" value="<?php echo $_SESSION['rfc']?>">
							</div>
                            <div class="form-group">
								<label>CURP:</label>
								<input type="text" name="curp" placeholder="Curp de la dueña" required class="form-control" value="<?php echo $_SESSION['curp']?>">
							</div>
							<div class="form-group">
								<label>Razon Social:</label>
								<input type="text" name="razonSocial" class="form-control" value="<?php echo $_SESSION['razonSocial']?>" id="txtRSocial" placeholder="Razon Social de la Empresa">
							</div>
							<div class="form-group">
								<label>Dirección:</label>
								<input type="text" name="direccionEmpresa" class="form-control" value="<?php echo $_SESSION['direccionEmpresa']?>" id="txtDirEmpresa" placeholder="Dirreción de la Empresa" required>
							</div>
                            <?php if(isset($_SESSION['admin'])):?>
							<div>
								<button type="submit" class="btn btn-primary btnChangePass mt-2"><i class="fas fa-save"></i> Guardar Datos</button>
							</div>
                            <?php else:?>
                            <br>
                                <span class="badge bg-secondary">CONTACTE AL ADMINISTRADOR PARA CONFIGURACIÓN</span>
                            <?php endif;?>

						</form>
					</div>
				</div>
			</div>
	</div>

</div>

<?php else:?>

<div class="container text-center">
<img src="assets/brand/LOGO.png" alt="" width="150px" heigth="50px">
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
          <ol class="carousel-indicators">
            <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"></li>
            <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"></li>
          </ol>
          <div class="carousel-inner ">
            <div class="carousel-item active">
			<img src="assets/dist/img/img1.jpg" alt="Los Angeles" class="img-fluid">

              <div class="carousel-caption d-none d-md-block">
                <h5>Controla tus ventas</h5>
                <p>Modulo de ventas diarias, semanales y mensuales.</p>
              </div>
            </div>
            <div class="carousel-item">
			<img src="assets/dist/img/img2.jpg" alt="Los Angeles" class="img-fluid">
              <div class="carousel-caption  d-md-block">
                <h5>Controla tus clientes</h5>
                <p>Modulo de clientes, para un mejor control.</p>
              </div>
            </div>
            <div class="carousel-item">
			<img src="assets/dist/img/img3.jpg" alt="Los Angeles" class="img-fluid">
              <div class="carousel-caption  d-md-block">
                <h5>Controla tus reportes</h5>
                <p>Modulo de reportes, para ingresos de ventas y abonos de todos tus clientes.</p>
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </a>
        </div>
</div>
<?php endif;?>