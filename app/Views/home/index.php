<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<?php if (session()->getFlashdata('toastr')) : ?>
    <?= session()->getFlashdata('toastr'); ?>
<?php endif; ?>

<header>
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-transparent scrolled">
        <div class="container-fluid">
            <a class="navbar-brand mr-2" href="#">
                <img src="/assets/img/K-Food21.png" width="70" height="70" alt="logo" loading="lazy" class="logo">
            </a>
            <a class="navbar-brand mb-0 h1 brand font-weight-bold" href="#">
                <?= $nav_title; ?>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#menu">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <?php if (session()->get('logged_in') && session()->get('role_id') !== 'R0001') : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/orders">My Orders</a>
                        </li>
                    <?php endif; ?>
                    <?php if (session()->get('role_id') === 'R0001') : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard">Dashboard</a>
                        </li>
                    <?php endif; ?>
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

    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container text-center">
            <img class="rounded-circle img-thumbnail mb-4" src="assets/img/K-Food21.png" alt="logo">
            <h1 class="display-4">Welcome!</h1>
            <p class="lead">We serves a variety of Korean-themed foods and drinks.</p>
            <a type="button" class="btn rounded-pill" href="#menu">See Menu</a>
        </div>
    </div>
    <!-- End of Jumbotron -->

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#2d4059" fill-opacity="1" d="M0,288L80,272C160,256,320,224,480,224C640,224,800,256,960,261.3C1120,267,1280,245,1360,234.7L1440,224L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z"></path>
    </svg>
</header>

<main>
    <!-- Menu -->
    <section id="menu" class="menu">
        <div class="container text-white">
            <div class="row mb-2 text-center">
                <div class="col">
                    <h3>Menu</h3>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="row justify-content-center mx-1">
                        <div class="col-lg-3 my-2 category-list">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <?php foreach ($categories as $idx => $category) : ?>
                                    <a class="nav-link<?= ($idx === 0) ? ' active' : ''; ?>" id="v-pills-<?= str_replace(' ', '-', strtolower(trim($category['category_name']))); ?>-tab" data-toggle="pill" href="#v-pills-<?= str_replace(' ', '-', strtolower(trim($category['category_name']))); ?>" role="tab" aria-controls="v-pills-<?= str_replace(' ', '-', strtolower(trim($category['category_name']))); ?>" aria-selected="true"><?= $category['category_name']; ?></a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="col-lg-8 mx-2 my-2 menu-list">
                            <div class="tab-content" id="v-pills-tabContent">
                                <?php foreach ($categories as $idx => $category) : ?>
                                    <div class="tab-pane fade<?= ($idx === 0) ? ' show active section' : ''; ?>" id="v-pills-<?= str_replace(' ', '-', strtolower(trim($category['category_name']))); ?>" role="tabpanel" aria-labelledby="v-pills-<?= str_replace(' ', '-', strtolower(trim($category['category_name']))); ?>-tab">
                                        <div class="cardWrapper">
                                            <?php
                                            $filter = $category['category_id'];
                                            $filteredMenu = array_filter($menus, function ($item) use ($filter) {
                                                return $item['category_id'] === $filter;
                                            });
                                            ?>
                                            <?php if ($filteredMenu) : ?>
                                                <?php foreach ($filteredMenu as $menu) : ?>
                                                    <a class="card" href="/menu/<?= $menu['id']; ?>">
                                                        <div class="card-overlay bg-transparent text-white">
                                                            <img src="/assets/img/menu-restoran/<?= $menu['gambar']; ?>" class="card-img" alt="detail">
                                                            <div class="card-img-overlay">
                                                                <p class="card-title">Click here for Menu Detail.</p>
                                                            </div>
                                                        </div>
                                                        <div class="card-body text-center">
                                                            <p class="card-text"><?= $menu['nama']; ?></p>
                                                        </div>
                                                    </a>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <h2>No menu found</h2>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

    </section>
    <!-- End of Menu -->

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#2d4059" fill-opacity="1" d="M0,288L80,272C160,256,320,224,480,224C640,224,800,256,960,261.3C1120,267,1280,245,1360,234.7L1440,224L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path>
    </svg>

    <!-- About -->
    <section id="about" class="about">
        <div class="container text-center">
            <div class="row">
                <div class="col mb-4">
                    <h3>About</h3>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-lg mx-5 my-3">
                    <img class="rounded-circle img-thumbnail mb-4" src="/assets/img/ade.jpg" alt="Ade Kiswara" width="100%">
                    <h5>Ade Kiswara</h5>
                    <p>00000040037</p>
                </div>
                <div class="col-lg mx-5 my-3">
                    <img class="rounded-circle img-thumbnail mb-4" src="/assets/img/dimas.png" alt="Dimas Lesmana" width="100%">
                    <h5>Dimas Lesmana</h5>
                    <p>00000041281</p>
                </div>
                <div class="col-lg mx-5 my-3">
                    <img class="rounded-circle img-thumbnail mb-4" src="/assets/img/akmal.jpg" alt="Muhammad Akmal Hisyam" width="100%">
                    <h5>Muhammad Akmal Hisyam</h5>
                    <p>00000040027</p>
                </div>
            </div>
        </div>
    </section>
    <!-- End of About -->
</main>

<footer>
    <div class="container">
        <div class="row text-center pt-3">
            <div class="col">
                <p>&copy; 2021 &bull; K-Food 21</p>
            </div>
        </div>
    </div>
</footer>

<?= $this->endSection(); ?>