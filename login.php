<?php 
    // session_start();
    if(!empty($_SESSION['nomor_pengenal_evo'])) {
        header('location:home');
    }
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="" />
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors" />
  <meta name="generator" content="Hugo 0.118.2" />
  <title>EVO - Login</title>
  <link rel="shortcut icon" href="assets/img/ikon.png" type="image/x-icon">
  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3" />

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .b-example-divider {
      width: 100%;
      height: 3rem;
      background-color: rgba(0, 0, 0, 0.1);
      border: solid rgba(0, 0, 0, 0.15);
      border-width: 1px 0;
      box-shadow: inset 0 0.5em 1.5em rgba(0, 0, 0, 0.1),
        inset 0 0.125em 0.5em rgba(0, 0, 0, 0.15);
    }

    .b-example-vr {
      flex-shrink: 0;
      width: 1.5rem;
      height: 100vh;
    }

    .bi {
      vertical-align: -0.125em;
      fill: currentColor;
    }

    .nav-scroller {
      position: relative;
      z-index: 2;
      height: 2.75rem;
      overflow-y: hidden;
    }

    .nav-scroller .nav {
      display: flex;
      flex-wrap: nowrap;
      padding-bottom: 1rem;
      margin-top: -1px;
      overflow-x: auto;
      text-align: center;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
    }

    .btn-bd-primary {
      --bd-violet-bg: #712cf9;
      --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

      --bs-btn-font-weight: 600;
      --bs-btn-color: var(--bs-white);
      --bs-btn-bg: var(--bd-violet-bg);
      --bs-btn-border-color: var(--bd-violet-bg);
      --bs-btn-hover-color: var(--bs-white);
      --bs-btn-hover-bg: #6528e0;
      --bs-btn-hover-border-color: #6528e0;
      --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
      --bs-btn-active-color: var(--bs-btn-hover-color);
      --bs-btn-active-bg: #5a23c8;
      --bs-btn-active-border-color: #5a23c8;
    }

    .bd-mode-toggle {
      z-index: 1500;
    }

    .bd-mode-toggle .dropdown-menu .active .bi {
      display: block !important;
    }
  </style>

  <!-- Custom styles for this template -->
  <link href="assets/css/login.css" rel="stylesheet" />
</head>

<body class="d-flex text-center py-4 bg-body-tertiary">
  <main class="form-signin w-100 m-auto">
    <form class="needs-validation" novalidate action="proses/proses_login.php" method="POST">
      <img class="mb-4" src="assets/img/ikon.png" width="100" />
      <h1 class="h3 mb-3 fw-normal">Login</h1>

      <div class="form-floating mb-3">
        <input type="text" class="form-control rounded-3" id="floatingInput" name="nomor_pengenal" placeholder="NISN/NIP" required />
        <label for="floatingInput">NISN / NIP</label>
        <div class="invalid-feedback">
          Masukkan NISN / NIP.
        </div>
      </div>
      <div class="form-floating mb-3">
        <input type="password" class="form-control rounded-3" id="floatingPassword" name="password" placeholder="Password" required />
        <label for="floatingPassword">Password</label>
        <div class="invalid-feedback">
          Masukkan Password.
        </div>
      </div>

      <button class="btn btn-primary w-100 py-2" type="submit" name="submit_validate" value="abc">
        Login
      </button>
      <p class="mt-5">Admin</p>
      <p class="text-start">NISN/NIP : admin</p>
      <p class="text-start">Password : admin</p>
      <p>Guru</p>
      <p class="text-start">NISN/NIP : 198908282018031001</p>
      <p class="text-start">Password : smpnegeri2lhokseumawe</p>
      <p>Siswa</p>
      <p class="text-start">NISN/NIP : 0040512494</p>
      <p class="text-start">Password : smpnegeri2lhokseumawe</p>
      <p class="mt-5 mb-3 text-body-secondary">Copyright © 2023 by EVO.</p>
    </form>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
  </script>

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

</body>


</html>