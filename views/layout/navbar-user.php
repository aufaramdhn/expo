<?php
session_start();
include "../config.php";
include "../koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?= $title ?></title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="<?php echo $config ?>assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- My Bootstrap -->
    <link rel="stylesheet" href="<?php echo $config ?>assets/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="<?php echo $config ?>layout/user.css">

    <!-- <style>
        footer { position: fixed; bottom: 0px; width:100%; }
    </style> -->

</head>

<body class="d-flex flex-column">

    <main class="flex-shrink-0">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top ">
            <div class="container px-5">
                <h5 class="navlink text-white fw-bold text-center">Dewarangga</h5>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto ">
                        <li class="nav-item"><a class="nav-link <?= $active == 'home' ? 'active' : '' ?>" href="../home/index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link <?= $active == 'about' ? 'active' : '' ?>" href="../about/index.php">About</a></li>
                        <li class="nav-item"><a class="nav-link <?= $active == 'product' ? 'active' : '' ?>" href="../products/index.php">Product</a></li>
                        <li class="nav-item"><a class="nav-link <?= $active == 'order' ? 'active' : '' ?>" href="../order/index.php">Order</a></li>
                        <li class="nav-item"><span class="nav-link text-white-75">Welcome <?= $_SESSION['nama'] ?></span></li>

                        <a data-bs-toggle="modal" data-bs-target="#logout" class="mx-3"><button type="button" class="btn btn-primary">Logout <i class="bi bi-box-arrow-right"></i></button></a>
                    </ul>
                </div>
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
                            Apakah anda yakin ingin keluar dari website ini?
                        </strong>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                        <a href="../login/logout.php"><button type="submit" class="btn btn-danger">Ya</button></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Alert -->
        <?php if (isset($_SESSION['info'])) : ?>
            <div class="info-data" data-infodata="<?php echo $_SESSION['info']; ?>"></div>
        <?php
            unset($_SESSION['info']);
        endif;
        ?>