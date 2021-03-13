<?= $this->extend('layout/user/auth'); ?>

<?= $this->section('content'); ?>

<div class="login">
    <div class="container text-center">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="mb-2">
                                        <img src="/assets/img/K-Food21.png" alt="logo" width="100" height="100">
                                        <?php if (session()->getFlashdata('alert_error')) : ?>
                                            <div class="alert alert-danger" role="alert">
                                                <?= session()->getFlashdata('alert_error'); ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (session()->getFlashdata('alert_success')) : ?>
                                            <div class="alert alert-success" role="alert">
                                                <?= session()->getFlashdata('alert_success'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <form class="user" action="/auth/doLogin" method="post">
                                        <?= csrf_field(); ?>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" aria-describedby="emailHelp" placeholder="Email Address" value="<?= old('email'); ?>" autofocus>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('email'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="password" name="password" placeholder="Password">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('password'); ?>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                    <div>
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div>
                                        <a class="small" href="/auth/register">Doesn't have an account? Create here!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="/"><i class="fa fa-long-arrow-alt-left"></i> Back to Home</a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>