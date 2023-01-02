<?php
session_start();

require('../../../apps/koneksi.php');
require('../../../apps/config.php')

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.101.0">
  <title><?= $title ?></title>

  <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

  <link rel="stylesheet" href="<?php echo $config ?>assets/dist/css/bootstrap.min.css">

  <link rel="stylesheet" href="<?php echo $config ?>assets/styles/sidebar.css">

  <link rel="stylesheet" href="<?php echo $config ?>assets/styles/datatables.min.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

  <style>

  </style>
</head>

<body id="body-pd">
  <!-- Modal Logout -->

  <div class="modal fade" id="logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content text-center">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body d-flex flex-column" style="font-size: 76px;">
          <i class="bi bi-exclamation-circle text-warning"></i>
          <strong class="fs-6">
            Are you sure you want to leave this website?
          </strong>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
          <a href="<?php echo $config ?>views/auth/logout.php"><button type="submit" class="btn btn-danger">Yes</button></a>
        </div>
      </div>
    </div>
  </div>

  <header class="header" id="header">
    <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
  </header>
  <div class="l-navbar" id="nav-bar">
    <nav class="nav">
      <div>
        <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">STRANGER</span> </a>
        <div class="nav_list">
          <a href="<?php echo $config ?>views/admin/dashboard/index.php" class="nav_link <?= $active == 'dashboard' ? 'active' : '' ?>">
            <i class='bx bx-grid-alt nav_icon'></i>
            <span class="nav_name">Dashboard</span>
          </a>
          <a href="<?php echo $config ?>views/admin/user/index.php" class="nav_link <?= $active == 'user' ? 'active' : '' ?>">
            <i class='bx bx-user nav_icon'></i>
            <span class="nav_name">Users</span>
          </a>
          <a href="<?php echo $config ?>views/admin/orders/index.php" class="nav_link <?= $active == 'order' ? 'active' : '' ?>">
            <i class='bx bx-package nav_icon'></i>
            <span class="nav_name">Orders</span>
          </a>
          <a href="<?php echo $config ?>views/admin/products/index.php" class="nav_link <?= $active == 'product' ? 'active' : '' ?>">
            <i class='bx bxs-purchase-tag nav_icon'></i>
            <span class="nav_name">Products</span>
          </a>
        </div>
      </div>
      <a style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#logout" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
    </nav>
  </div>
  <!--Container Main start-->
  <div class="height-100">