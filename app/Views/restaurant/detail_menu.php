<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="detail">
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
        <!-- Menu Detail -->
        <section id="menu-detail" class="menu-detail">
            <div class="container text-white">
                <div class="row mb-4">
                    <div class="col">
                        <a class="text-white" href="/"><i class="fa fa-arrow-circle-left"></i> Back to Home</a>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <h2><?= $nama_menu; ?> (<?= $kategori_menu; ?>)</h2>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md-4">
                        <img src="/assets/img/menu-restoran/<?= $gambar_menu; ?>" alt="<?= $nama_menu; ?>" width="100%">
                    </div>
                    <div class="col-md-8 text-justify">
                        <p><?= $deskripsi_menu; ?></p>
                        <h5 class="font-weight-bold">Harga</h5>
                        <h5 class="mb-4"><?= number_to_currency($harga_menu, 'IDR'); ?></h5>
                        <a type="button" class="btn btn-success rounded-pill" href="#"><i class="fa fa-cart-arrow-down"></i> Order</a>
                    </div>
                </div>
            </div>
            <!-- End of Menu Detail -->
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