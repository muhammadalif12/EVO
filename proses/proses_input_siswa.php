<?php
    include "connect.php";
    $nomor_pengenal = (isset($_POST['nomor_pengenal'])) ? htmlentities($_POST['nomor_pengenal']) : "" ;
    $nama = (isset($_POST['nama'])) ? htmlentities($_POST['nama']) : "" ;
    $level = (isset($_POST['level'])) ? htmlentities($_POST['level']) : "" ;
    $jenis_kelamin = (isset($_POST['jenis_kelamin'])) ? htmlentities($_POST['jenis_kelamin']) : "" ;
    $kelas = (isset($_POST['kelas'])) ? htmlentities($_POST['kelas']) : "" ;
    $password = (isset($_POST['password'])) ? md5(htmlentities($_POST['password'])) : "" ;

    if(!empty($_POST['input_siswa_validate'])){
        $select = mysqli_query($conn, "SELECT * FROM tb_user WHERE nomor_pengenal='$nomor_pengenal'");
        if(mysqli_num_rows($select) >0){
            $message = '<script>alert("NISN Telah Terdaftar");
                        window.location="../siswa""</script>';
        }else{
        $query = mysqli_query($conn, "INSERT INTO tb_user (nomor_pengenal, nama, level, jenis_kelamin, kelas, password) values ('$nomor_pengenal', '$nama', '$level', '$jenis_kelamin', '$kelas', '$password')");
        if($query){
            $message = '<script>alert("Siswa Berhasil Ditambahkan");
                        window.location="../siswa"</script>';
        }else{
            $message = '<script>alert("Siswa Gagal Ditambahkan");
                        window.location="../siswa"</script>';
        }
    }
}
    echo $message;
?>