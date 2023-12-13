<?php
include "connect.php";
$nomor_pengenal = (isset($_POST['nomor_pengenal'])) ? htmlentities($_POST['nomor_pengenal']) : "";

if (!empty($_POST['hapus_siswa_validate'])) {
    $query = mysqli_query($conn, "DELETE FROM tb_user WHERE nomor_pengenal ='$nomor_pengenal'");
    if ($query) {
        $message = '<script>alert("Data Berhasil Dihapus");
                    window.history.go(-1)</script>';
    } else {
        $message = '<script>alert("Data Gagal Dihapus");
                    window.history.go(-1)</script>';
    }
}
echo $message;
?>