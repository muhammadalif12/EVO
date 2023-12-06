<?php
    session_start();
    include "connect.php";
    $nomor_pengenal = (isset($_POST['nomor_pengenal'])) ? htmlentities($_POST['nomor_pengenal']) : "" ;
    $password = (isset($_POST['password'])) ? md5(htmlentities($_POST['password'])) : "" ;

    if(!empty($_POST['submit_validate'])){
        $query = mysqli_query($conn, "SELECT * FROM tb_user WHERE nomor_pengenal = '$nomor_pengenal' && password = '$password'");
        $hasil = mysqli_fetch_array($query);
        if($hasil){
            $_SESSION['nomor_pengenal_evo'] = $nomor_pengenal;
            $_SESSION['level_evo'] = $hasil['level'];
            header('location:../home');
        }else{ ?>
            <script>
                alert('NISN, NIP atau password yang anda masukkan salah');
                window.location='../login'
            </script>
<?php
    }
} echo $message;
?>