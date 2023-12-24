<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_user
    LEFT JOIN tb_kelas ON tb_kelas.id_kelas = tb_user.kelas
    WHERE level LIKE '%3%' OR level LIKE '%3%'
    GROUP BY id ORDER BY nama_kelas ASC");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}

$select_kelas = mysqli_query($conn, "SELECT id_kelas,nama_kelas FROM tb_kelas WHERE sebagai LIKE '%Siswa%'");
?>


<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Data Siswa
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col d-flex justify-content-start">
                    <button class="btn btn-info text-light #ModalDelete??php" data-bs-toggle="modal" data-bs-target="#ModalTambahUser"> Tambah Siswa</button>
                </div>
            </div>
            <!-- Modal Tambah User Baru-->
            <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Siswa</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_input_siswa.php" method="POST">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="NISN" name="nomor_pengenal" required>
                                            <label for="floatingInput">NISN</label>
                                            <div class="invalid-feedback">
                                                Masukkan NISN.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Name" name="nama" required>
                                            <label for="floatingInput">Nama</label>
                                            <div class="invalid-feedback">
                                                Masukkan nama.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" aria-label="Default select example" name="jenis_kelamin" required>
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

                                    <input type="hidden" value="4" name="level">

                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <select name="kelas" id="" class="form-select" required>
                                                <option selected hidden value="">Pilih Kelas</option>
                                                <?php
                                                foreach ($select_kelas as $value) {
                                                    echo "<option value=" . $value['id_kelas'] . ">$value[nama_kelas]</option>";
                                                }
                                                ?>
                                            </select>
                                            <label for="kelas">Kelas</label>
                                            <div class="invalid-feedback">
                                                Pilih kelas.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control" id="floatingInput" placeholder="Password" name="password" required>
                                            <label for="floatingPassword">Password</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-info text-light" name="input_siswa_validate" value="12345">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal Tambah User Baru-->

            <?php
            if (empty($result)) {
                echo "<p class='text-center mt-2'>Siswa Kosong</p>";
            } else {
                foreach ($result as $row) {
            ?>
                    <!-- Modal View-->
                    <div class="modal fade" id="ModalView<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Siswa</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_input_siswa.php" method="POST">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-floating mb-3">
                                                    <input readonly type="text" class="form-control" id="floatingInput" placeholder="NISN" name="nomor_pengenal" value="<?php echo $row['nomor_pengenal'] ?>">
                                                    <label for="floatingInput">NISN</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan NISN.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="form-floating mb-3">
                                                    <input readonly type="text" class="form-control" id="floatingInput" placeholder="Name" name="nama" value="<?php echo $row['nama'] ?>">
                                                    <label for="floatingInput">Nama</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan nama.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="col-lg-12">
                                                    <div class="form-floating mb-3">
                                                        <input readonly type="text" class="form-control" id="floatingInput"  name="jenis_kelamin" value="<?php
                                                    if ($row['jenis_kelamin'] == 1) {
                                                        echo "Laki - Laki";
                                                    } else if ($row['jenis_kelamin'] == 2) {
                                                        echo "Perempuan";
                                                    }
                                                    ?>">
                                                        <label for="floatingInput">Jenis Kelamin</label>
                                                        <div class="invalid-feedback">
                                                            Masukkan jenis kelamin.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="col-lg-12">
                                                    <div class="form-floating mb-3">
                                                        <input readonly type="text" class="form-control" id="floatingInput"  name="kelas" value="<?php
                                                    foreach ($select_kelas as $value) {
                                                        if ($row['kelas'] == $value['id_kelas']) {
                                                            echo "$value[nama_kelas]";
                                                        }
                                                    }
                                                    ?>">
                                                        <label for="floatingInput">Kelas</label>
                                                        <div class="invalid-feedback">
                                                            Masukkan kelas.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal View-->

                    <!-- Modal Edit-->
                    <div class="modal fade" id="ModalEdit<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Siswa</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_edit_siswa.php" method="POST">
                                    <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-floating mb-3">
                                                    <input <?php echo ($row['nomor_pengenal'] == $_SESSION['nomor_pengenal_evo']) ? 'disabled' : ' ';  ?> type="text" class="form-control" id="floatingInput" placeholder="NISN" name="nomor_pengenal" value="<?php echo $row['nomor_pengenal'] ?>" required>
                                                    <label for="floatingInput">NISN</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan NISN.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingInput" placeholder="Name" name="nama" value="<?php echo $row['nama'] ?>" required>
                                                    <label for="floatingInput">Nama</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan nama.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <select class="form-select" aria-label="Default select example" name="jenis_kelamin" required>
                                                    <?php
                                                        $data = array("Laki - Laki", "Perempuan");
                                                        foreach ($data as $key => $value) {
                                                            if ($row['jenis_kelamin'] == $key + 1) {
                                                                echo "<option selected value=" . ($key + 1) . ">$value</option>";
                                                            } else {
                                                                echo "<option value=" . ($key + 1) . ">$value</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                    <label for="floatingInput">Jenis Kelamin</label>
                                                    <div class="invalid-feedback">
                                                        Pilih jenis kelamin.
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <select name="kelas" id="" class="form-select" required>
                                                        <option selected hidden value="">Pilih Kelas</option>
                                                        <?php
                                                        foreach ($select_kelas as $value) {
                                                            if ($row['kelas'] == $value['id_kelas']) {
                                                                echo "<option selected value=" . $value['id_kelas'] . " >$value[nama_kelas]</option>";
                                                            } else {
                                                                echo "<option value=" . $value['id_kelas'] . ">$value[nama_kelas]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                    <label for="kelas">Kelas</label>
                                                    <div class="invalid-feedback">
                                                        Pilih kelas.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-info text-light" name="edit_siswa_validate" value="12345">Ubah</button>
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
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Siswa</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_delete_siswa.php" method="POST">
                                        <input type="hidden" value="<?php echo $row['nomor_pengenal'] ?>" name="nomor_pengenal">
                                        <div class="col-lg-12">
                                            <?php
                                            if ($row['nomor_pengenal'] == $_SESSION['nomor_pengenal_evo']) {
                                                echo "<div class='alert alert-danger'>Anda tidak dapat menghapus akun sendiri </div>";
                                            } else {
                                                echo "<p class='text-center'>Apakah kamu ingin menghapus siswa <br><b>$row[nomor_pengenal] / $row[nama]</b></p>";
                                            }
                                            ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-danger" name="hapus_siswa_validate" value="12345" <?php echo ($row['nomor_pengenal'] == $_SESSION['nomor_pengenal_evo']) ? 'disabled' : ' '; ?>>Hapus</button>
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
                                    <form class="needs-validation" novalidate action="proses/proses_reset_password_siswa.php" method="POST">
                                        <input type="hidden" value="<?php echo $row['nomor_pengenal'] ?>" name="nomor_pengenal">
                                        <div class="col-lg-12">
                                            <?php
                                            if ($row['nomor_pengenal'] == $_SESSION['nomor_pengenal_evo']) {
                                                echo "<div class='alert alert-danger'>Anda tidak dapat mengreset password sendiri </div>";
                                            } else {
                                                echo "<p class='text-center'>Apakah kamu ingin mengreset password siswa <br><b>$row[nomor_pengenal] / $row[nama]</b></p>";
                                            }
                                            ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-success" name="reset_password_siswa_validate" value="12345" <?php echo ($row['nomor_pengenal'] == $_SESSION['nomor_pengenal_evo']) ? 'disabled' : ' '; ?>>Reset Password</button>
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
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered mt-3">
                        <thead>
                            <tr class="text-nowrap">
                                <th scope="col">No</th>
                                <th scope="col">NISN</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($result as $row) {
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $no++ ?></th>
                                    <td><?php echo $row['nomor_pengenal'] ?></td>
                                    <td><?php echo $row['nama'] ?></td>
                                    <td><?php echo $row['nama_kelas'] ?></td>
                                    <td><?php
                                        if ($row['jenis_kelamin'] == 1) {
                                            echo "Laki - Laki";
                                        } else if ($row['jenis_kelamin'] == 2) {
                                            echo "Perempuan";
                                        }
                                        ?></td>
                                    <td class="d-flex">
                                        <button class="btn btn-primary text-light btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalView<?php echo $row['id'] ?>"><i class="bi bi-eye"></i></button>
                                        <button class="btn btn-warning text-light btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $row['id'] ?>"><i class="bi bi-pencil-square"></i></button>
                                        <button class="btn btn-danger btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalDelete<?php echo $row['id'] ?>"><i class="bi bi-trash3"></i></button>
                                        <button class="btn btn-secondary btn-sm " data-bs-toggle="modal" data-bs-target="#ModalResetPassword<?php echo $row['id'] ?>"><i class="bi bi-key"></i></button>
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