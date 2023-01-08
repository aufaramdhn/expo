<?php

$active = 'order';
$title = 'Stranger | Order';

include('../../../layouts/navbar-user.php');

$id = $_SESSION['id'];
$orders = mysqli_query($koneksi, "SELECT * FROM transaksi JOIN user ON (user.id = transaksi.id_user) JOIN product ON (product.id_product = transaksi.id_product) WHERE id_user = '$id' ORDER BY id_transaksi");
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

<div class="container mt-4 mb-5">
    <div class="row gx-md-5 gx-1">
        <?php if ($cek > 0) { ?>
            <?php $no = 1;
            foreach ($orders as $order) { ?>
                <div class="col-md-3 mt-2 mb-2">
                    <div class="d-flex align-items-center justify-content-center">
                        <div class="card p-0 " style="width: 20rem; box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22); ">
                            <span class="text-center border-3 border-dark border-bottom py-3 fw-bold fs-5 bg-dark rounded-top" style="color: #FFCA03;">STRANGER</span>
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
                            <div class="card-footer p-0" style="margin-bottom: -2px;">
                                <div class="fw-bold text-uppercase">
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
                                            <div class="d-flex justify-content-between align-items-center flex-column">
                                                <a data-bs-toggle="modal" data-bs-target="#exampleModal" style="cursor: pointer;">Beri Ulasan<i class='bx bx-star ms-1 text-warning'></i></a>
                                            </div>
                                        </div>
                                    <?php } else if ($order['status'] == 'pending') { ?>
                                        <div class="card-button bg-warning">
                                            <div class="d-flex justify-content-between align-items-center ">
                                                <span class="text-white  ">Pending</span>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Beri Ulasan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="opsi-order.php" method="POST">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="pesan" class="form-label">Pesan</label>
                            <input type="hidden" name="id_user" value="<?= $id ?>">
                            <textarea class="form-control" id="pesan" name="pesan" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Footer-->
    <?php include('../../../layouts/footer-user.php') ?>