<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Stranger</title>

    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="assets/styles/globalStyle.css">
</head>

<body class="d-flex align-items-center min-vh-100">
    <!-- Alert -->
    <?php if (isset($_SESSION['info'])) : ?>
        <div class="info-data" data-infodata="<?php echo $_SESSION['info']; ?>"></div>
    <?php
        session_destroy();
    endif;
    ?>
    <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 col-md-10">
        <div class="card border-0">
            <div class="row justify-content-around align-items-center">
                <div class="col-md-6">
                    <div class="card1 pb-3">
                        <div class="row justify-content-center px-3 mt-5 border-line">
                            <img src="assets/images/login.webp" class="image mt-3 rounded-circle">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card2 card border-0 px-4 py-5">
                        <div class="row px-3 mb-4">
                            <div class="line"></div>
                            <div class="fw-bold text-center fs-2 text-dark">
                                <span class="">Login</span>
                            </div>
                            <div class="line"></div>
                        </div>
                        <form action="views/auth/cek-login.php" method="POST">
                            <div class="row px-3 mb-3">
                                <label class="mb-1">
                                    <h6 class="mb-0 text-sm">Username</h6>
                                </label>
                                <input type="text" class="form-control" name="username" placeholder="Masukan Username">
                            </div>
                            <div class="row px-3 mb-3">
                                <label class="mb-1">
                                    <h6 class="mb-0 text-sm">Password</h6>
                                </label>
                                <input type="password" class="form-control" name="password" placeholder="Masukan Password">
                            </div>
                            <div class="row mb-2 px-1 mt-2 ">
                                <a href="views/auth/cek-login.php"><button type="submit" class="btn btn-blue text-center btn-radius-10" value="Login">Login</button></a>
                            </div>
                            <div class="row">
                                <small class="font-weight-bold">Anda Belum Mempunyai Akun? <a class="text-danger text-blue" href="views/auth/register.php">Register</a></small>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="bg-blue py-3">
                <div class="row px-3">
                    <small class="ml-4 ml-sm-5 mb-2">Copyright &copy; 2022. All rights reserved.</small>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/script/jquery.js"></script>
    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/script/sweetalert.js"></script>
    <script src="assets/script/alert.js"></script>
</body>

</html>