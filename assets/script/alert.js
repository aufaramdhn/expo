$(".btn-logout").on("click", function (e) {
  e.preventDefault();
  const href = $(this).attr("href");

  Swal.fire({
    title: "Apakah anda yakin?",
    text: "Akan keluar dari website kami?",
    type: "warning",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Logout",
  }).then((result) => {
    if (result.value) {
      Swal.fire({
        icon: "success",
        title: "Anda berhasil logout",
        showConfirmButton: false,
      });
      setTimeout(function () {
        document.location.href = href;
      }, 1200);
    }
  });
});

const notifikasi = $(".info-data").data("infodata");

if (notifikasi == "berhasil_login") {
  Swal.fire({
    icon: "success",
    title: "login berhasil",
    text: "Selamat datang diwebsite kami",
    showConfirmButton: false,
    timer: 1500,
  });
} else if (notifikasi == "kosong") {
  Swal.fire({
    icon: "warning",
    title: "Login gagal",
    text: "Password atau username anda salah",
    showConfirmButton: false,
    timer: 2000,
  });
} else if (notifikasi == "berhasil_register") {
  Swal.fire({
    icon: "success",
    title: "Register berhasil",
    text: "Akun anda berhasil di buat",
    showConfirmButton: false,
    timer: 1500,
  });
} else if (notifikasi == "gagal_register") {
  Swal.fire({
    icon: "warning",
    title: "Register gagal",
    text: "Username sudah digunakan",
    showConfirmButton: false,
    timer: 1500,
  });
} else if (notifikasi == "berhasil_simpan") {
  Swal.fire({
    icon: "success",
    title: "Berhasil",
    text: "Data berhasil di simpan",
    showConfirmButton: false,
    timer: 1500,
  });
} else if (notifikasi == "berhasil_ubah") {
  Swal.fire({
    icon: "success",
    title: "Berhasil",
    text: "Data berhasil di ubah",
    showConfirmButton: false,
    timer: 1500,
  });
} else if (notifikasi == "berhasil_hapus") {
  Swal.fire({
    icon: "success",
    title: "Berhasil",
    text: "Data berhasil di hapus",
    showConfirmButton: false,
    timer: 1500,
  });
} else if (notifikasi == "gagal_simpan") {
  Swal.fire({
    icon: "error",
    title: "Gagal",
    text: "Data gagal di simpan",
    showConfirmButton: false,
    timer: 1500,
  });
} else if (notifikasi == "gagal_ubah") {
  Swal.fire({
    icon: "error",
    title: "Gagal",
    text: "Data gagal di ubah",
    showConfirmButton: false,
    timer: 1500,
  });
} else if (notifikasi == "gagal_hapus") {
  Swal.fire({
    icon: "error",
    title: "Gagal",
    text: "Data gagal di hapus",
    showConfirmButton: false,
    timer: 1500,
  });
} else if (notifikasi == "accept") {
  Swal.fire({
    icon: "success",
    title: "Di terima",
    text: "Transaksi di terima",
    showConfirmButton: false,
    timer: 1500,
  });
} else if (notifikasi == "reject") {
  Swal.fire({
    icon: "error",
    title: "Di tolak",
    text: "Transaksi di tolak",
    showConfirmButton: false,
    timer: 1500,
  });
} else if (notifikasi == "done") {
  Swal.fire({
    icon: "success",
    title: "Selesai",
    text: "Transaksi telah selesai",
    showConfirmButton: false,
    timer: 1500,
  });
} else if (notifikasi == "ulasan_ada") {
  Swal.fire({
    icon: "warning",
    title: "Sudah mengisi ulasan",
    text: "Anda sudah mengisi ulasan, terima kasih!",
    showConfirmButton: false,
    timer: 1500,
  });
} else if (notifikasi == "ulasan_simpan") {
  Swal.fire({
    icon: "success",
    title: "Berhasil",
    text: "Ulasan anda berhasil di simpan",
    showConfirmButton: false,
    timer: 1500,
  });
} else if (notifikasi == "ulasan_simpan") {
  Swal.fire({
    icon: "error",
    title: "Gagal",
    text: "Ulasan anda gagal di simpan",
    showConfirmButton: false,
    timer: 1500,
  });
} else if (notifikasi == "ukuran") {
  Swal.fire({
    icon: "error",
    title: "Gagal",
    text: "Maaf ukuran file melebihi maksimal",
    showConfirmButton: false,
    timer: 1500,
  });
} else if (notifikasi == "format") {
  Swal.fire({
    icon: "error",
    title: "Gagal",
    text: "Maaf format file tidak sesuai",
    showConfirmButton: false,
    timer: 1500,
  });
}
