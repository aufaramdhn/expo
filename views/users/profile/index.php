<?php

$title = 'Stranger | Profile';

include('../../../layouts/navbar-user.php');
date_default_timezone_set('Asia/jakarta');
$today = date("Y-m-d H:i:s");
$id = $_SESSION['id'];
$sql = $koneksi->query("SELECT * FROM user WHERE id='$id'");
$data = mysqli_fetch_array($sql);
if (mysqli_num_rows($sql) > 0) {
    $nama = $data['nama'];
    $username = $data['username'];
    $password = $data['password'];
    $no_tlp = $data['no_tlp'];
    $email = $data['email'];
    $img = $data['img'];
}
?>

<div class="container my-5">
    <div class="card shadow-lg pb-5">
        <div class="card-header mb-5 d-flex justify-content-center">
            <span class="fs-3">Halaman Profile</span>
        </div>
        <?php if (isset($_POST['bubah'])) { ?>
            <form action="opsi_profile.php" method="POST" enctype="multipart/form-data">
                <div class="card-body row">
                    <div class="d-flex justify-content-xs-center flex-column align-items-center col-md-4 mb-5">
                        <?php
                        if ($img == "NULL") {
                        ?>
                            <div class="mb-3">
                                <img src="<?php echo $config ?>assets/images/person-circle.svg" width="200" alt="">
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="mb-3">
                                <img class="rounded-circle" src="<?php echo $config ?>assets/profile/<?= $img ?>" alt="" width="250" height="250">
                            </div>
                        <?php
                        }
                        ?>
                        <div class="mb-3">
                            <input class="d-none" name="img_new" type="file" id="img">
                            <input class="d-none" name="img_old" type="hidden" value="<?= $img ?>">
                            <label class="btn btn-primary" for="img">Kirim Foto</label>
                        </div>
                    </div>
                    <div class="col-md-8 pe-5">
                        <input type="hidden" name="id" value="<?= $id; ?>">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" id="nama" aria-describedby="emailHelp" value="<?= $nama ?>">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email" value="<?= $email ?>">
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" id="username" value="<?= $username ?>">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="text" name="password" class="form-control" id="password" value="<?= $password ?>">
                        </div>
                        <div class="mb-3">
                            <label for="no_tlp" class="form-label">No. Telepon</label>
                            <input type="text" name="no_tlp" class="form-control" id="no_tlp" value="<?= $no_tlp ?>">
                        </div>
                        <div class="d-flex justify-content-end mt-5 text-white">
                            <button type="submit" class="btn btn-danger me-3 text-white" name="bbatal">Batal</button>
                            <button type="submit" class="btn btn-warning text-white" name="bkirim">kirim</button>
                        </div>
                    </div>
                </div>
            </form>
        <?php } else { ?>
            <form method="POST" enctype="multipart/form-data">
                <div class="card-body row">
                    <div class="d-flex justify-content-xs-center flex-column align-items-center col-md-4 mb-5">
                        <?php if ($img == 'NULL') { ?>
                            <div class="mb-3">
                                <img src="<?php echo $config ?>assets/images/person-circle.svg" width="200" alt="">
                            </div>
                        <?php } else { ?>
                            <div class="mb-3">
                                <img class="rounded-circle" src="<?php echo $config ?>assets/profile/<?= $img ?>" alt="" width="250" height="250">
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col-md-8 pe-5">
                        <input type="hidden" name="id" value="<?= $_SESSION['id']; ?>">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" aria-describedby="emailHelp" value="<?= $nama ?>" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" value="<?= $email ?>" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" value="<?= $username ?>" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" value="<?= $password ?>" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="telp" class="form-label">No. Telepon</label>
                            <input type="text" class="form-control" id="telp" value="<?= $no_tlp ?>" disabled>
                        </div>
                        <div class="d-flex justify-content-end mt-5 ">
                            <button type="submit" class="btn btn-warning text-white" name="bubah">ubah</button>
                        </div>
                    </div>
                </div>
            </form>
        <?php } ?>
    </div>
</div>
<?php include('../../../layouts/footer-user.php') ?>