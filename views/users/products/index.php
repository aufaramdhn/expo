<?php

$active = 'product';
$title = 'Stranger | Product';

include('../../../layouts/navbar-user.php');

$transaksi_product = mysqli_query($koneksi, "SELECT * FROM product");

?>
<!-- Pricing section-->
<section class="bg-light">
    <div class="container px-md-5 px-2 my-5">
        <div class="text-center">
            <h1 class="fw-bolder">Bayar Saat Anda Puas dengan Hasil Kerja Kami</h1>
            <p class="lead fw-normal text-muted mb-0">Dengan paket harga yang sesuai keinginan anda</p>
        </div>
        <hr>
        <!-- Pricing section-->
        <section class="py-lg-5 bg-light">
            <div class="container-md container-fluid px-lg-5 my-lg-5">
                <div class="text-center mb-5">
                    <h2 class="fw-bolder">Biaya Jasa Pembuatan Website Dengan Wordpress</h2>
                    <span class="p-2 text-success mt-2 border-bottom border-3 border-success"><strong>di Stranger</strong></span>
                </div>
                <div class="row justify-content-center">
                    <!-- Pricing card free-->
                    <?php $no = 1;
                    foreach ($transaksi_product as $transaksi) { ?>
                        <div class="col-lg-6 col-xl-4 mb-md-4 mb-0">
                            <div class="card mb-md-5 mb-3 mb-xl-0 shadow">
                                <div class="card-body p-3">
                                    <div class="fs-5 text-uppercase fw-bold text-muted">
                                        <?php if ($transaksi['paket'] == 'BRONZE') { ?>
                                            <span style="color:#CD7F32;">Bronze</span>
                                        <?php } else if ($transaksi['paket'] == 'SILVER') { ?>
                                            <span style="color:#C0C0C0;"><?= $transaksi['paket'] ?></span>
                                        <?php } else if ($transaksi['paket'] == 'GOLD') { ?>
                                            <span style="color:#FFD700;"><?= $transaksi['paket'] ?></span>
                                        <?php } else if ($transaksi['paket'] == 'PLATINUM') { ?>
                                            <span style="color:#E5E4E2;"><?= $transaksi['paket'] ?></span>
                                        <?php } else if ($transaksi['paket'] == 'DIAMOND') { ?>
                                            <span style="color:#B9F2FF;"><?= $transaksi['paket'] ?></span>
                                        <?php } else if ($transaksi['paket'] == 'CROWN') { ?>
                                            <span style="color:#BF913B ;"><?= $transaksi['paket'] ?></span>
                                        <?php } else { ?>
                                            <span style="color:#BF913B ;"><?= $transaksi['paket'] ?></span>
                                        <?php }  ?>
                                    </div>
                                    <div class="mb-3">
                                        <span class="display-4 fw-bold" style="font-size: 20px">Rp. <span style="font-size: 30px"><?= $transaksi['harga'] ?></span></span>
                                        <span class="text-muted">/ Tahun</span>
                                    </div>
                                    <ul class="list-unstyled mb-4">
                                        <li class="mb-2">
                                            <i class="bi bi-check text-primary"></i>
                                            <?= $transaksi['halaman'] ?> Halaman
                                        </li>
                                        <li class="mb-2">
                                            <i class="bi bi-check text-primary"></i>
                                            Gratis Domain <?= $transaksi['domain'] ?>
                                        </li>
                                        <li class="mb-2">
                                            <i class="bi bi-check text-primary"></i>
                                            Strorage <?= $transaksi['penyimpanan'] ?>
                                        </li>
                                        <li class="mb-2">
                                            <i class="bi bi-check text-primary"></i>
                                            Free <?= $transaksi['free_ssl'] ?>
                                        </li>
                                        <li class="mb-2">
                                            <i class="bi bi-check text-primary"></i>
                                            <?= $transaksi['revisi'] ?> Revisi
                                        </li>
                                        <li class="mb-2 text">
                                            <i class="bi bi-check text-primary"></i>
                                            <?= $transaksi['wordpress'] ?> Premium
                                        </li>
                                        <li class="mb-2 text">
                                            <i class="bi bi-check text-primary"></i>
                                            Gratis Tombol <?= $transaksi['whatsapp'] ?>
                                        </li>
                                        <li class="mb-2 text">
                                            <i class="bi bi-check text-primary"></i>
                                            <?= $transaksi['responsif'] ?>
                                        </li>
                                        <li class="mb-2 text">
                                            <i class="bi bi-check text-primary"></i>
                                            <?= $transaksi['penayangan'] ?>
                                        </li>
                                        <li class="mb-2 text">
                                            <i class="bi bi-check text-primary"></i>
                                            <?= $transaksi['email'] ?> Akun Email Maksimal
                                        </li>
                                        <li class="mb-2 text">
                                            <i class="bi bi-check text-primary"></i>
                                            Perpanjangan Rp. <?= $transaksi['perpanjangan'] ?><br> &nbsp&nbsp&nbsp&nbsp&nbsp/ Tahun
                                        </li>
                                    </ul>
                                    <div class="d-grid align-center ml-5 mb-2"><a class="btn btn-primary rounded-pill fw-bold" href="tambah_pesanan.php?id_product=<?= $transaksi['id_product'] ?>">Pesan Sekarang !</a></div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
    </div>
</section>
<!-- Footer-->
<?php include('../../../layouts/footer-user.php') ?>