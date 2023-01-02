<?php
$active = 'order';
$title = 'Stranger | Orders';
include('../../../layouts/navbar-admin.php');
$orders = mysqli_query($koneksi, "SELECT * FROM transaksi JOIN user ON (user.id = transaksi.id_user) JOIN product ON (product.id_product = transaksi.id_product) JOIN pembayaran ON (pembayaran.id_pembayaran = transaksi.id_pembayaran)");

?>


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Data Orders</h1>
</div>
<div class="table-responsive ">
  <table id="example" class="table table-striped table-bordered table-sm">
    <thead>
      <tr class="text-center">
        <th scope="col" class="text-center">No</th>
        <th scope="col">Nama</th>
        <th scope="col">No.Telepon</th>
        <th scope="col">Paket</th>
        <th scope="col">Metode Pembayaran</th>
        <th scope="col">Waktu Pemesanan</th>
        <th scope="col">Pesan</th>
        <th scope="col">Bukti Pembayaran</th>
        <th scope="col">Materi Website</th>
        <th scope="col">Status</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1;
      foreach ($orders as $order) { ?>
        <tr class="text-center">
          <td class="text-center"><?= $no++; ?></td>
          <td><?= $order['nama'] ?></td>
          <td><?= $order['no_tlp'] ?></td>
          <td><?= $order['paket'] ?></td>
          <td><?= $order['norek'] ?> (<?= $order['bank'] ?>)</td>
          <td><?= $order['wkt'] ?></td>
          <td class="text-break"><span><?= $order['pesan'] ?></span></td>
          <td>
            <a button class="btn" data-bs-toggle="modal" data-bs-target="#bgambar<?= $no ?>">
              <img src="<?php echo $config ?>assets/bukti/<?= $order['bukti'] ?>" alt="" width="60" height="40">
            </a>
          </td>
          <td><a button class="btn btn-sm btn-success " href="<?php echo $config ?>assets/materi/<?= $order['materi'] ?>" download="<?php echo $config ?>assets/materi/<?= $order['materi'] ?>"><i class="bi bi-download"></i></a>
          </td>

          <td class="text-center">
            <?php if ($order['status'] == 'accept') { ?>
              <span class="border text-uppercase fw-bold border-2 border-success rounded text-success px-2 fs-6">Accept</span>
              <form class="" action="opsi-orders.php" method="POST">
                <input type="hidden" name="id_transaksi" value="<?= $order['id_transaksi']; ?>">
                <input class="btn btn-sm btn-success" type="submit" name="done" value="Done">
              </form>
            <?php } else if ($order['status'] == 'reject') { ?>
              <span class="border text-uppercase fw-bold border-2 border-danger rounded text-danger px-2 fs-6">Reject</span>
            <?php } else if ($order['status'] == 'done') { ?>
              <span class="border text-uppercase fw-bold border-2 border-success rounded text-success px-2 fs-6">Done</span>
            <?php } else if ($order['status'] == 'pending') { ?>
              <form class="" action="opsi-orders.php" method="POST">
                <input type="hidden" name="id_transaksi" value="<?= $order['id_transaksi']; ?>">
                <input class="btn btn-sm btn-success" type="submit" name="accept" value="Accept">
                <input class="btn btn-sm btn-danger" type="submit" name="reject" value="Reject">
              </form>
            <?php } ?>
          </td>
          <td class="text-center ">
            <a button class="btn btn-sm btn-danger text-white " data-bs-toggle="modal" data-bs-target="#bhapus<?= $no ?>"><i class="bi bi-trash"></i></a>
            <?php if ($order['status'] == 'accept') { ?>
              <a button class="btn btn-sm btn-success" href="https://api.whatsapp.com/send?phone=<?= $order['no_tlp']; ?>&text=Hai%2C%20kak%20%2A<?= $order['nama']; ?>%2A%2C%20kami%20dari%20admin%20Stranger%0D%0A%0D%0APesanan%20anda%20dengan%20data%20berikut%20%0D%0A1.%20Paket%20%3A%20<?= $order['paket']; ?>%0D%0A2.%20Harga%20%3A%20<?= $order['harga']; ?>%0D%0A3.%20Tanggal%20Pemesanan%20%3A%20<?= $order['wkt']; ?>%0D%0A%0D%0APesanan%20anda%20telah%20kami%20%2Akonfirmasi%2A%2C%20silahkan%20menunggu%20pesanan%20anda%20selesai%20dengan%20estimasi%20waktu%20perngerjaan%202%20hari%0D%0A%0D%0ATerimakasih."><i class="bi bi-whatsapp"></i></a>
            <?php } else if ($order['status'] == 'reject') { ?>
              <a button class="btn btn-sm btn-success" href="https://api.whatsapp.com/send?phone=<?= $order['no_tlp']; ?>&text=Hai%2C%20kak%20%2A<?= $order['nama']; ?>%2A%2C%20kami%20dari%20admin%20Stranger,%20ingin%20menginformasikan%20bahwa%0D%0A%0D%0APesanan%20anda%20dengan%20data%20berikut%20%0D%0A1.%20Paket%20%3A%20%20<?= $order['paket']; ?>%0D%0A2.%20Harga%20%3A%20Rp.<?= $order['harga']; ?>%0D%0A3.%20Tanggal%20Pemesanan%20%3A%20<?= $order['wkt']; ?>%0D%0A%0D%0ATelah%20kami%20%2ATolak%2A%20dikarenakan%20data%20pemesanan%20anda%20tidak%20valid.%20%0D%0A%0D%0ABalas%20pesan%20ini%20untuk%20informasi%20lebih%20lanjut%0D%0A%0D%0ATerimakasih."><i class="bi bi-whatsapp"></i></a>
            <?php } else if ($order['status'] == 'done') { ?>
              <a button class="btn btn-sm btn-success" href="https://api.whatsapp.com/send?phone=<?= $order['no_tlp']; ?>&text=Hai%2C%20kak%20%2A<?= $order['nama']; ?>%2A%2C%20kami%20dari%20admin%20Stranger%2C%20ingin%20menginformasikan%20bahwa%0D%0A%0D%0APesanan%20anda%20dengan%20data%20berikut%20%0D%0A1.%20Paket%20%3A%20<?= $order['paket']; ?>%0D%0A2.%20Harga%20%3A%20<?= $order['harga']; ?>%0D%0A3.%20Tanggal%20Pemesanan%20%3A%20<?= $order['wkt']; ?>%0D%0A%0D%0ATelah%20%2Aselesai%2A%20kami%20kerjakan%2C%20silahkan%20periksa%20domain%20website%20pesanan%20anda.%20Jangan%20lupa%20beri%20ulasan%20anda%20di%20website%20kami%20terimakasih."><i class="bi bi-whatsapp"></i></a>
            <?php } ?>
          </td>
        </tr>
        <!-- Modal -->
        <div class="modal fade" id="bhapus<?= $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="opsi-orders.php" method="POST">
                <input type="hidden" name="id_transaksi" value="<?= $order['id_transaksi'] ?>">
                <div class="modal-body text-center">
                  <strong class="fs-6">
                    Are you sure want to delete this data?
                  </strong>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                  <button type="submit" class="btn btn-danger" name="bhapus">Yes</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- Modal Gambar -->
        <div class="modal fade" id="bgambar<?= $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bukti Pembayaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body d-flex justify-content-center">
                <div class="">
                  <img src="<?php echo $config ?>assets/bukti/<?= $order['bukti'] ?>" alt="" width="450" height="450">
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php }
      ?>
    </tbody>
  </table>
</div>
<?php include('../../../layouts/footer-admin.php'); ?>