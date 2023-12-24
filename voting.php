<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_kandidat
    GROUP BY id ORDER BY nomor_urut ASC");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;


    $select_kandidat = mysqli_query($conn, "SELECT nomor_urut,nama_ketua,nama_wakil FROM tb_kandidat");
}
if (empty($result)) {
    echo "<h2 class='text-center mt-5'>Maaf, Kandidat Tidak Tersedia Saat Ini. Terima kasih.</h2>";
} else {
    echo '<div class="row">';
    foreach ($result as $row) {
?>
        <div class="col-lg-6 mb-2 mt-3">
            <form class="needs-validation" novalidate action="proses/proses_voting.php" method="POST">
                <input type="hidden" value="<?php echo $_SESSION['nomor_pengenal_evo'] ?>" name="nomor_pengenal">
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
                </div>
    </div>
        <?php
    }
    echo '</div>';
}
        ?>
        <div class="form-floating mb-3">
            <select name="nomor_urut" id="" class="form-select" required>
                <option selected hidden value="">Pilih Menu</option>
                <?php
                foreach ($select_kandidat as $value) {
                    if ($row['kandidat'] == $value['nomor_urut']) {
                        echo "<option selected value=" . $value['nomor_urut'] . ">$value[nama_ketua] - $value[nama_wakil]</option>";
                    } else {
                        echo "<option value=" . $value['nomor_urut'] . ">$value[nama_ketua] - $value[nama_wakil]</option>";
                    }
                }
                ?>
            </select>
            <label for="menu">Menu</label>
            <div class="invalid-feedback">
                Pilih menu.
            </div>
        </div>
        <div class="card-footer border-0 bg-transparent">
            <div class="d-grid gap-2 col-6 mx-auto">
                <button type="submit" class="btn btn-info text-light" name="voting_validate" value="12345">Vote</button>
            </div>
        </div>
        </div>
        </form>