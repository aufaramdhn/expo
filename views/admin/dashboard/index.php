<?php
$active = 'dashboard';
$title = 'Stranger | Dashboard';
include('../../../layouts/navbar-admin.php');
$product = mysqli_num_rows($koneksi->query("SELECT * FROM product"));
$tr = mysqli_num_rows($koneksi->query("SELECT * FROM transaksi"));
$user = mysqli_num_rows($koneksi->query("SELECT * FROM user"));

?>
<div class="d-flex justify-content-start flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-5 border-bottom">
  <h1 class="h2">Dashboard</h1>
</div>
<div class="container d-flex justify-content-evenly">
  <div class="row">
    <div class="col-md-4">
      <div class="card bg-danger text-white" style="width: 18rem;">

        <div class="card-body row d-flex align-items-center">
          <div class="col-3 text-center">
            <i class="bx bx-user fs-1"></i>
          </div>
          <div class="col-6">
            <h5 class="card-title">Users</h5>
          </div>
          <div class="col-3 text-center">
            <p class="card-text fs-2"><?= $user ?></p>
          </div>
        </div>
        <div class="card-footer">
          <a class="text-decoration-none text-light fw-bold fs-6" href="../data-admin/index.php">View detail </a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card bg-success text-white" style="width: 18rem;">

        <div class="card-body  row d-flex align-items-center">
          <div class="col-3 text-center">
            <i class="bx bxs-purchase-tag fs-1"></i>
          </div>
          <div class="col-6">
            <h5 class="card-title text-center">Product</h5>
          </div>
          <div class="col-3 text-center">
            <p class="card-text fs-2"><?= $product ?></p>
          </div>
        </div>
        <div class="card-footer">
          <a class="text-decoration-none text-light fw-bold fs-6" href="../products/index.php">View detail </a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card bg-warning text-white" style="width: 18rem;">

        <div class="card-body row d-flex align-items-center">
          <div class="col-3 text-center">
            <i class="bx bx-package fs-1"></i>
          </div>
          <div class="col-6">
            <h5 class="card-title">Orders</h5>
          </div>
          <div class="col-3 text-center">
            <p class="card-text fs-2"><?= $tr ?></p>
          </div>
        </div>
        <div class="card-footer">
          <a class="text-decoration-none text-light fw-bold fs-6" href="../orders/index.php">View detail </a>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include('../../../layouts/footer-admin.php'); ?>