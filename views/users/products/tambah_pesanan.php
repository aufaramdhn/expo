<?php
$active = 'product';
$title = 'Dewarangga | Pemesanan';
include '../layout/navbar-user.php';

$id_product = $_GET['id_product'];
$product = mysqli_query($koneksi, "SELECT * FROM product WHERE id_product='$id_product'");
$pr = mysqli_fetch_array($product);
date_default_timezone_set('Asia/jakarta');
$today = date("Y-m-d H:i:s");

?>
<!-- Form Data -->
<div class=" min-vh-100 container mb-2 d-flex flex-column justify-content-center">
  <h3 class="my-3  text-center">Silahkan Isi Form Di Bawah Ini</h3>
  <div class="card py-5 rounded shadow-lg p-2">
    <div class="card-body">
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
              <!-- <td><input type="text" class="form-control mb-2" id="harga" name="harga" value="Rp. <?= number_format($pr['harga'], 0, ".", ".") ?>" disabled required></td> -->
              <td><input type="text" class="form-control mb-2" id="harga" name="harga" value="Rp. <?= $pr['harga'] ?>" readonly required></td>
            </tr>
            <tr>
              <td>Pembayaran</td>
              <td>:</td>
              <td>
                <select class="form-control mb-2" id="pembayaran" name="pembayaran" required>
                  <option hidden>Pilih Metode Pembayaran</option>
                  <option>No.rekening : 982301010 (BCA)</option>
                  <option>No.rekening : 982301010 (BRI)</option>
                  <option>No.rekening : 982301010 (BNI)</option>
                  <option>No.rekening : 982301010 (MANDIRI)</option>
                  <option>No : 08712837377 (OVO)</option>
                  <option>No : 08712837377 (DANA)</option>
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
              <td><input class="form-control mb-2" type="file" id="formFileMultiple" multiple name="bukti" required></td>
            </tr>
            <tr>
              <td>Materi Website</td>
              <td>:</td>
              <td><input class="form-control mb-2" type="file" id="formFileMultiple" multiple name="materi" required></td>
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
          $folder1 = '../../bukti/';
          $bukti = $_FILES['bukti']['name'];
          $source = $_FILES['bukti']['tmp_name'];
          $folder = '../../materi/';
          $materi = $_FILES['materi']['name'];
          $source_materi = $_FILES['materi']['tmp_name'];
          $folder_materi = 'materi/';


          $upload = move_uploaded_file($source, '../bukti/' . $bukti);
          $upload_materi = move_uploaded_file($source_materi, '../materi/' . $materi);


          $sql = mysqli_query($koneksi, "INSERT INTO transaksi VALUES (NULL, '$id_user', '$id_product', '$pembayaran', '$wkt', '$pesan_user', '$bukti', '$materi', 'pending')");

          if ($sql == true) {
            echo "<script>alert('Data anda berhasil disimpan, dan akan di proses oleh admin');</script>";
            // $_SESSION['info'] = 'disimpan';
            echo "<script>window.location=' ../order/index.php'</script>";
          } else {
            echo "<script>alert('Data anda gagal disimpan, mohon dicek kembali data yang anda masukan');</script>";
            // $_SESSION['info'] = 'gagal';
            echo "<script>window.location=' index.php'</script>";
          }
        }
        ?>
      </div>
    </div>
  </div>
</div>
<!-- Footer-->
<?php include('../layout/footer-user.php') ?>