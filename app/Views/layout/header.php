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
  <link rel="stylesheet" href="<?=base_url()?>/leaflet/leaflet.css" />
  <script src="<?=base_url()?>/leaflet/leaflet.js"></script> 
  
  <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
         integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
         crossorigin=""></script>
  
  <script src="https://unpkg.com/leaflet@1.3.0/dist/leaflet.js"></script>
  <link rel="stylesheet" href="<?=base_url()?>/leaflet-search-master/src/leaflet-search.css" />
  <script src="<?=base_url()?>/leaflet-search-master/src/leaflet-search.js"></script>

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?=base_url()?>/template/assets/css/style.css">
  <link rel="stylesheet" href="<?=base_url()?>/template/assets/css/components.css">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="<?=base_url()?>/template/assets/img/avatar/default.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block"> <?= user()->username;?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <!-- <a href="features-profile.html" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a> -->
              <div class="dropdown-divider"></div>
              <a href="<?=base_url('logout');?>" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
     