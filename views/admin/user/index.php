<?php
// session_start();
$active = 'user';
include '../sidebar.php';
$users = mysqli_query($koneksi, "SELECT * FROM user");
?>

<!-- AWAL MAIN DATA ADMIN -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Users</h1>
  </div>
  <div class="d-flex justify-content-end">
    <a button class="btn btn-primary mt-3 text-white" data-bs-toggle="modal" data-bs-target="#btambah">Add Data <i class="bi bi-plus-circle"></i></a>
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
                <label for="nama" style="font-size:15px;" class="mb-1">Name</label>
                <input type="input" class="form-control" id="nama" name="nama" placeholder="First name" aria-label="First name">
              </div>
              <div class="mb-3">
                <label for="no_tlp" style="font-size:15px;" class="mb-1">No.Telepon</label>
                <input type="input" class="form-control" id="no_tlp" name="no_tlp" placeholder="No.Telepon" aria-label="First name">
              </div>
              <div class="mb-3">
                <label for="username" style="font-size:15px;" class="mb-1">Username</label>
                <input type="input" class="form-control" id="username" name="username" placeholder="Username" aria-label="Last name">
              </div>
              <div class="mb-3">
                <label for="username" style="font-size:15px;" class="mb-1">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" aria-label="Last name">
              </div>
              <div class="mb-3">
                <label for="level" style="font-size:15px;" class="mb-1">Level</label>
                <select class="form-select" id="level" name="level" aria-label="Default select example">
                  <option hidden>Level</option>
                  <option>user</option>
                  <option>admin</option>
                </select>
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
  <!-- Akhir Modal Tambah Data -->
  <div class="table-responsive mb-5 mt-3">
    <table id="example" class="table table-striped table-bordered table-sm">
      <thead>
        <tr class="text-center">
          <th scope="col" class="text-center">No</th>
          <th scope="col">Name</th>
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
                <form action="opsi-user.php" method="POST">
                  <div class="container col-md-12 mb-4">
                    <div class="p-1">
                      <div class="my-3">
                        <input type="hidden" name="id" value="<?= $user['id']; ?>">
                        <label for="nama" style="font-size:15px;" class="mb-1">Name</label>
                        <input type="input" class="form-control" id="nama" name="nama" value="<?php echo $user['nama']; ?>" placeholder="First name" aria-label="First name">
                      </div>
                      <div class="my-3">
                        <label for="no_tlp" style="font-size:15px;" class="mb-1">No.Telepon</label>
                        <input type="input" class="form-control" id="no_tlp" name="no_tlp" value="<?php echo $user['no_tlp']; ?>" placeholder="Nomer Telepon" aria-label="Nomer Telepon">
                      </div>
                      <div class="mb-3">
                        <label for="username" style="font-size:15px;" class="mb-1">Username</label>
                        <input type="input" class="form-control" id="username" name="username" value="<?php echo $user['username']; ?>" placeholder="Last name" aria-label="Last name">
                      </div>
                      <div class="mb-3">
                        <label for="username" style="font-size:15px;" class="mb-1">Password</label>
                        <input type="input" class="form-control" id="password" name="password" value="<?php echo $user['password']; ?>" placeholder="Last name" aria-label="Last name">
                      </div>
                      <div class="mb-3">
                        <label for="level" style="font-size:15px;" value="<?php echo $user['level']; ?>" class="mb-1">Level</label>
                        <select class="form-select" id="level" name="level" aria-label="Default select example">
                          <option hidden>Level</option>
                          <option>user</option>
                          <option>admin</option>
                        </select>
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
<!-- AKHIR MAIN DATA ADMIN -->
<?php

include '../../layout/footer-admin.php'; ?>