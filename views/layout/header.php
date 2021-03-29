<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gran Tope</title>
    <!-- Bootstrap core CSS -->
<script src='https://kit.fontawesome.com/66f5e943e2.js' crossorigin='anonymous'></script>
<script src="assets/dist/js/jquery-3.5.1.js"></script>
<script src="assets/dist/js/app.js"></script>
<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/dist/css/style.css">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="assets/dist/css/dashboard.css" rel="stylesheet">
  </head>
  <body>

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="?controller=usuario&action=index">Gran Tope    <span data-feather="activity"></span></a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Buscar" aria-label="Search">
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
    <?php if(!isset($_SESSION['identify'])):?>
      <a class="nav-link" href="#"><?php echo date("d") . " del " . date("m") . " de " . date("Y");?></a>
      <?php else:?>
        <a class="nav-link" href="?controller=usuario&action=logout">Cerrar Sesión <span data-feather="log-out"></a>
    <?php endif;?>
    </li>
  </ul>
</header>
<div class="container-fluid">
  <div class="row">