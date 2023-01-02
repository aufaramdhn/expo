<?php
$active = 'product';
$title = 'Dewarangga | Pemesanan';
include('../../../layouts/navbar-user.php');

$id_product = $_GET['id_product'];
$product = mysqli_query($koneksi, "SELECT * FROM product WHERE id_product='$id_product'");
$pr = mysqli_fetch_array($product);
date_default_timezone_set('Asia/jakarta');
$today = date("Y-m-d H:i:s");

?>
<!-- Form Data -->
<div class="container mb-5 d-flex flex-column justify-content-center">
  <div class="card rounded shadow-lg my-5">
    <div class="card-header">
      <h3 class="my-3 text-center">Silahkan Isi Form Di Bawah Ini</h3>
    </div>
    <div class="card-body py-4">
      <div class="container p-3">
        <form method="post" enctype="multipart/form-data">
          <div class="mb-2">
            <label for="nama">Nama</label>
            <input type="text" class="form-control mb-2" id="nama" name="nama" placeholder="Nama User" value="<?= $_SESSION['nama'] ?>" readonly required>
          </div>
          <div class="mb-2">
            <label for="no_tlp">No.Telpon</label>
            <input type="text" class="form-control mb-2" id="no_tlp" name="no_tlp" placeholder="Nomer Telepon" value="<?= $_SESSION['notelp'] ?>" readonly required>
          </div>
          <div class="mb-2">
            <label for="paket">Paket</label>
            <input type="text" class="form-control mb-2" id="paket" name="paket" placeholder="Nomer Telepon" value="<?= $pr['paket'] ?>" readonly required>
          </div>
          <div class="mb-2">
            <label for="harga">Harga</label>
            <input type="text" class="form-control mb-2" id="harga" name="harga" value="Rp. <?= $pr['harga'] ?>" readonly required>
          </div>
          <div class="mb-2">
            <label for="pembayaran">Pembayaran</label>
            <select class="form-control mb-2" id="pembayaran" name="pembayaran" required>
              <option hidden value="">Pilih Metode Pembayaran</option>
              <?php
              $queryPembayaran = mysqli_query($koneksi, "SELECT * FROM pembayaran");
              foreach ($queryPembayaran as $pembayaran) { ?>
                <option value="<?= $pembayaran['id_pembayaran'] ?>"><?= $pembayaran['norek'] ?> (<?= $pembayaran['bank'] ?>)</option>
              <?php } ?>
            </select>
          </div>
          <div class="mb-2">
            <label for="pesan">Pesan</label>
            <textarea type="text" id="pesan" class="form-control mb-2" name="pesan" required></textarea>
            </select>
          </div>
          <div class="mb-2">
            <label for="bukti">Bukti Pembayaran</label>
            <input class="form-control" id="bukti" type="file" multiple name="bukti" required>
            <div class="form-text mb-2 fst-italic">*Format harus png, jpg. Maksimal ukuran 1mb</div>
          </div>
          <div class="mb-2">
            <label for="materi">Materi Website</label>
            <input class="form-control" id="materi" type="file" multiple name="materi" required>
            <div class="form-text mb-2 fst-italic">*Format harus docx, pdf. Maksimal ukuran 10mb</div>
          </div>
          <a><button id="liveAlertBtn" type="submit" class="btn btn-primary w-100 mt-4" name="bayar">Bayar</button></a>
        </form>
        <?php
        if (isset($_POST['bayar'])) {
          $id_user = $_SESSION['id'];
          $pembayaran =  $_POST['pembayaran'];
          $wkt = $_POST['wkt'];
          $pesan_user =  $_POST['pesan'];

          $ekstensi_diperbolehkan_bukti = array('png', 'jpg');
          $ekstensi_diperbolehkan_materi = array('docx', 'pdf');

          $bukti = $_FILES['bukti']['name'];
          $source_bukti = $_FILES['bukti']['tmp_name'];
          $ukuran_bukti = $_FILES['bukti']['size'];
          $folder_bukti = '../../../assets/bukti/';
          $x_bukti = explode('.', $bukti);
          $ekstensi_bukti = strtolower(end($x_bukti));

          $materi = $_FILES['materi']['name'];
          $source_materi = $_FILES['materi']['tmp_name'];
          $ukuran_materi = $_FILES['materi']['size'];
          $folder_materi = '../../../assets/materi/';
          $x_materi = explode('.', $materi);
          $ekstensi_materi = strtolower(end($x_materi));

          if (in_array($ekstensi_bukti, $ekstensi_diperbolehkan_bukti) === true and in_array($ekstensi_materi, $ekstensi_diperbolehkan_materi) === true) {
            //boleh upload file
            //uji jika ukuran file dibawah 10mb
            if ($ukuran_bukti < 10440700 and $ukuran_materi < 10440700) {
              //jika ukuran sesuai
              //PINDAHKAN FILE YANG DI UPLOAD KE FOLDER FILE aplikasi
              move_uploaded_file($source_bukti, $folder_bukti . $bukti);
              move_uploaded_file($source_materi, $folder_materi . $materi);

              //simpan data ke dalam database
              $sql = mysqli_query($koneksi, "INSERT INTO transaksi VALUES (NULL, '$id_user', '$id_product', '$pembayaran', '$wkt', '$pesan_user', '$bukti', '$materi', 'pending')");
              if ($sql) {
                $_SESSION['info'] = "berhasil_simpan";
                echo "<script>document.location='../order/index.php'</script>";
              } else {
                $_SESSION['info'] = "berhasil_simpan";
                echo "<script>document.location='index.php'</script>";
              }
            } else {
              //ukuran tidak sesuai
              $_SESSION['info'] = "ukuran";
              echo "<script>document.location='index.php'</script>";
            }
          } else {
            //ektensi file yang di upload tidak sesuai
            $_SESSION['info'] = "format";
            echo "<script>document.location='index.php'</script>";
          }
        }
        ?>
      </div>
    </div>
  </div>
</div>
<!-- Footer-->
<?php include('../../../layouts/footer-user.php') ?>