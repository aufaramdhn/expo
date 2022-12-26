<?php
session_start();

include '../../koneksi.php';
include "../../config.php";

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.101.0">
  <title>Admin | Dewarangga</title>

  <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

  <link rel="stylesheet" href="<?php echo $config ?>assets/dist/css/bootstrap.min.css">

  <link rel="stylesheet" href="<?php echo $config ?>admin/admin.css">

  <link rel="stylesheet" href="<?php echo $config ?>assets/styles/datatables.min.css">
</head>

<body>
  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Dewarangga</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="bg-dark w-100"></div>
    <div class="navbar-nav">
      <div class="nav-item text-nowrap d-flex align-content-center align-self-center align-items-center">
        <span class="text-bg-dark w-100 ms-auto pe-sm-2">Welcome Admin <?= $_SESSION['nama'] ?> </span>
        <a data-bs-toggle="modal" data-bs-target="#logout" class="mx-3"><button type="submit" class="text-white-50 bg-transparent border-0">Logout</button></a>
      </div>
    </div>
  </header>
  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3 sidebar-sticky">
          <ul class="nav flex-column justify-content-center">
            <li class="nav-item">
              <a class="nav-link fs-6 <?= $active == 'dashboard' ? 'active' : '' ?>" href="<?php echo $config ?>admin/dashboard/index.php">
                <span data-feather="home" class="align-text-bottom"></span>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link fs-6 <?= $active == 'user' ? 'active' : '' ?>" href="<?php echo $config ?>admin/user/index.php">
                <span data-feather="user" class="align-text-bottom"></span>
                Users
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link fs-6 <?= $active == 'order' ? 'active' : '' ?>" href="<?php echo $config ?>admin/orders/index.php">
                <span data-feather="file" class="align-text-bottom"></span>
                Orders
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link fs-6 <?= $active == 'product' ? 'active' : '' ?>" aria-current="page" href="<?php echo $config ?>admin/products/index.php">
                <span data-feather="shopping-cart" class="align-text-bottom"></span>
                Products
              </a>
            </li>
          </ul>
        </div>
      </nav>

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
              <a href="<?php echo $config ?>login/logout.php"><button type="submit" class="btn btn-danger">Yes</button></a>
            </div>
          </div>
        </div>
      </div>