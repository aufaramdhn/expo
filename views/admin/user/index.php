<?php
$active = 'user';
$title = 'Stranger | Users';
include('../../../layouts/navbar-admin.php');
$users = mysqli_query($koneksi, "SELECT * FROM user");
?>

<!-- AWAL MAIN DATA ADMIN -->
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Data Users</h1>
</div>
<div class="d-flex ">
  <a button class="btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#btambah">Add Data <i class="bi bi-plus-circle"></i></a>
</div>
<!-- Modal Tambah Data -->
<div class="modal fade" id="btambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Users</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="opsi-user.php" method="POST">
        <div class="container col-md-12 mb-4">
          <div class="p-1">
            <div class="mb-3">
              <label for="nama" class="mb-1">Name</label>
              <input type="text" class="form-control" id="nama" name="nama" placeholder="First name">
            </div>
            <div class="mb-3">
              <label for="email" class="mb-1">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Email">
            </div>
            <div class="mb-3">
              <label for="no_tlp" class="mb-1">No.Telepon</label>
              <input type="text" class="form-control" id="no_tlp" name="no_tlp" placeholder="No.Telepon">
            </div>
            <div class="mb-3">
              <label for="username" class="mb-1">Username</label>
              <input type="text" class="form-control" id="username" name="username" placeholder="Username">
            </div>
            <div class="mb-3">
              <label for="username" class="mb-1">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <div class="mb-3">
              <label for="level" class="mb-1">Level</label>
              <select class="form-select" id="level" name="level">
                <option hidden>Level</option>
                <option>user</option>
                <option>admin</option>
              </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary" name="btambah">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Akhir Modal Tambah Data -->
<div class="table-responsive mb-5 mt-3">
  <table id="example" class="table table-striped table-bordered table-sm">
    <thead>
      <tr class="text-center">
        <th scope="col" class="text-center">No</th>
        <th scope="col">Name</th>
        <th scope="col">Emal</th>
        <th scope="col">No.Telepon</th>
        <th scope="col">Username</th>
        <th scope="col">Password</th>
        <th scope="col">Level</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1;
      foreach ($users as $user) { ?>
        <tr class="text-center">
          <td class="text-center"><?= $no++; ?></td>
          <td><?= $user['nama'] ?></td>
          <td><?= $user['email'] ?></td>
          <td><?= $user['no_tlp'] ?></td>
          <td><?= $user['username'] ?></td>
          <td><?= $user['password'] ?></td>
          <td><?= $user['level'] ?></td>
          <td class="text-center">
            <a button class="btn btn-sm btn-success mx-1 text-white" data-bs-toggle="modal" data-bs-target="#bedit<?= $no ?>"><i class="bi bi-pencil-square"></i></a>
            <a button class="btn btn-sm btn-danger mx-1 text-white" data-bs-toggle="modal" data-bs-target="#bhapus<?= $no ?>"><i class="bi bi-trash"></i></a>
          </td>
        </tr>
        <!-- Modal Hapus -->
        <div class="modal fade" id="bhapus<?= $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center">
              <div class="modal-header">
                <h5 class="modal-title " id="exampleModalLabel">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="opsi-user.php" method="POST">
                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                <div class="modal-body">
                  <strong class="fs-6">
                    Apakah anda yakin ingin mengahapus data ini?
                  </strong>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                  <button type="submit" class="btn btn-danger" name="bhapus">Hapus</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Mengubah data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="opsi-user.php" method="POST">
                <div class="container col-md-12 mb-4">
                  <div class="p-1">
                    <div class="my-3">
                      <input type="hidden" name="id" value="<?= $user['id']; ?>">
                      <label for="nama" class="mb-1">Name</label>
                      <input type="input" class="form-control" id="nama" name="nama" value="<?php echo $user['nama']; ?>" placeholder="Nama Lengkap">
                    </div>
                    <div class="my-3">
                      <label for="email" class="mb-1">Email</label>
                      <input type="input" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>" placeholder="Email Address">
                    </div>
                    <div class="my-3">
                      <label for="no_tlp" class="mb-1">No.Telepon</label>
                      <input type="input" class="form-control" id="no_tlp" name="no_tlp" value="<?php echo $user['no_tlp']; ?>" placeholder="Nomer Telepon">
                    </div>
                    <div class="mb-3">
                      <label for="username" class="mb-1">Username</label>
                      <input type="input" class="form-control" id="username" name="username" value="<?php echo $user['username']; ?>" placeholder="Username">
                    </div>
                    <div class="mb-3">
                      <label for="username" class="mb-1">Password</label>
                      <input type="input" class="form-control" id="password" name="password" value="<?php echo $user['password']; ?>" placeholder="Password">
                    </div>
                    <div class="mb-3">
                      <label for="level" value="<?php echo $user['level']; ?>" class="mb-1">Level</label>
                      <select class="form-select" id="level" name="level">
                        <option hidden>Level</option>
                        <option>user</option>
                        <option>admin</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-success text-white" name="bedit">Simpan</button>
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
<!-- AKHIR MAIN DATA ADMIN -->
<?php include('../../../layouts/footer-admin.php'); ?>