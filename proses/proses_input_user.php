<?php
    include "connect.php";
    $nisn = (isset($_POST['nisn'])) ? htmlentities($_POST['nisn']) : "" ;
    $nama = (isset($_POST['nama'])) ? htmlentities($_POST['nama']) : "" ;
    $kelas = (isset($_POST['kelas'])) ? htmlentities($_POST['kelas']) : "" ;
    $jenis_kelamin = (isset($_POST['jenis_kelamin'])) ? htmlentities($_POST['jenis_kelamin']) : "" ;
    $password = md5('password');

    if(!empty($_POST['input_user_validate'])){
        $select = mysqli_query($conn, "SELECT * FROM tb_user WHERE username='$username'");
        if(mysqli_num_rows($select) >0){
            $message = '<script>alert("Username Telah Digunakan");
                        window.location="../siswa"</script>';
        }else{
        $query = mysqli_query($conn, "INSERT INTO tb_user (nisn, nama, kelas, jenis_kelamin, password) values ('$nisn', '$nama', '$kelas', '$jenis_kelamin','$password')");
        if($query){
            $message = '<script>alert("Data Berhasil Ditambahkan");
                        window.location="../siswa"</script>';
        }else{
            $message = '<script>alert("Data Gagal Ditambahkan");
                        window.location="../siswa"</script>';
        }
    }
}
    echo $message;
?>