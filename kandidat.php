<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_kandidat
    GROUP BY id ORDER BY nomor_urut ASC");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
?>


<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Data Kandidat
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col d-flex justify-content-start">
                    <button class="btn btn-info text-light #ModalDelete??php" data-bs-toggle="modal" data-bs-target="#ModalTambahUser"> Tambah Kandidat</button>
                </div>
            </div>
            <!-- Modal Tambah User Baru-->
            <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kandidat</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_input_kandidat.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="No Urut" name="nomor_urut" required>
                                            <label for="floatingInput">No Urut</label>
                                            <div class="invalid-feedback">
                                                Masukkan No Urut.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Name Ketua" name="nama_ketua" required>
                                            <label for="floatingInput">Nama Ketua</label>
                                            <div class="invalid-feedback">
                                                Masukkan nama ketua.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Name Wakil Ketua" name="nama_wakil" required>
                                            <label for="floatingInput">Nama Wakil Ketua</label>
                                            <div class="invalid-feedback">
                                                Masukkan nama wakil ketua.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control py-3" id="uploadfoto" placeholder="Foto Ketua" name="fotoketua" required>
                                            <div class="invalid-feedback">
                                                Masukkan file foto ketua.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="file" class="form-control py-3" id="uploadfoto" placeholder="Foto Wakil" name="fotowakil" required>
                                            <div class="invalid-feedback">
                                                Masukkan file foto wakil ketua.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-floating mb-3">
                                    <textarea id="" style="height: 100px;" class="form-control" placeholder="Visi" name="visi" required></textarea>
                                    <label for="floatingInput">Visi</label>
                                    <div class="invalid-feedback">
                                        Masukkan visi.
                                    </div>
                                </div>

                                <div class="form-floating mb-3">
                                    <textarea id="" style="height: 100px;" class="form-control" placeholder="Misi" name="misi" required></textarea>
                                    <label for="floatingInput">Misi</label>
                                    <div class="invalid-feedback">
                                        Masukkan misi.
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-info text-light" name="input_kandidat_validate" value="12345">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal Tambah User Baru-->

            <?php
            if (empty($result)) {
                echo "<p class='text-center mt-2'>Kandidat Kosong</p>";
            } else {
                foreach ($result as $row) {
            ?>
                    <!-- Modal Edit-->
                    <div class="modal fade" id="ModalEdit<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Kandidat</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_edit_kandidat.php" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingInput" placeholder="No Urut" name="nomor_urut" value="<?php echo $row['nomor_urut'] ?>" required>
                                                    <label for="floatingInput">No Urut</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan No Urut.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingInput" placeholder="Name Ketua" name="nama_ketua" value="<?php echo $row['nama_ketua'] ?>" required>
                                                    <label for="floatingInput">Nama Ketua</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan nama ketua.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">

                                                    <input type="text" class="form-control" id="floatingInput" placeholder="Name Wakil Ketua" name="nama_wakil" value="<?php echo $row['nama_wakil'] ?>" required>
                                                    <label for="floatingInput">Nama Wakil Ketua</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan nama wakil ketua.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="input-group mb-3">
                                                    <input type="file" class="form-control py-3" id="uploadfoto" placeholder="Foto Ketua" name="fotoketua">
                                                    <div class="invalid-feedback">
                                                        Masukkan file foto ketua.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="file" class="form-control py-3" id="uploadfoto" placeholder="Foto Wakil" name="fotowakil">
                                                    <div class="invalid-feedback">
                                                        Masukkan file foto wakil ketua.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <textarea id="" style="height: 100px;" class="form-control" placeholder="Visi" name="visi" required><?php echo $row['visi'] ?></textarea>
                                            <label for="floatingInput">Visi</label>
                                            <div class="invalid-feedback">
                                                Masukkan visi.
                                            </div>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <textarea id="" style="height: 100px;" class="form-control" placeholder="Misi" name="misi" required><?php echo $row['misi'] ?></textarea>
                                            <label for="floatingInput">Misi</label>
                                            <div class="invalid-feedback">
                                                Masukkan misi.
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-info text-light" name="edit_kandidat_validate" value="12345">Tambah</button>
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
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Kandidat</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_delete_kandidat.php" method="POST">
                                        <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                                        <input type="hidden" value="<?php echo $row['fotoketua'] ?>" name="fotoketua">
                                        <input type="hidden" value="<?php echo $row['fotowakil'] ?>" name="fotowakil">
                                        <div class="col-lg-12 mb-3">
                                            Apakah Anda Ingin Menghapus Kandidat No. Urut <b> <?php echo $row['nomor_urut'] ?></b>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-danger" name="hapus_kandidat_validate" value="12345">Hapus</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal Delete-->

                <?php
                }
            }
            if (empty($result)) {
            } else {
                echo '<div class="row">';
                foreach ($result as $row) {
                ?>
                    <div class="col-lg-6 mb-2 mt-3">
                        <div class="card" style="height: 100%;">
                            <div class="card-body">
                                <h1><?php echo $row['nomor_urut'] ?></h1>
                                <div class="text-center">
                                    <div style="width: 200px; display: inline-block;">
                                        <img src="assets/img/<?php echo $row['fotoketua'] ?>" class="img-thumbnail alight-center" alt="...">
                                    </div>
                                    <div style="width: 200px; display: inline-block;">
                                        <img src="assets/img/<?php echo $row['fotowakil'] ?>" class="img-thumbnail alight-center" alt="...">
                                    </div>
                                </div>
                                <h4 class="card-title text-center mt-1"><?php echo $row['nama_ketua'] ?> - <?php echo $row['nama_wakil'] ?></h4>
                                <h5 class="text-start">VISI :</h5>
                                <p class="card-text"><?php echo nl2br($row['visi']) ?></p>
                                <h5 class="text-start">MISI :</h5>
                                <p class="card-text"><?php echo nl2br($row['misi']) ?></p>

                            </div>
                            <div class="card-footer border-0 bg-transparent">
                                <div class="text-center">
                                    <button class="btn btn-warning text-light btn-sm mb-1" style="width: 49%;" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $row['id'] ?>"><i class="bi bi-pencil-square"></i></button>
                                    <button class="btn btn-danger btn-sm mb-1" style="width: 49%;" data-bs-toggle="modal" data-bs-target="#ModalDelete<?php echo $row['id'] ?>"><i class="bi bi-trash3"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>

            <?php
                }
                echo '</div>';
            }
            ?>
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