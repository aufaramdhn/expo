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
<div class="container mb-2 d-flex flex-column justify-content-center">
  <div class="card rounded shadow-lg mt-5">
    <div class="card-header">
      <h3 class="my-3 text-center">Silahkan Isi Form Di Bawah Ini</h3>
    </div>
    <div class="card-body py-4">
      <div class="container p-3">
        <form method="post" enctype="multipart/form-data">
          <table class="w-100" id="example">
            <tr>
              <td>Nama</td>
              <td>:</td>
              <td><input type="text" class="form-control mb-2" id="nama" name="nama" placeholder="Nama User" value="<?= $_SESSION['nama'] ?>" readonly required></td>
            </tr>
            <tr>
              <td>No.Telpon</td>
              <td>:</td>
              <td><input type="text" class="form-control mb-2" id="no_tlp" name="no_tlp" placeholder="Nomer Telepon" value="<?= $_SESSION['notelp'] ?>" readonly required></td>
            </tr>
            <tr>
              <td>Paket</td>
              <td>:</td>
              <td>
                <input type="text" class="form-control mb-2" id="paket" name="paket" placeholder="Nomer Telepon" value="<?= $pr['paket'] ?>" readonly required>
              </td>
            </tr>
            <tr>
              <td>Harga</td>
              <td>:</td>
              <td><input type="text" class="form-control mb-2" id="harga" name="harga" value="Rp. <?= $pr['harga'] ?>" readonly required></td>
            </tr>
            <tr>
              <td>Pembayaran</td>
              <td>:</td>
              <td>
                <select class="form-control mb-2" id="pembayaran" name="pembayaran" required>
                  <option hidden value="">Pilih Metode Pembayaran</option>
                  <?php
                  $queryPembayaran = mysqli_query($koneksi, "SELECT * FROM pembayaran");
                  foreach ($queryPembayaran as $pembayaran) { ?>
                    <option value="<?= $pembayaran['id_pembayaran'] ?>"><?= $pembayaran['norek'] ?> (<?= $pembayaran['bank'] ?>)</option>
                  <?php } ?>
                </select>
              </td>
            </tr>
            <tr hidden>
              <td>Waktu Pemesanan</td>
              <td>:</td>
              <td><input type="datetime-local" class="form-control mb-2" name="wkt" value="<?= $today ?>" required></input></td>
            </tr>
            <tr>
              <td>Pesan</td>
              <td>:</td>
              <td><textarea type="text" class="form-control mb-2" name="pesan" required></textarea></td>
            </tr>
            <tr>
              <td>Bukti Pembayaran</td>
              <td>:</td>
              <td>
                <input class="form-control" type="file" multiple name="bukti" required>
              </td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td>
                <div class="form-text mb-2 fst-italic">*Format harus png, jpg. Maksimal ukuran 1mb</div>
              </td>
            </tr>
            <tr>
              <td>Materi Website</td>
              <td>:</td>
              <td>
                <input class="form-control" type="file" multiple name="materi" required>
              </td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td>
                <div class="form-text mb-2 fst-italic">*Format harus docx, pdf. Maksimal ukuran 10mb</div>
              </td>
            </tr>
          </table>
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
                echo "<script>alert('Data anda berhasil di simpan'); document.location='../order/index.php'</script>";
              } else {
                echo "<script>alert('Data anda gagal di simpan); document.location='index.php'</script>";
              }
            } else {
              //ukuran tidak sesuai
              echo "<script>alert('Ukuran file terlalu besar, max 1mb'); document.location='index.php'</script>";
            }
          } else {
            //ektensi file yang di upload tidak sesuai
            echo "<script>alert('Format tidak di perbolehkan'); document.location='index.php'</script>";
          }


          // $sql = mysqli_query($koneksi, "INSERT INTO transaksi VALUES (NULL, '$id_user', '$id_product', '$pembayaran', '$wkt', '$pesan_user', '$bukti', '$materi', 'pending')");

          // if ($sql == true) {
          //   echo "<script>alert('Data anda berhasil disimpan, dan akan di proses oleh admin');</script>";
          //   // $_SESSION['info'] = 'disimpan';
          //   echo "<script>window.location=' ../order/index.php'</script>";
          // } else {
          //   echo "<script>alert('Data anda gagal disimpan, mohon dicek kembali data yang anda masukan');</script>";
          //   // $_SESSION['info'] = 'gagal';
          //   echo "<script>window.location=' index.php'</script>";
          // }
        }
        ?>
      </div>
    </div>
  </div>
</div>
<!-- Footer-->
<?php include('../../../layouts/footer-user.php') ?>