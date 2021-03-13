<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="addMenu">
    <header>
        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand mr-2" href="/">
                    <img src="/assets/img/K-Food21.png" width="70" height="70" alt="logo" loading="lazy" class="logo">
                </a>
                <a class="navbar-brand mb-0 h1 brand font-weight-bold" href="/">
                    <?= $nav_title; ?>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <?php if (session()->get('logged_in')) : ?>
                                <a type="button" class="btn rounded-pill btn-block" href="/auth/logout">Logout</a>
                            <?php else : ?>
                                <a type="button" class="btn rounded-pill btn-block" href="/auth/login">Login</a>
                            <?php endif; ?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End of Navbar -->
    </header>

    <main>
        <!-- Add Menu Form -->
        <section id="addMenuForm" class="addMenuForm">
            <div class="container text-white mb-4">
                <div class="row mb-4">
                    <div class="col">
                        <a class="text-white" href="/dashboard"><i class="fa fa-arrow-circle-left"></i> Back to Dashboard</a>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col">
                        <h2>Add Menu</h2>
                        <hr>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <form action="/dashboard/menu/save" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="form-group row py-1">
                                <label for="category" class="col-sm-2 col-form-label font-weight-bold">Category</label>
                                <div class="col-sm-10 px-0">
                                    <select class="custom-select <?= ($validation->hasError('menu_category')) ? 'is-invalid' : ''; ?>" name="menu_category">
                                        <option selected disabled>Select category...</option>
                                        <?php foreach ($categories as $category) : ?>
                                            <option value="<?= $category['category_id']; ?>"><?= $category['category_name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('menu_category'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row py-1">
                                <label for="name" class="col-sm-2 col-form-label font-weight-bold">Name</label>
                                <div class="col-sm-10 px-0">
                                    <input type="text" class="form-control <?= ($validation->hasError('menu_name')) ? 'is-invalid' : ''; ?>" id="name" name="menu_name" placeholder="Menu name" autofocus>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('menu_name'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row py-1">
                                <label for="price" class="col-sm-2 col-form-label font-weight-bold">Price</label>
                                <div class="col-sm-1 pl-0">
                                    <input class="form-control" type="text" placeholder="IDR" readonly>
                                </div>
                                <div class="col-sm-9 px-0">
                                    <input type="number" class="form-control <?= ($validation->hasError('menu_price')) ? 'is-invalid' : ''; ?>" id="price" name="menu_price" placeholder="Price">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('menu_price'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row py-1">
                                <label for="description" class="col-sm-2 col-form-label font-weight-bold">Description</label>
                                <div class="col-sm-10 px-0">
                                    <textarea class="form-control <?= ($validation->hasError('menu_desc')) ? 'is-invalid' : ''; ?>" id="description" name="menu_desc" rows="3" placeholder="Description"></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('menu_desc'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row py-1">
                                <label for="menu_img" class="col-sm-2 col-form-label font-weight-bold">Image</label>
                                <div class="col-sm-2">
                                    <img src="/assets/img/menu-restoran/placeholder.png" class="img-thumbnail img-preview">
                                </div>
                                <div class="col-sm-8 custom-file">
                                    <input type="file" accept=".jpg,.jpeg,.png" class="custom-file-input <?= ($validation->hasError('menu_img')) ? 'is-invalid' : ''; ?>" id="menu_img" name="menu_img">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('menu_img'); ?>
                                    </div>
                                    <label for="menu_img" class="custom-file-label">Choose an image...</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success btn-block rounded-pill">
                                Add
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-transparent">
        <div class="container text-white">
            <div class="row pt-3 text-center">
                <div class="col">
                    <p>&copy; 2021 &bull; K-Food 21</p>
                </div>
            </div>
        </div>
    </footer>
</div>

<?= $this->endSection(); ?>