<?php if(isset($_SESSION['identify'])):?>
<div class="container">
<h2 class="border-bottom pb-2 ">Panel de administración</h2>
<div class="row">


<a class="col-xl-3 col-md-6 mb-4 cartas" href="#">
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
						<form action="empresa.php" method="post" id="frmEmpresa" class="p-1">
							<div class="form-group">
								<label>RFC:</label>
								<input type="text" name="txtDni" value="" id="txtDni" placeholder="RFC de la Empresa" required class="form-control">
							</div>
							<div class="form-group">
								<label>Nombre:</label>
								<input type="text" name="txtNombre" class="form-control" value="" id="txtNombre" placeholder="Nombre de la Empresa" required class="form-control">
							</div>
							<div class="form-group">
								<label>Razon Social:</label>
								<input type="text" name="txtRSocial" class="form-control" value="" id="txtRSocial" placeholder="Razon Social de la Empresa">
							</div>
							<div class="form-group">
								<label>Teléfono:</label>
								<input type="phone" name="txtTelEmpresa" class="form-control" value="" id="txtTelEmpresa" placeholder="Teléfono de la Empresa" required>
							</div>
							<div class="form-group">
								<label>Correo Electrónico:</label>
								<input type="email" name="txtEmailEmpresa" class="form-control" value="" id="txtEmailEmpresa" placeholder="Correo de la Empresa" required>
							</div>
							<div class="form-group">
								<label>Dirección:</label>
								<input type="text" name="txtDirEmpresa" class="form-control" value="" id="txtDirEmpresa" placeholder="Dirreción de la Empresa" required>
							</div>

							<div>
								<button type="submit" class="btn btn-primary btnChangePass mt-2"><i class="fas fa-save"></i> Guardar Datos</button>
							</div>

						</form>
					</div>
				</div>
			</div>
	</div>

</div>

<?php else:?>

<div class="container">
<h2 class="border-bottom pb-2 text-muted display-6 text-center">EL GRAN TOPE UMAN</h2>
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