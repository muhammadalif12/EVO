<?php
include "connect.php";
$nomor_pengenal = (isset($_POST['nomor_pengenal'])) ? htmlentities($_POST['nomor_pengenal']) : "";

if (!empty($_POST['reset_password_siswa_validate'])) {
    $query = mysqli_query($conn, "UPDATE tb_user SET password=md5('smpnegeri2lhokseumawe') WHERE nomor_pengenal ='$nomor_pengenal'");
    if ($query) {
        $message = '<script>alert("Password Berhasil Direset");
                    window.location="../siswa"</script>';
    } else {
        $message = '<script>alert("Password Gagal Direset");
                    window.location="../siswa"</script>';
    }
}
echo $message;
