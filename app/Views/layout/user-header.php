<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?= $title ?></title>

  <!-- General CSS Files -->
    <link rel="icon" href="<?=base_url()?>/template/img/bks.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="<?=base_url()?>/template/node_modules/bootstrap/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="<?=base_url()?>/template/node_modules/@fortawesome/fontawesome-free/css/all.css" >

  <!-- Leaflet Libraries -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>


  <!-- Leaflet control search -->
 
  <!-- <script src="https://unpkg.com/leaflet@1.3.0/dist/leaflet.js"></script> -->
  <link rel="stylesheet" href="<?=base_url()?>/leaflet-search-master/src/leaflet-search.css" />
  <script src="<?=base_url()?>/leaflet-search-master/src/leaflet-search.js"></script>
  
  <!-- Template CSS -->
  <link rel="stylesheet" href="<?=base_url()?>/template/assets/css/style.css">
  <link rel="stylesheet" href="<?=base_url()?>/template/assets/css/components.css">
</head>

<body class="layout-3">
  <div id="app">
    <div class="main-wrapper container">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <a class="navbar-brand sidebar-gone-hide" href="<?= base_url('/')?>">
            <img src="<?=base_url()?>/template/img/bks.png" width="40" height="50" alt="UMKM Bengkalis">
            UMKM Bengkalis
        </a>
        <div class="navbar-nav">
          <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
        </div>  
        <div class="nav-collapse">
          <!-- <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
            <i class="fas fa-ellipsis-v"></i>
          </a> -->
        </div>
        <ul class="navbar-nav">
          <li class="nav-item active"><a href="<?= base_url('/user/tentang')?>" class="nav-link">Tentang</a></li>
          <li class="nav-item active"><a href="<?= base_url('/user/kontak')?>" class="nav-link">Kontak</a></li>
          <li class="nav-item active"><a href="<?= base_url('usaha')?>" class="nav-link">Login</a></li>
        </ul>
      </nav>

      <nav class="navbar navbar-secondary navbar-expand-lg">
        <div class="container">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a href="<?= base_url('/')?>" class="nav-link"><i class="far fa-map"></i><span>Peta sebaran UMKM Bengkalis</span></a>
            </li>
            <li class="nav-item dropdown">
              <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="far fa-folder"></i><span>Data UMKM Bengkalis</span></a>
              <ul class="dropdown-menu">
                <li class="nav-item"><a href="<?= base_url('/user/dataUMKM')?>" class="nav-link">Data UMKM</a></li>
                <li class="nav-item"><a href="<?= base_url('/user/dataSektor')?>" class="nav-link">Data Sektor Usaha</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>