<?php echo view('Auth/template/header'); ?>
<div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row justify-content-center">
          <div class="col-md-6 ">
            <div class="login-brand">
                <a href="<?= route_to('login') ?>"> <img src="<?=base_url()?>/template/img/bks.png" width="40" height="50" alt="UMKM Bengkalis"></a>
                UMKM Bengkalis   
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Lupa Password</h4></div>
              <div class="card-body">
              <?= view('Myth\Auth\Views\_message_block') ?>
                <p class="text-muted">Kami akan mengirim link untuk atur ulang password anda</p>
                <form method="POST" action="<?= route_to('forgot') ?>">
                <?= csrf_field() ?>
                    <div class="form-group">
                        <label for="email"><?=lang('Auth.email')?></label>
                        <input id="email" type="email" class="form-control" <?php if(session('errors.email')) : ?>is-invalid<?php endif ?>"
                            placeholder="Masukkan Email" aria-describedby="emailHelp" name="email" tabindex="1" required autofocus>
                        <div class="invalid-feedback">
                            <?= session('errors.email') ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Kirim</button>
                </form>
              </div>
            </div>
            <?php echo view ('Auth/template/footer'); ?>
          </div>
        </div>
      </div>
    </section>
  </div>