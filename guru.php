<?php
    include "proses/connect.php";
    $query = mysqli_query($conn, "SELECT * FROM tb_user WHERE level LIKE '%2%'");
    while ($record = mysqli_fetch_array($query)) {
        $result[] = $record;
    }
    ?>



<div class="col-lg-9 mt-2">
        <div class="card">
            <div class="card-header">
                Data Guru
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col d-flex justify-content-start">
                        <button class="btn btn-info text-light #ModalDelete??php" data-bs-toggle="modal" data-bs-target="#ModalTambahUser"> Tambah User</button>
                    </div>
                </div>
                <!-- Modal Tambah User Baru-->
                <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah User</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="proses/proses_input_user.php" method="POST">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput" placeholder="Your Name" name="nama" required>
                                                <label for="floatingInput">Nama</label>
                                                <div class="invalid-feedback">
                                                    Masukkan nama.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="username" required>
                                                <label for="floatingInput">Username</label>
                                                <div class="invalid-feedback">
                                                    Masukkan username.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-floating mb-3">
                                                <select class="form-select" aria-label="Default select example" name="level" required>
                                                    <option selected hidden value="">Pilih Jenis Kelamin</option>
                                                    <option value="1">Laki - Laki</option>
                                                    <option value="2">Perempuan</option>
                                                </select>
                                                <label for="floatingInput">Jenis Kelamin</label>
                                                <div class="invalid-feedback">
                                                    Pilih jenis kelamin.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput" placeholder="08xx xxxx xxxx" name="nohp">
                                                <label for="floatingInput">No Hp</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-floating mb-3">
                                                <input type="password" class="form-control" id="floatingInput" placeholder="Password" disabled value="12345" name="password">
                                                <label for="floatingPassword">Password</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <textarea id="" style="height: 100px;" class="form-control" name="alamat"></textarea>
                                        <label for="floatingInput">Alamat</label>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="input_user_validate" value="12345">Save Data User</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Modal Tambah User Baru-->

                <?php
                if (empty($result)) {
                    echo "<p class='text-center mt-2'>Data user tidak ada</p>";
                } else {
                    foreach ($result as $row) {
                ?>
                        <!-- Modal View-->
                        <div class="modal fade" id="ModalView<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Data User</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="needs-validation" novalidate action="proses/proses_input_user.php" method="POST">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-floating mb-3">
                                                        <input disabled type="text" class="form-control" id="floatingInput" placeholder="Your Name" name="nama" value="<?php echo $row['nama'] ?>">
                                                        <label for="floatingInput">Nama</label>
                                                        <div class="invalid-feedback">
                                                            Masukkan nama.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-floating mb-3">
                                                        <input disabled type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="username" value="<?php echo $row['username'] ?>">
                                                        <label for="floatingInput">Username</label>
                                                        <div class="invalid-feedback">
                                                            Masukkan username.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-floating mb-3">
                                                        <input disabled type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="username" value="
                                                <?php
                                                if ($row['level'] == 1) {
                                                    echo "Admin";
                                                } else if ($row['level'] == 2) {
                                                    echo "Kasir";
                                                } else if ($row['level'] == 3) {
                                                    echo "Pelayan";
                                                } else if ($row['level'] == 4) {
                                                    echo "Dapur";
                                                }
                                                ?>">
                                                        <label for="floatingInput">Level User</label>
                                                        <div class="invalid-feedback">
                                                            Pilih level user.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="form-floating mb-3">
                                                        <input disabled type="text" class="form-control" id="floatingInput" placeholder="08xx xxxx xxxx" name="nohp" value="<?php echo $row['nohp'] ?>">
                                                        <label for="floatingInput">No Hp</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <textarea disabled id="" style="height: 100px;" class="form-control" name="alamat"> <?php echo $row['alamat'] ?></textarea>
                                                <label for="floatingInput">Alamat</label>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal View-->

                        <!-- Modal Edit-->
                        <div class="modal fade" id="ModalEdit<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data User</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="needs-validation" novalidate action="proses/proses_edit_user.php" method="POST">
                                            <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-floating mb-3">
                                                        <input required type="text" class="form-control" id="floatingInput" placeholder="Your Name" name="nama" value="<?php echo $row['nama'] ?>">
                                                        <label for="floatingInput">Nama</label>
                                                        <div class="invalid-feedback">
                                                            Masukkan nama.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-floating mb-3">
                                                        <input <?php echo ($row['username'] == $_SESSION['username_decafe']) ? 'disabled' : ' ';  ?> required type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="username" value="<?php echo $row['username'] ?>">
                                                        <label for="floatingInput">Username</label>
                                                        <div class="invalid-feedback">
                                                            Masukkan username.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-floating mb-3">
                                                        <select required name="level" class="form-select" aria-label="Default select example" id="">
                                                            <?php
                                                            $data = array("Admin", "Kasir", "Pelayan", "Dapur");
                                                            foreach ($data as $key => $value) {
                                                                if ($row['level'] == $key + 1) {
                                                                    echo "<option selected value=" . ($key + 1) . ">$value</option>";
                                                                } else {
                                                                    echo "<option value=" . ($key + 1) . ">$value</option>";
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                        <label for="floatingInput">Level User</label>
                                                        <div class="invalid-feedback">
                                                            Pilih level user.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingInput" placeholder="08xx xxxx xxxx" name="nohp" value="<?php echo $row['nohp'] ?>">
                                                        <label for="floatingInput">No Hp</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <textarea id="" style="height: 100px;" class="form-control" name="alamat"> <?php echo $row['alamat'] ?></textarea>
                                                <label for="floatingInput">Alamat</label>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary" name="edit_user_validate" value="12345">Save Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal Edit-->

                        <!-- Modal Delete-->
                        <div class="modal fade" id="ModalDelete<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md modal-fullscreen-md-down">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Data User</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="needs-validation" novalidate action="proses/proses_delete_user.php" method="POST">
                                            <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                                            <div class="col-lg-12">
                                                <?php
                                                if ($row['username'] == $_SESSION['username_decafe']) {
                                                    echo "<div class='alert alert-danger'>Anda tidak dapat menghapus akun sendiri </div>";
                                                } else {
                                                    echo "Apakah kamu ingin menghapus user <b>$row[username]</b>";
                                                }
                                                ?>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-danger" name="hapus_user_validate" value="12345" <?php echo ($row['username'] == $_SESSION['username_decafe']) ? 'disabled' : ' '; ?>>Delete</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal Delete-->

                        <!-- Modal Reset Password-->
                        <div class="modal fade" id="ModalResetPassword<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md modal-fullscreen-md-down">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Reset Password</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="needs-validation" novalidate action="proses/proses_reset_password.php" method="POST">
                                            <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                                            <div class="col-lg-12">
                                                <?php
                                                if ($row['username'] == $_SESSION['username_decafe']) {
                                                    echo "<div class='alert alert-danger'>Anda tidak dapat mengreset password sendiri </div>";
                                                } else {
                                                    echo "Apakah kamu ingin mengreset password user <b>$row[username]</b> menjadi password bawaan sistem yaitu <b>password</b>";
                                                }
                                                ?>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-success" name="input_user_validate" value="12345" <?php echo ($row['username'] == $_SESSION['username_decafe']) ? 'disabled' : ' '; ?>>Reset Password</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal Reset Password-->

                    <?php
                    }

                    ?>
                    <div class="table-responsive">
                        <table class="table table-bordered mt-3">
                            <thead>
                                <tr>
                                    <th scope="col">NIP</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($result as $row) {
                                ?>
                                    <tr>
                                        <td><?php echo $row['nomor_pengenal'] ?></td>
                                        <td><?php echo $row['nama'] ?></td>
                                        <td><?php
                                            if ($row['jenis_kelamin'] == 1) {
                                                echo "Laki - Laki";
                                            } else if ($row['jenis_kelamin'] == 2) {
                                                echo "Perempuan";
                                            }
                                            ?></td>
                                        <td class="d-flex">
                                            <button class="btn btn-info btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalView<?php echo $row['nomor_pengenal'] ?>"><i class="bi bi-eye"></i></button>
                                            <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $row['nomor_pengenal'] ?>"><i class="bi bi-pencil-square"></i></button>
                                            <button class="btn btn-danger btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalDelete<?php echo $row['nomor_pengenal'] ?>"><i class="bi bi-trash3"></i></button>
                                            <button class="btn btn-secondary btn-sm " data-bs-toggle="modal" data-bs-target="#ModalResetPassword<?php echo $row['nomor_pengenal'] ?>"><i class="bi bi-key"></i></button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>


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