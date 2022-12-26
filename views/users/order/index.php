<?php

$active = 'order';
$title = 'Dewarangga | Order';

include '../layout/navbar-user.php';

$id_transaksi = $_SESSION['id'];
$orders = mysqli_query($koneksi, "SELECT * FROM transaksi JOIN user ON (user.id = transaksi.id_user) JOIN product ON (product.id_product = transaksi.id_product) WHERE id_user = '$id_transaksi' ORDER BY id_transaksi");
$cek = mysqli_num_rows($orders);


?>

<style>
    .card-button {
        display: flex;
        justify-content: center;
        padding: 20px 0;
        width: 100%;
        color: #fff;
        border-radius: 0 0 8px 8px;
    }
</style>

<div class=" min-vh-100 container mt-5 mb-5 d-flex flex-column">
    <div class="row gx-5 align-content-center">
        <!-- Pricing card free-->

        <?php if ($cek > 0) { ?>
            <?php $no = 1;
            foreach ($orders as $order) { ?>
                <div class="col-md-3 mt-2 mb-2">
                    <div class="card p-0 " style="width: 20rem; box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22); ">
                        <div class="card-image" style="border-bottom:solid 1px;">
                            <img src="../assets/dw.png" class="my-4 mx-4 " width="250" />
                        </div>
                        <div class="bg-white">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="fs-5 text-uppercase fw-bold text-muted mt-2 ms-4">
                                    <?php if ($order['paket'] == 'BRONZE') { ?>
                                        <span style="color:#CD7F32;"><?= $order['paket'] ?></span>
                                    <?php } else if ($order['paket'] == 'SILVER') { ?>
                                        <span style="color:#C0C0C0;"><?= $order['paket'] ?></span>
                                    <?php } else if ($order['paket'] == 'GOLD') { ?>
                                        <span style="color:#FFD700;"><?= $order['paket'] ?></span>
                                    <?php } else if ($order['paket'] == 'PLATINUM') { ?>
                                        <span style="color:#E5E4E2;"><?= $order['paket'] ?></span>
                                    <?php } else if ($order['paket'] == 'DIAMOND') { ?>
                                        <span style="color:#B9F2FF;"><?= $order['paket'] ?></span>
                                    <?php } else if ($order['paket'] == 'CROWN') { ?>
                                        <span style="color:#BF913B ;"><?= $order['paket'] ?></span>
                                    <?php } ?>
                                </div>

                            </div>
                        </div>
                        <div class="card-body">
                            <p class="card-text mt-2 ms-2"><?= $order['pesan'] ?></p>

                        </div>
                        <div class="fs-6 fw-bold text-black mt-2 ms-4"><?= $order['wkt'] ?></div>

                        <?php if ($order['status'] == 'accept') { ?>
                            <p class="card-text mt-3  text-center" style="font-size: 14px; margin-bottom:1px; "><i>Estimasi Selesai 2 Hari Setelah Pemesanan</i></p>

                        <?php } else if ($order['status'] == 'reject') { ?>
                            <p class="card-text mt-3  text-center" style="font-size: 14px; margin-bottom:1px; "><i>Maaf Pesanan Anda Ditolak</i></p>
                        <?php } else if ($order['status'] == 'done') { ?>
                            <p class="card-text mt-3  text-center" style="font-size: 14px; margin-bottom:1px; "><i>Pesanan Anda Sudah Selesai</i></p>
                        <?php } else if ($order['status'] == 'pending') { ?>
                            <p class="card-text mt-3  text-center" style="font-size: 14px; margin-bottom:1px; "><i>Sedang Menunggu Pesanan Di Konfirmasi</i></p>
                        <?php } ?>
                        <div class="card-footer  p-0" style="margin-bottom: -2px;">
                            <div class="text-uppercase fw-bold text-muted">
                                <?php if ($order['status'] == 'accept') { ?>
                                    <div class="card-button bg-success">
                                        <div class="d-flex justify-content-between align-items-center ">
                                            <span class="text-white">Accept</span>
                                        </div>
                                    </div>

                                <?php } else if ($order['status'] == 'reject') { ?>
                                    <div class="card-button bg-danger">
                                        <div class="d-flex justify-content-between align-items-center ">
                                            <span class="text-white">Reject</span>
                                        </div>
                                    </div>
                                <?php } else if ($order['status'] == 'done') { ?>
                                    <div class="card-button bg-success">
                                        <div class="d-flex justify-content-between align-items-center ">
                                            <span class="text-white">Done</span>
                                        </div>
                                    </div>
                                <?php } else if ($order['status'] == 'pending') { ?>
                                    <div class="card-button bg-warning">
                                        <div class="d-flex justify-content-between align-items-center ">
                                            <span class="text-white">Pending</span>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php } else { ?>
            <div class="d-flex justify-content-center align-items-center">
                <h1>Maaf anda belum order product kami, <a href="../products/index.php">SILAHKAN PESAN</a></h1>
            </div>
        <?php } ?>

    </div>
    <!-- Footer-->
    <?php include('../layout/footer-user.php') ?>