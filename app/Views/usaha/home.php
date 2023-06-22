<?php echo view('layout/header');?>
<?=$this->include('layout/sidebar'); ?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>UMKM Bengkalis</h1>
          </div>
          <div class="col-12 mb-4">
                <div class="hero text-white hero-bg-image" data-background="/assets/img/unsplash/login-bg.jpg">
                  <div class="hero-inner">
                    <h4>Selamat Datang di situs UMKM Bengkalis</h4>
                    <h2><?= user()->username;?></h2>
                    
                  </div>
                </div>
              </div>
        </section>
      </div>
      <?php echo view('layout/footer');?>
    </div>
  </div>

  