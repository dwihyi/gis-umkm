<div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="#"><img src="<?=base_url()?>/template/img/bks.png" width="40" height="50" alt="UMKM Bengkalis"> UMKM Bengkalis</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">UMKM</a>
          </div>
          <?php if (in_groups('admin')) : ?>
            <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
                  <li class="nav-item active">
                    <a href="<?=base_url('Usaha') ?>" class="nav-link "><i class="fas fa-home"></i><span>Dashboard</span></a>
                </li>
              <li class="menu-header">Peta</li>
                  <li class="nav-item">
                    <a href="<?=base_url('admin') ?>" class="nav-link "><i class="fas fa-map"></i><span>Peta UMKM Bengkalis</span></a>
                </li>
              <li class="menu-header">Database</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-database"></i> <span>Database</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?= base_url('/kecamatan')?>">Data Kecamatan</a></li>
                  <li><a class="nav-link" href="<?= base_url('sektor')?>">Sektor Usaha</a></li>
                  <li><a class="nav-link" href="<?= base_url('umkm')?>">Data UMKM</a></li>
                  <li><a class="nav-link" href="<?= base_url('Klustering')?>">Data Pengelompokan</a></li>
                </ul>
              </li>
              <li class="menu-header">Kontak</li>
              <li class="nav-item">
                <a href="<?=base_url('/admin/kontak') ?>" class="nav-link "><i class="fas fa-folder"></i><span>Kritik & Saran</span></a>
              </li>
            </ul>
          <?php endif;?>
          <?php if (in_groups('user')) : ?>
            <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
                <li class="nav-item active">
                <a href="<?=base_url('Usaha') ?>" class="nav-link "><i class="fas fa-home"></i><span>Dashboard</span></a>
              </li>
              <li class="menu-header">Profil Usaha</li>
              <li class="nav-item">
                <a href="<?=base_url('usaha/myprofil') ?>" class="nav-link "><i class="fas fa-user"></i><span>Profil UMKM</span></a>
              </li>
            </ul>
            <?php endif;?>
        </aside>
      </div>