<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_user WHERE nomor_pengenal='$_SESSION[nomor_pengenal_evo]'");
$row = mysqli_fetch_array($query);
?>

<nav class="navbar navbar-expand navbar-dark bg-info">
    <div class="container-lg">
        <a class="navbar-brand" href="."><i class="bi bi-megaphone"></i>  EVO.</a>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo $hasil['nomor_pengenal'] . ' / ' . $hasil['nama']; ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end mt-2">
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#ModalUbahPassword"><i class="bi bi-key"></i> Ubah Password</a></li>
                        <li><a class="dropdown-item" href="logout"><i class="bi bi-box-arrow-left"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>


<!-- Modal Ubah Password-->
<div class="modal fade" id="ModalUbahPassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-fullscreen-md-down">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Password</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate action="proses/proses_ubah_password.php" method="POST">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-floating mb-3">
                                <input required type="password" class="form-control" id="floatingPassword" name="passwordlama">
                                <label for="floatingInput">Password Lama</label>
                                <div class="invalid-feedback">
                                    Masukkan password lama.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-floating mb-3">
                                <input required type="password" class="form-control" id="floatingPassword" name="passwordbaru">
                                <label for="floatingInput">Password Baru</label>
                                <div class="invalid-feedback">
                                    Masukkan password baru.
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-floating mb-3">
                                <input required type="password" class="form-control" id="floatingPassword" name="ulangipasswordbaru">
                                <label for="floatingInput">Ulangi Password Baru</label>
                                <div class="invalid-feedback">
                                    Masukkan ulangi password baru.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" name="ubah_password_validate" value="123">Ubah Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Ubah Password-->

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fieldsu
    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>