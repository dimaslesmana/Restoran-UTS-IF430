<?= $this->extend('layout/user/auth'); ?>

<?= $this->section('content'); ?>

<div class="register">
    <div class="container text-center">
        <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
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
                            </div>
                            <form class="user" action="/auth/new" method="post">
                                <?= csrf_field(); ?>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user <?= ($validation->hasError('firstName')) ? 'is-invalid' : ''; ?>" id="firstName" name="firstName" placeholder="First Name" value="<?= old('firstName'); ?>" autofocus>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('firstName'); ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user <?= ($validation->hasError('lastName')) ? 'is-invalid' : ''; ?>" id="lastName" name="lastName" placeholder="Last Name" value="<?= old('lastName'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('lastName'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" placeholder="Email Address" value="<?= old('email'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('email'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="password" name="password" placeholder="Password">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('password'); ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user <?= ($validation->hasError('confirmPassword')) ? 'is-invalid' : ''; ?>" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('confirmPassword'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <select class="form-control <?= ($validation->hasError('jenisKelamin')) ? 'is-invalid' : ''; ?>" name="jenisKelamin">
                                            <option selected disabled>Choose a gender</option>
                                            <option value="L">Male</option>
                                            <option value="P">Female</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('jenisKelamin'); ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control <?= ($validation->hasError('tanggalLahir')) ? 'is-invalid' : ''; ?>" id="tanggalLahir" name="tanggalLahir" placeholder="Birth Date" value="<?= old('tanggalLahir'); ?>" readonly>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('tanggalLahir'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-3 mx-auto">
                                    <img src="/auth/captcha" alt="captcha" class="col-2">
                                    <input type="text" class="form-control form-control-user col-10 <?= ($validation->hasError('captcha')) ? 'is-invalid' : ''; ?>" id="captcha" name="captcha" placeholder="Captcha">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('captcha'); ?>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-user btn-block">
                                    Register
                                </button>
                            </form>
                            <hr>
                            <div>
                                <a class="small" href="/auth/login">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="/"><i class="fa fa-long-arrow-alt-left"></i> Back to Home</a>
    </div>
</div>

<?= $this->endSection(); ?>