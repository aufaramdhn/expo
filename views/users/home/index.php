        <?php

        $active = 'home';
        $title = 'Stranger | Home';

        include('../../../layouts/navbar-user.php')
        ?>
        <!-- Header-->
        <header class="bg-light py-5">
            <div class="container px-5">
                <div class="row gx-5">
                    <div class="col-lg-8 col-xl-7 col-xxl-6">
                        <div class="my-5 py-5  text-xl-start">
                            <h1 class="display-5 fw-bolder text-dark mb-2">Jasa Pembuatan Website Dengan Wordpress</h1>
                            <p class="lead fw-normal text-dark-50 mb-4">Konversi pengunjung website Anda
                                menjadi calon pelanggan dengan Smart Landing Page<span style="color: #F431B9; font-weight: bold;">
                            </p>
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                <a class="btn btn-primary btn-lg px-4 me-sm-3 rounded-pill" href="../products/index.php"><b>Mulai Sekarang <i class="bi bi-arrow-right ms-1"></i></b></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid my-3" src="<?php echo $config ?>assets/images/hero-img.png" alt="..." width="400" /></div>
                </div>
            </div>
        </header>
        <!-- Features section-->
        <section class="py-5 mt-5" id="features col-lg-12">
            <div class="col-lg-12 mb-5 mb-lg-0 text-center">
                <h2 class="fw-bolder mb-0">Bagaimana cara membuatnya?</h2>
                <SMALL>Proses pembuatan mudah, 2 hari tayang</SMALL>
            </div>
            <div class="container px-5 my-5">
                <div class="row gx-5">
                    <div class="col">
                        <div class="row gx-5 row-cols-1 row-cols-md-2 text-center">
                            <div class="col-lg-4 mb-5 h-100">
                                <div class="feature text-white rounded-3 mb-3 p-1"><img class="img-fluid my-3" src="<?php echo $config ?>assets/images/registered.png" alt="..." width="60px" /></div>
                                <h2 class="h5">Langkah Pertama</h2>
                                <p class="mb-0">Pilih paket pada menu pricing dengan tekan tombol pesan sekarang </p>
                            </div>
                            <div class="col-lg-4 mb-5 h-100">
                                <div class="feature text-white rounded-3 mb-3 p-1"><img class="img-fluid my-3" src="<?php echo $config ?>assets/images/friends.png" alt="..." width="60px" /></div>
                                <h2 class="h5">Langkah Kedua</h2>
                                <p class="mb-0">Isi form yang sudah di sediakan lalu pastikan anda tidak salah mengisi data</p>
                            </div>
                            <div class="col-lg-4 mb-5 mb-md-0 h-100">
                                <div class="feature text-white rounded-3 mb-3 p-1"><img class="img-fluid my-3" src="<?php echo $config ?>assets/images/credit-card.png" alt="..." width="60px" /></div>
                                <h2 class="h5">Langkah Ketiga</h2>
                                <p class="mb-0">Lakukan pembayaran. Lalu saya dan tim langsung buatkan Smart Landing Page Anda.</p>
                            </div>
                            <div class="col-lg-4 h-100">
                                <div class="feature rounded-3 mb-3 p-1"><img class="img-fluid my-3" src="<?php echo $config ?>assets/images/folder.png" alt="..." width="60px" /></div>
                                <h2 class="h5">Langkah Keempat</h2>
                                <p class="mb-0">Setekah melakukan pembayaran lalu kirimkan materi untuk isi pada website anda
                                </p>
                            </div>
                            <div class="col-lg-4 h-100">
                                <div class="feature rounded-3 mb-3 p-1"><img class="img-fluid my-3" src="<?php echo $config ?>assets/images/programing.png" alt="..." width="60px" /></div>
                                <h2 class="h5">Langkah Kelima</h2>
                                <p class="mb-0">Pengerjaan dan mengaktifkan
                                    Smart Landing Page Anda.
                                </p>
                            </div>
                            <div class="col-lg-4 h-100">
                                <div class="feature rounded-3 mb-3 p-1"><img class="img-fluid my-3" src="<?php echo $config ?>assets/images/denied.png" alt="..." width="60px" /></div>
                                <h2 class="h5">Langkah Keenam</h2>
                                <p class="mb-0">Smart Landing Page Anda
                                    Tayang 24 Jam Tanpa Down
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Testimonial -->
        <section class="my-5 px-3 pt-3 pb-5 bg-light">
            <div class="container">
                <div class="text-center mt-4">
                    <h2 class="fw-bolder">Testimoni</h2>
                    <p class="lead fw-normal text-muted mb-5">Kepuasan Pelanggan Stranger</p>
                </div>
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner bg-dark rounded">
                        <?php
                        $queryTestimoni = mysqli_query($koneksi, "SELECT * FROM testimoni JOIN user ON user.id = testimoni.id_user");
                        foreach ($queryTestimoni as $testimoni) {
                        ?>
                            <div class="carousel-item active rounded p-5 bg-dark text-white" data-interval="2000">
                                <center>
                                    <?php if ($testimoni['img'] == 'NULL') { ?>
                                        <div class="mb-3">
                                            <img src="<?php echo $config ?>assets/images/person-circle.svg" width="220" class="border rounded-circle bg-white p-2">
                                        </div>
                                    <?php } else { ?>
                                        <div class="imgbox ">
                                            <img src="<?php echo $config ?>assets/profile/<?= $testimoni['img'] ?>" width="200" height="200" class="rounded-circle border bg-white p-1">
                                        </div>
                                    <?php } ?>
                                    <h4 class="mt-3"><b><?= $testimoni['nama'] ?></b></h4>
                                    <p class="w-75 text-muted"><?= $testimoni['pesan'] ?></p>
                                </center>
                            </div>
                        <?php } ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

            </div>
        </section>

        <!-- Footer-->
        <?php include('../../../layouts/footer-user.php') ?>