<?php
    include "connect.php";
    $id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "" ;
    $nomor_pengenal = (isset($_POST['nomor_pengenal'])) ? htmlentities($_POST['nomor_pengenal']) : "" ;
    $nama = (isset($_POST['nama'])) ? htmlentities($_POST['nama']) : "" ;
    $jenis_kelamin = (isset($_POST['jenis_kelamin'])) ? htmlentities($_POST['jenis_kelamin']) : "" ;
    $kelas = (isset($_POST['kelas'])) ? htmlentities($_POST['kelas']) : "" ;
    $password = (isset($_POST['password'])) ? md5(htmlentities($_POST['password'])) : "" ;
    
    if(!empty($_POST['edit_siswa_validate'])){
        $select = mysqli_query($conn, "SELECT * FROM tb_user WHERE nomor_pengenal='$nomor_pengenal' AND id != '$id'");
        if(mysqli_num_rows($select) >0){
            $message = '<script>alert("Username Telah Digunakan");
                        window.location="../siswa"</script>';
        }else{
        $query = mysqli_query($conn, "UPDATE tb_user SET nomor_pengenal='$nomor_pengenal',nama='$nama',jenis_kelamin='$jenis_kelamin',kelas='$kelas' WHERE id='$id'");
            if($query){
                $message = '<script>alert("Data Berhasil Diupdate");
                            window.location="../siswa"</script>';
                
            }else{
                $message = '<script>alert("Data Gagal Diupdate");
                            window.location="../siswa"</script>';
            }
    }
}
    echo $message;
?>