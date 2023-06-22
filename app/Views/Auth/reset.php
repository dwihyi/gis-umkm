<?php echo view('Auth/template/header'); ?>
<div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row justify-content-center">
          <div class="col-md-6 ">
            <div class="login-brand">
            <a href="<?= route_to('login') ?>">    <img src="<?=base_url()?>/template/img/bks.png" width="40" height="50" alt="UMKM Bengkalis"></a>
                UMKM Bengkalis   
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Reset Password</h4></div>

              <div class="card-body">
              <?= view('Myth\Auth\Views\_message_block') ?>
                <p class="text-muted">We will send a link to reset your password</p>
                <form method="POST" action="<?= route_to('reset-password') ?>">
                <?= csrf_field() ?>

                    <div class="form-group">
                        <label for="token"><?=lang('Auth.token')?></label>
                        <input type="text" class="form-control <?php if(session('errors.token')) : ?>is-invalid<?php endif ?>"
                                name="token" placeholder="<?=lang('Auth.token')?>" value="<?= old('token', $token ?? '') ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.token') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email"><?=lang('Auth.email')?></label>
                        <input type="email" class="form-control <?php if(session('errors.email')) : ?>is-invalid<?php endif ?>"
                                name="email" aria-describedby="emailHelp" placeholder="<?=lang('Auth.email')?>" value="<?= old('email') ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.email') ?>
                        </div>
                    </div>

                    <br>

                    <div class="form-group">
                        <label for="password"><?=lang('Auth.newPassword')?></label>
                        <input type="password" class="form-control <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>"
                                name="password">
                        <div class="invalid-feedback">
                            <?= session('errors.password') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="pass_confirm"><?=lang('Auth.newPasswordRepeat')?></label>
                        <input type="password" class="form-control <?php if(session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>"
                                name="pass_confirm">
                        <div class="invalid-feedback">
                            <?= session('errors.pass_confirm') ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block"><?=lang('Auth.resetPassword')?></button>
                    <br>
                        
                </form>
              </div>
            </div>
            <?php echo view ('Auth/template/footer'); ?>
          </div>
        </div>
      </div>
    </section>
  </div>