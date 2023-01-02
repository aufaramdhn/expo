<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Dewarangga</title>

    <link href="../../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../../assets/styles/globalStyle.css">
</head>

<body class="d-flex align-items-center min-vh-100">

    <?php if (isset($_SESSION['info'])) : ?>
        <div class="info-data" data-infodata="<?php echo $_SESSION['info']; ?>"></div>
    <?php
        session_destroy();
    // unset($_SESSION['info']);
    endif;
    ?>

    <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-3 mx-auto col-md-10">
        <div class="card border-0">
            <div class="row justify-content-around align-items-center">
                <div class="col-md-6">
                    <div class="card1 pb-3">
                        <div class="row px-3 justify-content-center mt-3 ">
                            <img src="../../assets/images/register.png" style="width: 70%;">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card2 card border-0 px-4 py-5">
                        <div class="row px-3 mb-2">
                            <div class="line"></div>
                            <div class="fw-bold text-center fs-3 mb-3 text-dark">
                                <span>Register</span>
                            </div>
                            <div class="line"></div>
                        </div>
                        <form action="cek-daftar.php" method="POST">
                            <div class="mb-3 ">
                                <label for="nama-lengkap" class="form-label">Nama Lengkap</label>
                                <input name="nama" type="text" class="form-control" id="nama-lengkap" placeholder="Nama Lengkap" required>
                            </div>
                            <div class="mb-3 ">
                                <label for="email" class="form-label">Email Address</label>
                                <input name="email" type="text" class="form-control" id="email" placeholder="Email Address" required>
                            </div>
                            <div class="mb-3">
                                <label for="floatingInputGroup1">No. Telepon</label>
                                <div class="d-flex mt-2">
                                    <span class="input-group-text">+62</span>
                                    <input name="no_tlp" type="text" class="form-control" id="floatingInputGroup1" placeholder="8XXXXXXXXXX" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input name="username" type="text" class="form-control" id="username" placeholder="Username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                            </div>
                            <div class="row mb-2 mt-2 px-1 ">
                                <button type="submit" name="register" class="btn btn-blue text-center btn-radius-10 ms-2">Register</button>
                            </div>
                            <div class="row mb-1 ">
                                <small class="font-weight-bold">Anda Sudah Mempunyai Akun? <a class="text-danger text-blue mt-2" href="../../index.php">Login</a></small>
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

    <script src="../../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/script/jquery.js"></script>
    <script src="../../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/script/sweetalert.js"></script>
    <script src="../../assets/script/alert.js"></script>
</body>

</html>