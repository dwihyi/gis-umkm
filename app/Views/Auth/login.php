<?php echo view('Auth/template/header'); ?>
<div id="app" style="background-color:#4169E1;">
  <div class="container">
    <section class="section" >
     
        <div class="row justify-content-center">
          <div class="col-md-6"><br><br><br><br>
            <div class="card card-body ">
              <div class="text-center">
                  <h2><span class="font-weight-bold"><?=lang('Auth.loginTitle')?></span></h2><hr>
              </div>
                  <p class="text-muted">Kamu harus login atau registrasi terlebih dahulu jika belum memiliki akun.</p>
                  <?= view('Myth\Auth\Views\_message_block') ?>

                  <form action="<?= route_to('login') ?>" method="post">
                    <?= csrf_field() ?>

                    <?php if ($config->validFields === ['email']): ?>
                    <div class="form-group">
                      <label for="login">Email</label>
                      <input id="email" type="email" class="form-control<?php if(session('errors.login')) : ?>is-invalid<?php endif ?>"
								        name="login" placeholder="<?=lang('Auth.email')?>">
                      <div class="invalid-feedback">
                      </div>
                    </div>
              <?php else: ?>
                <div class="form-group">
                  <label for="login"><?=lang('Auth.emailOrUsername')?></label>
                  <input type="text" class="form-control <?php if(session('errors.login')) : ?>is-invalid<?php endif ?>"
                      name="login" placeholder="<?=lang('Auth.emailOrUsername')?>">
                  <div class="invalid-feedback">
                    
                  </div>
						    </div>
              <?php endif; ?>

                    <div class="form-group">
                      <div class="d-block">
                        <label for="password" class="control-label">Password</label>
                      </div>
                      <input type="password" name="password" class="form-control  <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.password')?>">
                      <div class="invalid-feedback">
                        
                      </div>
                    </div>
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block"><?=lang('Auth.loginAction')?></button>
                    </div>

                    <div class="mt-5 text-center">
                      <?php if ($config->allowRegistration) : ?>
                          <p><a href="<?= route_to('register') ?>"><?=lang('Auth.needAnAccount')?></a></p>
                      <?php endif; ?>
                      <?php if ($config->activeResetter): ?>
                                <p><a href="<?= route_to('forgot') ?>"><?=lang('Auth.forgotYourPassword')?></a></p>
                      <?php endif; ?>
                    </div>
                  </form>
                    
                    

                  <?php echo view ('Auth/template/footer'); ?>

              </div> 
              <br><br><br>
            </div>
          
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
 
