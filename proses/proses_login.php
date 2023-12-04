<?php
    session_start();
    include "connect.php";
    $nisn = (isset($_POST['nisn'])) ? htmlentities($_POST['nisn']) : "" ;
    $password = (isset($_POST['password'])) ? md5(htmlentities($_POST['password'])) : "" ;

    if(!empty($_POST['submit_validate'])){
        $query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE nisn = '$nisn' && password = '$password'");
        $hasil = mysqli_fetch_array($query);
        if($hasil){
            $_SESSION['nisn_evo'] = $nisn;
            $_SESSION['level_evo'] = $hasil['level'];
            header('location:../home');
        }else{ ?>
            <script>
                alert('Username atau password yang anda masukkan salah');
                window.location='../login'
            </script>
<?php
    }
} echo $message;
?>