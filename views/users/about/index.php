<?php
$active = 'about';
$title = 'Stranger | About';
include('../../../layouts/navbar-user.php')
?>
<!-- Header-->
<header class="py-5 bg-light">
    <div class="container px-5">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-xxl-6">
                <div class="text-center my-5">
                    <h1 class="fw-bolder mb-5">Jasa Pembuatan Website Wordpress No #1 Terbaik Dan Profesional</h1>
                    <p class="lead fw-normal text-muted mb-4">Dewarangga adalah Agency Web Design dan Web Development yang melayani jasa pembuatan Website Wordpress untuk UMKM, Hotel, Perusahaan, Villa dll. Selain sebagai jasa pembuatan Webiste Wordpress kami juga sebagai Digital Marketing Agency atau Jasa Digital Marketing terbaik dan Profesional</p>
                    <p class="lead fw-normal text-muted mb-4">Kami adalah jasa pembuatan Website Wordpress No #1 Indonesia secara Profesional dan dengan senang hati akan membantu membangun sebuah website untuk anda dengan website design elegan serta premium yang didukung dengan website hosting (Space Hosting) yang leluasa menggunakan teknologi terkini seperti Cloud Hosting sehingga website anda di akses dengan cepat </p>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- About section one-->
<section class="py-3 " id="scroll-target">
    <div class="container px-5 my-5">
        <div class="row gx-5 align-items-center">
            <div class="col-lg-6"><img class="img-fluid rounded mb-5 mb-lg-0" src="<?php echo $config ?>assets/images/ceo.png" alt="..." /></div>
            <div class="col-lg-6">
                <h2 class="fw-bolder">Rian Stranger</h2>
                <strong><i>CEO</i></strong>
                <p class="lead fw-normal text-muted mb-0 mt-4">Rian Stranger adalah seorang ceo founder website wordpress terkenal sudah lebih dari 10.000 orang yang membuat website wordpress dengan Rian Stranger</p>
            </div>
        </div>
    </div>
</section>
<!-- About section two-->
<section class="py-5 bg-light">
    <div class="container px-5 my-5">
        <div class="row gx-5 align-items-center">
            <div class="col-lg-6 order-first order-lg-last"><img class="img-fluid rounded mb-5 mb-lg-0" src="<?php echo $config ?>assets/images/dev.png" alt="..." width="600"></div>
            <div class="col-lg-6">
                <h2 class="fw-bolder">Datangkan Lebih Banyak Calon Pelanggan</h2>
                <p class="lead fw-normal text-muted mb-0">Sekarang saatnya! Datangkan lebih banyak Antrian calon pelanggan dengan Smart Landing Page.
                    Smart Landing Page berbasis Sales Funnel yang bertujuan untuk mengkonversi pengunjung website Anda menjadi calon pelanggan.</p>
            </div>
        </div>
    </div>
</section>
<!-- Team members section-->
<section class="py-5 mt-5 bg-white" id="features col-lg-12">
    <div class="col-lg-12 mb-5 mb-lg-0 text-center">
        <h2 class="fw-bolder mb-0">Tim Web Developer</h2>
        <SMALL>Sudah tersetifikasi</SMALL>
    </div>
    <div class="container px-5 my-5">
        <div class="row gx-5">

            <div class="col">
                <div class="row gx-5 row-cols-1 row-cols-md-2 text-center">
                    <div class="col-lg-4 mb-5 h-100">
                        <div class="feature text-white mb-1 p-1"><img class="img-fluid my-3 rounded-circle" src="<?php echo $config ?>assets/images/frontend.png" width="150px" /></div>
                        <h2 class="h5">Charles</h2>
                        <h6><i>Frontend Developer</i></h4>
                            <p class="mt-2">Saya Charles Programmer bersetifikasi untuk pengembangan Website berbasis Smart Landing Page. Saya menguasai HTML, CSS, dan JavaScript. </p>
                    </div>
                    <div class="col-lg-4 mb-5 h-100">
                        <div class="feature text-white mb-1 p-1"><img class="img-fluid my-3 rounded-circle" src="<?php echo $config ?>assets/images/backend.png" width="150px" /></div>
                        <h2 class="h5">Edwin</h2>
                        <h6><i>Backend Developer</i></h4>
                            <p class="mb-0">Halo, Saya Edwin, Saya backend developer bersetifikasi yang mengusai pemrograman PHP, Ruby dan Database SQL dan Oracle serta sistem konfigurasi Cloud Server.</p>
                    </div>
                    <div class="col-lg-4 mb-5 mb-md-0 h-100">
                        <div class="feature text-white mb-1 p-1"><img class="img-fluid my-3 rounded-circle" src="<?php echo $config ?>assets/images/designer.png" width="150px" /></div>
                        <h2 class="h5">Charlote</h2>
                        <h6><i>Designer</i></h4>
                            <p class="mb-0">Saya Charlote, Saya merupakan designer bersetifikasi yang akan memberikan Anda desain UI/UX untuk Website bisnis Anda sesuai ekspektasi.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</main>
<!-- Footer-->
<?php include('../../../layouts/footer-user.php') ?>