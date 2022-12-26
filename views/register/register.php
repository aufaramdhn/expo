<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Dewarangga</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">

    <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />

    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="login.css">
</head>

<body>
    <?php
    include '../koneksi.php';
    if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == "gagal") {
            echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
        }
    }
    ?>

    <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-3 mx-auto col-md-8 ">
        <div class="card card0 border-0 mt-5">
            <div class="row d-flex">
                <div class="col-md-6">
                    <div class="card1 pb-3">
                        <div class="row">
                        </div>
                        <div class="row px-3 justify-content-center mt-3 border-line">
                            <img src="../assets/login.png" class="image mt-5 ml-5 " width="350px">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card2 card border-0 px-4 py-5">
                        <div class="row px-3 mb-2">
                            <div class="line"></div>
                            <div class="text-uppercase fw-bold text-center fs-3 mb-5 text-dark">
                                <span>Register</span>
                            </div>
                            <div class="line"></div>
                        </div>
                        <form action="cek-daftar.php" method="POST">

                            <div class="mb-3 ">
                                <label for="nama-lengkap" class="form-label">Nama Lengkap</label>
                                <input name="nama" type="text" class="form-control" id="nama-lengkap" placeholder="Nama Lengkap" required>
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

                            <!-- <div class="row px-3">
                                <label class="mb-1">
                                    <h6 class="mb-0 text-sm">Nama</h6>
                                </label>
                                <input class="mb-2" type="text" name="nama" placeholder="Masukan Nama" required>
                            </div>
                            <div class=" row px-1">
                                <label class="mb-1">
                                    <h6 class="mb-0 text-sm">No.Telepon</h6>
                                </label>
                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="border" style="padding: 13px 5px 7px 5px;">
                                        <span>+62</span>
                                    </div>
                                    <input class="mb-2" type="number" name="no_tlp" placeholder="Masukan No Telepon" required>
                                </div>
                            </div>
                            <div class="row px-3">
                                <label class="mb-1">
                                    <h6 class="mb-0 text-sm">Username</h6>
                                </label>
                                <input class="mb-2" type="text" name="username" placeholder="Masukan Username" required>
                            </div>
                            <div class="row px-3">
                                <label class="mb-1">
                                    <h6 class="mb-0 text-sm">Password</h6>
                                </label>
                                <input class="mb-2" type="password" name="password" required placeholder="Masukan Password">
                            </div> -->
                            <div class="row px-3">
                                <input class="mb-2" type="hidden" name="level" value="user">
                            </div>
                            <div class="row mb-2 mt-2 px-1 ">
                                <a href="cek-login.php"><input type="submit" class="btn btn-blue text-center btn-radius-10" value="Register"></a>
                            </div>
                            <div class="row mb-1 ">
                                <small class="font-weight-bold">Anda Sudah Mempunyai Akun? <a class="text-danger text-blue mt-2" href="../index.php">Login</a></small>
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