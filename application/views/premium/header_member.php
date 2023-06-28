<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <!-- ===============================================-->
  <!--    Document Title-->
  <!-- ===============================================-->
  <title>Sistem Pakar Tanaman Padi</title>

  <!-- ===============================================-->
  <!--    Favicons-->
  <!-- ===============================================-->
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('assets/user/img/favicons/apple-touch-icon.png'); ?>">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('assets/user/img/favicons/favicon-32x32.png'); ?>">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/user/img/favicons/favicon-16x16.png'); ?>">
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/user/img/favicons/favicon.ico'); ?>">
  <link rel="manifest" href="<?php echo base_url('assets/user/img/favicons/manifest.json'); ?>">
  <meta name="msapplication-TileImage" content="<?php echo base_url('assets/user/img/favicons/mstile-150x150.png'); ?>">
  <meta name="theme-color" content="#ffffff">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


  <!-- ===============================================-->
  <!--    Stylesheets-->
  <!-- ===============================================-->
  <link href="<?= base_url() ?>assets/user/css/theme.css" rel="stylesheet" />
  <link href="<?= base_url() ?>assets/user/css/pricing.css" rel="stylesheet" />


</head>


<body>

  <!-- ===============================================-->
  <!--    Main Content-->
  <!-- ===============================================-->
  <main class="main" id="top">
    <?php if (empty($this->session->userdata('is_login'))) : ?>
      <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 bg-light opacity-85" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container">
          <a class="navbar-brand" href="index.html">
            <img class="d-inline-block align-top img-fluid" src="<?php echo base_url('assets/user/img/gallery/logo-icon.png'); ?>" alt="" width="50" />
            <span class="text-theme font-monospace fs-4 ps-2">Ova</span>
          </a>
          <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item px-2"><a class="nav-link fw-medium active" aria-current="page" href="<?php echo base_url('user/') ?>">Beranda</a></li>
              <li class="nav-item px-2"><a class="nav-link fw-medium" href="<?php echo base_url('user/data_penyakit') ?>">Data Penyakit Padi</a></li>
              <li class="nav-item px-2"><a class="nav-link fw-medium" href="<?php echo base_url('user/') ?>#Kesempatan">Kesempatan</a></li>
              <li class="nav-item px-2"><a class="nav-link fw-medium" href="<?php echo base_url('user/') ?>#Cara Kerja">Cara Kerja</a></li>
              <li class="nav-item px-2"><a class="nav-link fw-medium" href="<?php echo base_url('user/') ?>#Langganan">Langganan</a></li>
              <li class="nav-item px-2"><a class="nav-link fw-medium" href="<?php echo base_url('user/') ?>#Kontak">Kontak </a></li>
            </ul>
          </div>
          <div class="btn-container">
            <a class="btn btn-m btn-warning" href="<?php echo base_url('member/register'); ?>" role="button">Register</a>
            <a class="btn btn-m btn-success" href="<?php echo base_url('member/login'); ?>" role="button">Login</a>
          </div>
        </div>
      </nav>
    <?php elseif ($this->session->userdata('is_login') && $this->session->userdata('premium') == 'N') : ?>
      <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 bg-light opacity-85" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container">
          <a class="navbar-brand" href="index.html">
            <img class="d-inline-block align-top img-fluid" src="<?php echo base_url('assets/user/img/gallery/logo-icon.png'); ?>" alt="" width="50" />
            <span class="text-theme font-monospace fs-4 ps-2">Ova</span>
          </a>
          <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item px-2"><a class="nav-link fw-medium active" aria-current="page" href="<?php echo base_url('member/') ?>">Beranda</a></li>
              <li class="nav-item px-2"><a class="nav-link fw-medium" href="<?php echo base_url('user/data_penyakit') ?>">Data Penyakit Padi</a></li>
              <li class="nav-item px-2"><a class="nav-link fw-medium" href="<?php echo base_url('member/') ?>#Kesempatan">Kesempatan</a></li>
              <li class="nav-item px-2"><a class="nav-link fw-medium" href="<?php echo base_url('member/') ?>#Cara Kerja">Cara Kerja</a></li>
              <li class="nav-item px-2"><a class="nav-link fw-medium" href="<?php echo base_url('member/') ?>#Kontak">Kontak </a></li>
            </ul>
          </div>
          <div class="btn-container">
            <a class="btn btn-m btn-dark bg-gradient" href="<?php echo base_url('user/konsultasi'); ?>" role="button">Konsultasi</a>
            <a class="btn btn-m btn-danger" href="<?php echo base_url('authmember/logout'); ?>" role="button">Logout</a>
          </div>
        </div>
      </nav>
    <?php elseif ($this->session->userdata('is_login') && $this->session->userdata('premium') == 'Y') : ?>
      <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 bg-light opacity-85" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container">
          <a class="navbar-brand" href="index.html">
            <img class="d-inline-block align-top img-fluid" src="<?php echo base_url('assets/user/img/gallery/logo-icon.png'); ?>" alt="" width="50" />
            <span class="text-theme font-monospace fs-4 ps-2">Ova</span>
          </a>
          <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item px-2"><a class="nav-link fw-medium active" aria-current="page" href="<?php echo base_url('member/') ?>">Beranda</a></li>
              <li class="nav-item px-2"><a class="nav-link fw-medium" href="<?php echo base_url('member/data_penyakitcf') ?>">Data Penyakit Padi</a></li>
              <li class="nav-item px-2"><a class="nav-link fw-medium" href="<?php echo base_url('member/') ?>#Kesempatan">Kesempatan</a></li>
              <li class="nav-item px-2"><a class="nav-link fw-medium" href="<?php echo base_url('member/') ?>#Cara Kerja">Cara Kerja</a></li>
            </ul>
          </div>
          <div class="btn-container">
            <a class="btn btn-m btn-dark bg-gradient" href="<?php echo base_url('member/konsultasicf'); ?>" role="button">Konsultasi</a>
            <a class="btn btn-m btn-danger" href="<?php echo base_url('authmember/logout'); ?>" role="button">Logout</a>
          </div>
        </div>
      </nav>
    <?php else : ?>
      <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 bg-light opacity-85" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container">
          <a class="navbar-brand" href="index.html">
            <img class="d-inline-block align-top img-fluid" src="<?php echo base_url('assets/user/img/gallery/logo-icon.png'); ?>" alt="" width="50" />
            <span class="text-theme font-monospace fs-4 ps-2">Ova</span>
          </a>
          <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item px-2"><a class="nav-link fw-medium active" aria-current="page" href="<?php echo base_url('user/') ?>">Beranda</a></li>
              <li class="nav-item px-2"><a class="nav-link fw-medium" href="<?php echo base_url('user/data_penyakit') ?>">Data Penyakit Padi</a></li>
              <li class="nav-item px-2"><a class="nav-link fw-medium" href="<?php echo base_url('user/') ?>#Kesempatan">Kesempatan</a></li>
              <li class="nav-item px-2"><a class="nav-link fw-medium" href="<?php echo base_url('user/') ?>#Cara Kerja">Cara Kerja</a></li>
              <li class="nav-item px-2"><a class="nav-link fw-medium" href="<?php echo base_url('user/') ?>#Langganan">Langganan</a></li>
          </div>
          <div class="btn-container">
            <a class="btn btn-m btn-warning" href="<?php echo base_url('member/register'); ?>" role="button">Register</a>
            <a class="btn btn-m btn-success" href="<?php echo base_url('member/login'); ?>" role="button">Login</a>
          </div>
        </div>
      </nav>
    <?php endif; ?>
  </main>