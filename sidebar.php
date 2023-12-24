<div class="col-lg-3">
    <nav class="navbar navbar-expand-lg bg-light rounded border mt-2">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" style="width:250px">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">EVO.</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav nav-pills flex-column justify-content-end flex-grow-1">

                        <li class="nav-item">
                            <a class="nav-link ps-2 <?php echo ((isset($_GET['x']) && $_GET['x'] == 'home') || !isset($_GET['x'])) ? 'active link-light bg-info' : 'link-dark'; ?> " aria-current="page" href="home"><i class="bi bi-house-door"></i> Home</a>
                        </li>
                        <?php if ($hasil['level'] == 1) { ?>
                            <li class="nav-item">
                                <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'guru') ? 'active link-light bg-info' : 'link-dark'; ?>" href="guru"><i class="bi bi-person-badge"></i> Guru</a>
                            </li>
                        <?php } ?>

                        <?php if ($hasil['level'] == 1 || $hasil['level'] == 2) { ?>
                            <li class="nav-item">
                                <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'kandidat') ? 'active link-light bg-info' : 'link-dark'; ?>" href="kandidat"><i class="bi bi-person-vcard"></i> Kandidat</a>
                            </li>
                        <?php } ?>

                        <?php if ($hasil['level'] == 1) { ?>
                            <li class="nav-item">
                                <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'siswa') ? 'active link-light bg-info' : 'link-dark'; ?>" href="siswa"><i class="bi bi-people"></i> Siswa</a>
                            </li>
                        <?php } ?>

                        <?php if ($hasil['level'] == 1 || $hasil['level'] == 2) { ?>
                            <li class="nav-item">
                                <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'report') ? 'active link-light bg-info' : 'link-dark'; ?>" href="report"><i class="bi bi-receipt-cutoff"></i> Hasil Voting</a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>