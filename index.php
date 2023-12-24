<?php
session_start();
if (isset($_GET['x']) && $_GET['x'] == 'home') {
    if ($_SESSION['level_evo'] == 1 || $_SESSION['level_evo'] == 2) {
        $page = "home.php";
        include "main.php";
    }
} elseif (isset($_GET['x']) && $_GET['x'] == 'guru') {
    if ($_SESSION['level_evo'] == 1) {
        $page = "guru.php";
        include "main.php";
    }
} elseif (isset($_GET['x']) && $_GET['x'] == 'kandidat') {
    if ($_SESSION['level_evo'] == 1 || $_SESSION['level_evo'] == 2) {
        $page = "kandidat.php";
        include "main.php";
    }
} elseif (isset($_GET['x']) && $_GET['x'] == 'siswa') {
    if ($_SESSION['level_evo'] == 1) {
        $page = "siswa.php";
        include "main.php";
    }
} elseif (isset($_GET['x']) && $_GET['x'] == 'report') {
    if ($_SESSION['level_evo'] == 1 || $_SESSION['level_evo'] == 2) {
        $page = "report.php";
        include "main.php";
    }
} elseif (isset($_GET['x']) && $_GET['x'] == 'voting') {
    if ($_SESSION['level_evo'] == 3) {
        $page = "voting.php";
        include "pemilihan.php";
    }
} elseif (isset($_GET['x']) && $_GET['x'] == 'utama') {
    if ($_SESSION['level_evo'] == 3) {
        $page = "voting.php";
        include "pemilihan.php";
    }
} elseif (isset($_GET['x']) && $_GET['x'] == 'login') {
    include "login.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'logout') {
    include "proses/proses_logout.php";
}
