<?php
session_start();
require("../../../apps/config.php");
require("../../../apps/koneksi.php");
$id = $_SESSION['id'];
$img = $koneksi->query("SELECT * FROM user WHERE id='$id'");
$data = mysqli_fetch_array($img);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?= $title ?></title>
    <!-- Bootstrap icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <!-- My Bootstrap -->
    <link rel="stylesheet" href="<?php echo $config ?>assets/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="<?php echo $config ?>layouts/user.css">

    <style>
        html {
            position: relative;
            min-height: 100%;
        }

        body {
            margin-bottom: 40px;
        }

        footer {
            position: absolute;
            bottom: 0;
            width: 100%;
        }

        @media screen and (min-width: 768px) {
            body {
                margin-bottom: 30px;
            }
        }
    </style>

</head>

<body class="d-flex flex-column">

    <!-- Alert -->
    <?php if (isset($_SESSION['info'])) : ?>
        <div class="info-data" data-infodata="<?php echo $_SESSION['info']; ?>"></div>
    <?php
        unset($_SESSION['info']);
    endif;
    ?>

    <main class="flex-shrink-0">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top ">
            <div class="container px-5">
                <h5 class="navlink fw-bold text-center" style="color: #FFCA03;">STRANGER</h5>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto ">
                        <li class="nav-item"><a class="nav-link <?= $active == 'home' ? 'active' : '' ?>" href="../home/index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link <?= $active == 'about' ? 'active' : '' ?>" href="../about/index.php">About</a></li>
                        <li class="nav-item"><a class="nav-link <?= $active == 'product' ? 'active' : '' ?>" href="../products/index.php">Product</a></li>
                        <li class="nav-item"><a class="nav-link <?= $active == 'order' ? 'active' : '' ?>" href="../order/index.php">Order</a></li>
                        <li class="nav-item dropdown d-none d-lg-inline">
                            <a role="button" data-bs-toggle="dropdown" class="d-lg-flex align-items-center justify-content-center dropdown-toggle text-decoration-none text-white ms-2 text-">
                                <?php
                                if ($data['img'] == "NULL" or empty($data['img'])) {
                                ?>
                                    <span class="bi bi-person-circle fs-3 text-white"></span>
                                <?php
                                } else {
                                ?>
                                    <img class="rounded-circle mt-1" src="<?php echo $config ?>assets/profile/<?= $data['img'] ?>" alt="" width="30" height="30">
                                <?php
                                }
                                ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="../profile/index.php">Profile</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a href="<?php echo $config ?>index.php" class="btn btn-logout btn-primary ms-3">
                                        Logout <i class="bi bi-box-arrow-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item d-lg-none">
                            <hr class="divider text-white">
                        </li>
                        <li class="nav-item d-lg-none">
                            <a class="nav-link text-white " href="../profile/index.php">Profile</a>
                        </li>
                        <li class="nav-item d-lg-none">
                            <span class="nav-link text-white-75">
                                <a class="btn btn-logout btn-primary" href="<?php echo $config ?>index.php">
                                    Logout
                                </a>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Alert -->
        <?php if (isset($_SESSION['info'])) : ?>
            <div class="info-data" data-infodata="<?php echo $_SESSION['info']; ?>"></div>
        <?php
            unset($_SESSION['info']);
        endif;
        ?>