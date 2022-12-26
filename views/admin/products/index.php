<?php
// session_start();
$active = 'product';
include '../sidebar.php';
$products = mysqli_query($koneksi, "SELECT * FROM product");

?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 border-bottom mb-4">
    <h1 class="h2">Data Products</h1>
  </div>
  <div class="d-flex justify-content-end">
    <a button class="btn btn-primary mt-3 text-white" data-bs-toggle="modal" data-bs-target="#btambah">Add Data <i class="bi bi-plus-circle"></i></a>
  </div>
  <div class="modal fade" id="btambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Product</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="opsi-products.php" method="POST">
          <div class="container px-5 py-5">
            <div class="row mb-3">
              <div class="col">
                <label for="paket" style="font-size:15px;" class="mb-1">Paket</label>
                <input type="text" class="form-control" id="paket" name="paket" placeholder="First name">
              </div>
              <div class="col">
                <label for="harga" style="font-size:15px;" class="mb-1">Harga</label>
                <input type="text" class="form-control" id="harga" name="harga" placeholder="Last name">
              </div>
            </div>
            <div class="row mb-3">
              <div class="col">
                <label for="halaman" style="font-size:15px;" class="mb-1">Jumlah Halaman</label>
                <input class="form-control" id="halaman" name="halaman" placeholder="Jumlah Halaman">
              </div>
              <div class="col">
                <label for="domain" style="font-size:15px;" class="mb-1">Nama Domain</label>
                <input class="form-control" id="domain" name="domain" placeholder="Domain">
              </div>
            </div>
            <div class="row mb-3">
              <div class="col">
                <label for="penyimpanan" style="font-size:15px;" class="mb-1">Storage</label>
                <input class="form-control" id="penyimpanan" name="penyimpanan" placeholder="Penyimpanan">
              </div>
              <div class="col">
                <label for="free_ssl" style="font-size:15px;" class="mb-1">SSL</label>
                <input class="form-control" id="free_ssl" name="free_ssl" placeholder="Free SSL">
              </div>
            </div>
            <div class="row mb-3">
              <div class="col">
                <label for="revisi" style="font-size:15px;" class="mb-1">Revisi</label>
                <input class="form-control" id="revisi" name="revisi" placeholder="Revisi">
              </div>
              <div class="col">
                <label for="wordpress" style="font-size:15px;" class="mb-1">Wordpress</label>
                <input class="form-control" id="wordpress" name="wordpress" placeholder="Wordpress">
              </div>
            </div>
            <div class="row mb-3">
              <div class="col">
                <label for="whatsapp" style="font-size:15px;" class="mb-1">WhatsApp</label>
                <input class="form-control" id="whatsapp" name="whatsapp" placeholder="WhatsApp">
              </div>
              <div class="col">
                <label for="responsif" style="font-size:15px;" class="mb-1">Responsif</label>
                <input class="form-control" id="responsif" name="responsif" placeholder="Responsif">
              </div>
            </div>
            <div class="row mb-3">
              <div class="col">
                <label for="penayangan" style="font-size:15px;" class="mb-1">Penayangan</label>
                <input class="form-control" id="penayangan" name="penayangan" placeholder="Penayangan">
              </div>
              <div class="col">
                <label for="email" style="font-size:15px;" class="mb-1">Email</label>
                <input class="form-control" id="email" name="email" placeholder="Email">
              </div>
            </div>
            <div class="row mb-3">
              <div class="col">
                <label for="perpanjangan" style="font-size:15px;" class="mb-1">Perpanjangan</label>
                <input class="form-control" id="perpanjangan" name="perpanjangan" placeholder="perpanjangan">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="btambah">Confirm</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Table data -->
  <div class="table-responsive mb-5 mt-3">
    <table id="example" class="table table-striped table-bordered table-sm">
      <thead>
        <tr class="text-center">
          <th scope="col" class="text-center">No</th>
          <th scope="col">Paket</th>
          <th scope="col">Harga</th>
          <th scope="col">Halaman</th>
          <th scope="col">Revisi</th>
          <th scope="col">Perpanjangan</th>

          <th scope="col">aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1;
        foreach ($products as $product) { ?>
          <tr class="text-center">
            <td class="text-center"><?= $no++; ?></td>
            <td><?= $product['paket'] ?></td>
            <td>Rp. <?= $product['harga'] ?></td>
            <td><?= $product['halaman'] ?></td>
            <td><?= $product['revisi'] ?></td>
            <td><?= $product['perpanjangan'] ?></td>
            <td class="text-center">
              <a button class="btn btn-sm btn-success mx-1 mb-2 mb-lg-0 text-white" data-bs-toggle="modal" data-bs-target="#bedit<?= $no ?>"><i class="bi bi-pencil-square"></i></a>
              <a button class="btn btn-sm btn-danger mx-1 text-white" data-bs-toggle="modal" data-bs-target="#bhapus<?= $no ?>"><i class="bi bi-trash"></i></a>
            </td>
          </tr>
          <!-- Modal -->
          <div class="modal fade" id="bhapus<?= $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content text-center">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="opsi-products.php" method="POST">
                  <input type="hidden" name="id_product" value="<?= $product['id_product'] ?>">
                  <div class="modal-body">
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
          <!-- Modal Edit -->
          <div class="modal fade" id="bedit<?= $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Update Your Data</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="opsi-products.php" method="POST">
                  <div class="container col mb-4">
                    <div class="p-1 row">
                      <div class=" col-4">
                        <input type="hidden" name="id_product" value="<?= $product['id_product']; ?>">
                        <label for="paket" style="font-size:15px;" class="mb-1">Paket</label>
                        <input type="input" class="form-control" id="nama" name="paket" value="<?php echo $product['paket']; ?>" placeholder="Paket" aria-label="Paket">
                      </div>
                      <div class="mb-3 col-4">
                        <label for="harga" style="font-size:15px;" class="mb-1">Harga</label>
                        <input type="input" class="form-control" id="harga" name="harga" value="Rp. <?= $product['harga'] ?>" placeholder="harga" aria-label="harga">
                      </div>
                      <div class="mb-3 col-4">
                        <label for="halaman" style="font-size:15px;" class="mb-1">Halaman</label>
                        <input type="input" class="form-control" id="halaman" name="halaman" value="<?php echo $product['halaman']; ?>" placeholder="Last name" aria-label="Last name">
                      </div>
                      <div class="mb-3 col-4">
                        <label for="domain" style="font-size:15px;" value="<?php echo $product['domain']; ?>" class="mb-1">Domain</label>
                        <input type="input" class="form-control" id="domain" name="domain" value="<?php echo $product['domain']; ?>" placeholder="Nama Domain" aria-label="Nama Domain">
                      </div>
                      <div class="mb-3 col-4">
                        <label for="penyimpanan" style="font-size:15px;" value="<?php echo $product['penyimpanan']; ?>" class="mb-1">Penyimpanan</label>
                        <input type="input" class="form-control" id="penyimpanan" name="penyimpanan" value="<?php echo $product['penyimpanan']; ?>" placeholder="Penyimpanan" aria-label="Penyimpanan">
                      </div>
                      <div class="mb-3 col-4">
                        <label for="free_ssl" style="font-size:15px;" value="<?php echo $product['free_ssl']; ?>" class="mb-1">Free_SSL</label>
                        <input type="input" class="form-control" id="free_ssl" name="free_ssl" value="<?php echo $product['free_ssl']; ?>" placeholder="Free SSL" aria-label="Free SSL">
                      </div>
                      <div class="mb-3 col-4">
                        <label for="revisi" style="font-size:15px;" value="<?php echo $product['revisi']; ?>" class="mb-1">Revisi</label>
                        <input type="input" class="form-control" id="revisi" name="revisi" value="<?php echo $product['revisi']; ?>" placeholder="Revisi" aria-label="Revisi">
                      </div>
                      <div class="mb-3 col-4">
                        <label for="wordpress" style="font-size:15px;" value="<?php echo $product['wordpress']; ?>" class="mb-1">Wordpress</label>
                        <input type="input" class="form-control" id="wordpress" name="wordpress" value="<?php echo $product['wordpress']; ?>" placeholder="Wordpress" aria-label="Wordpress">
                      </div>
                      <div class="mb-3 col-4">
                        <label for="whatsapp" style="font-size:15px;" value="<?php echo $product['whatsapp']; ?>" class="mb-1">Whatsapp</label>
                        <input type="input" class="form-control" id="whatsapp" name="whatsapp" value="<?php echo $product['whatsapp']; ?>" placeholder="Whatsapp" aria-label="Whatsapp">
                      </div>
                      <div class="mb-3 col-4">
                        <label for="responsif" style="font-size:15px;" value="<?php echo $product['responsif']; ?>" class="mb-1">Responsif</label>
                        <input type="input" class="form-control" id="responsif" name="responsif" value="<?php echo $product['responsif']; ?>" placeholder="Responsif" aria-label="Responsif">
                      </div>
                      <div class="mb-3 col-4">
                        <label for="penayangan" style="font-size:15px;" value="<?php echo $product['penayangan']; ?>" class="mb-1">Penayangan</label>
                        <input type="input" class="form-control" id="penayangan" name="penayangan" value="<?php echo $product['penayangan']; ?>" placeholder="Penayangan" aria-label="Penayangan">
                      </div>
                      <div class="mb-3 col-4">
                        <label for="email" style="font-size:15px;" value="<?php echo $product['email']; ?>" class="mb-1">Email</label>
                        <input type="input" class="form-control" id="email" name="email" value="<?php echo $product['email']; ?>" placeholder="Email" aria-label="Email">
                      </div>
                      <div class="mb-3 col-12">
                        <label for="perpanjangan" style="font-size:15px;" value="<?php echo $product['perpanjangan']; ?>" class="mb-1">Perpanjangan</label>
                        <input type="input" class="form-control" id="perpanjangan" name="perpanjangan" value="<?php echo $product['perpanjangan']; ?>" placeholder="Perpanjangan" aria-label="Perpanjangan">
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success text-white" name="bedit">Save changes</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        <?php }
        ?>
      </tbody>
    </table>
  </div>
</main>

<?php

include '../../layout/footer-admin.php'; ?>