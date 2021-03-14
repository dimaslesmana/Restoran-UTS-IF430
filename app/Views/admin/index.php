<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<?php if (session()->getFlashdata('toastr')) : ?>
    <?= session()->getFlashdata('toastr'); ?>
<?php endif; ?>

<div class="adminDashboard">
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
        <!-- Menu -->
        <section id="menu" class="menu">
            <div class="container text-white">
                <div class="row mb-4 text-center">
                    <div class="col">
                        <h3>List Menu</h3>
                        <hr>
                    </div>
                </div>
                <div class="row mb-3 text-right">
                    <div class="col">
                        <a href="/dashboard/menu/new" class="btn btn-primary"><i class="fa fa-plus"></i> Menu</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <table id="admin-listMenuTable" class="table table-striped table-bordered table-dark" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Deskripsi</th>
                                    <th>Gambar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($menus as $idx => $m) : ?>
                                    <tr>
                                        <td><?= $idx + 1; ?></td>
                                        <td><?= $m['nama']; ?></td>
                                        <td><?= $m['harga']; ?></td>
                                        <td><?= $m['deskripsi']; ?></td>
                                        <td>
                                            <img src="/assets/img/menu-restoran/<?= $m['gambar']; ?>" alt="<?= $m['nama']; ?>" width="150">
                                        </td>
                                        <td>
                                            <a type="button" class="btn btn-warning mx-1 my-1" href="/dashboard/menu/edit/<?= $m['id']; ?>"><i class="fa fa-edit"></i></a>
                                            <form action="/dashboard/menu/delete/<?= $m['id']; ?>" method="post" class="d-inline">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger mx-1 my-1" onclick="return confirm('Are you sure?');"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Deskripsi</th>
                                    <th>Gambar</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#2d4059" fill-opacity="1" d="M0,288L80,272C160,256,320,224,480,224C640,224,800,256,960,261.3C1120,267,1280,245,1360,234.7L1440,224L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path>
            </svg>
        </section>
        <!-- End of Menu -->
    </main>
</div>

<?= $this->endSection(); ?>