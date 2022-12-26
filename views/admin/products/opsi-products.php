<?php
require '../../../koneksi.php';



    if(isset($_POST['btambah'])){

        $create = mysqli_query($koneksi, "INSERT INTO product VALUES (NULL, '$_POST[paket]', '$_POST[harga]', '$_POST[halaman]', '$_POST[domain]', '$_POST[penyimpanan]', '$_POST[free_ssl]', '$_POST[revisi]', '$_POST[wordpress]', '$_POST[whatsapp]', '$_POST[responsif]', '$_POST[penayangan]', '$_POST[email]', '$_POST[perpanjangan]')");
        if ($create) {
            echo "<script>alert('Your data has been successfully added');</script>";
            echo"<script>window.location='index.php'</script>";
        } else {
            echo "<script>alert('Gagal');</script>";
            echo"<script>window.location='index.php'</script>";
        }
    }

    if(isset($_POST['bedit'])){

        $update = mysqli_query($koneksi, "UPDATE product set paket='$_POST[paket]', harga='$_POST[harga]', halaman='$_POST[halaman]', domain='$_POST[domain]', penyimpanan='$_POST[penyimpanan]', free_ssl='$_POST[free_ssl]', revisi='$_POST[revisi]', wordpress='$_POST[wordpress]', responsif='$_POST[responsif]', penayangan='$_POST[penayangan]', email='$_POST[email]', perpanjangan='$_POST[perpanjangan]' WHERE id_product='$_POST[id_product]'");

    
        if ($update) {
            echo "<script>alert('your data has been successfully changed');</script>";
		    echo"<script>window.location='index.php'</script>";
		   
        } else {
            echo "<script>alert('Gagal');</script>";
		    echo"<script>window.location='index.php'</script>";
        }
    }

    if(isset($_POST['bhapus'])){
        $delete = mysqli_query($koneksi, "DELETE FROM product WHERE id_product= '$_POST[id_product]'");

    
        if ($delete) {
            echo "<script>alert('your data has been deleted successfully');</script>";
		    echo"<script>window.location='index.php'</script>";
        } else {
            echo "<script>alert('Gagal');</script>";
		    echo"<script>window.location='index.php'</script>";
        }
    }
