<?php echo view('Auth/template/header'); ?>
<div id="app" style="background-color:#4169E1;">
<div id="app">
    <section class="section">
        <div class="container"> 
            <div class="row justify-content-center">
                <div class="col-md-6"><br><br><br><br>
                    <div class="card card-body ">
                        <div class="text-center">
                            <h4><span class="font-weight-bold"><?=lang('Auth.register')?></span></h4>
                        </div>
                            <hr>
                            <?= view('Myth\Auth\Views\_message_block') ?>
                            <form action="<?= route_to('register') ?>" method="post" class="user">
                                <?= csrf_field() ?>

                                <div class="form-group">
                                    <input type="email" class="form-control <?php if(session('errors.email')) : ?>is-invalid<?php endif ?>" name="email"
                                        aria-describedby="emailHelp" placeholder="<?=lang('Auth.email')?>" value="<?= old('email') ?>">
                                        <small id="emailHelp" class="form-text text-muted"><?=lang('Auth.weNeverShare')?></small>
                                    <div class="invalid-feedback">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input id="username" type="text" class="form-control <?php if(session('errors.username')) : ?>is-invalid<?php endif ?>" 
                                        name="username" placeholder="<?=lang('Auth.username')?>" value="<?= old('username') ?>">
                                    <div class="invalid-feedback">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                    <input type="password" name="password" class="form-control <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.password')?>" autocomplete="off">
                                    </div>
                                    <div class="form-group col-6">
                                    <input type="password" name="pass_confirm" class="form-control <?php if(session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.repeatPassword')?>" autocomplete="off">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    <?=lang('Auth.register')?>
                                    </button>
                                </div>
                            </form>
                            <div class="mt-5 text-center">
                                <p><?=lang('Auth.alreadyRegistered')?> <a href="<?= route_to('login') ?>"><?=lang('Auth.signIn')?></a></p>
                            </div>
                            <?php echo view ('Auth/template/footer'); ?>
                    </div><br><br><br><br>
                </div>
            </div>
        </div>
    </section>
</div>
</div>
  
