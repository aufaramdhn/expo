<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Dewarangga</title>

    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="assets/styles/globalStyle.css">
</head>

<body>
    <?php
    session_start();
    include 'apps/koneksi.php';
    if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == "gagal") {
            echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
        }
    }
    ?>

    <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-3 mx-auto mt-5 col-md-8 ">
        <div class="card card0 border-0 mt-5 ">
            <div class="row d-flex">
                <div class="col-md-6">
                    <div class="card1 pb-3">
                        <div class="row">
                        </div>
                        <div class="row px-3 justify-content-center mt-5 border-line">
                            <img src="assets/login-user.webp" class="image mt-3" width="300px">
                        </div>
                    </div>
                </div>
                <div class="col-md-5 ">
                    <div class="card2 card border-0 px-4 py-5">
                        <div class="row px-3 mb-4">
                            <div class="line"></div>
                            <div class="text-uppercase fw-bold text-center fs-4 mb-4 text-dark">
                                <span class="">Welcome To Dewarangga</span>
                            </div>
                            <div class="text-uppercase fw-bold text-center fs-2 text-dark">
                                <span class="">Login</span>
                            </div>
                            <div class="line"></div>
                        </div>
                        <form action="login/cek-login.php" method="POST">
                            <!-- <form action="" method="POST"> -->
                            <div class="row px-3 mb-3">
                                <label class="mb-1">
                                    <h6 class="mb-0 text-sm">Username</h6>
                                </label>
                                <input type="text" name="username" placeholder="Enter a valid email address">
                            </div>
                            <div class="row px-3 mb-3">
                                <label class="mb-1">
                                    <h6 class="mb-0 text-sm">Password</h6>
                                </label>
                                <input type="password" name="password" placeholder="Enter password">
                            </div>
                            <div class="row mb-2 px-1 mt-2 ">
                                <a href="login/cek-login.php"><button type="submit" class="btn btn-blue text-center btn-radius-10" value="Login">Login</button></a>
                                <!-- <input type="submit" name="submit" value="login"> -->
                            </div>
                            <div class="row">
                                <small class="font-weight-bold">Anda Belum Mempunyai Akun? <a class="text-danger text-blue" href="login/register.php">Register</a></small>
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

    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>