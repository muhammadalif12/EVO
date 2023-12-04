<?php
session_start();
if (isset($_GET['x']) && $_GET['x'] == 'home') {
    $page = "home.php";
    include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'guru') {
    $page = "guru.php";
    include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'kandidat') {
    $page = "kandidat.php";
    include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'siswa') {
    $page = "siswa.php";
    include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'report') {
    $page = "report.php";
    include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'login') {
    include "login.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'logout') {
    include "proses/proses_logout.php";
} else {
    $page = "home.php";
    include "main.php";
}
