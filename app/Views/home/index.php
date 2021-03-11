<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<header>
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-transparent scrolled">
        <div class="container-fluid pt-3 pb-3">
            <!-- <a class="navbar-brand" href="#">
                    <img src="#" width="30" height="30" alt="logo" loading="lazy" class="logo">
                </a> -->
            <a class="navbar-brand mb-0 h1 brand" href="#">
                <?= $title; ?>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#menu">Menu</a>
                    </li>
                    <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Menu
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Menu 1</a>
                                <a class="dropdown-item" href="#">Menu 2</a>
                                <a class="dropdown-item" href="#">Menu 3</a>
                            </div>
                        </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <!-- <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact</a>
                        </li> -->
                </ul>
            </div>
            <a type="button" class="btn btn-default rounded-pill" href="login.html">Login</a>
        </div>
    </nav>
    <!-- End of Navbar -->

    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container text-center">
            <h1 class="display-4">Fluid jumbotron</h1>
            <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
            <a type="button" class="btn btn-default rounded-pill" href="#menu">Explore Now</a>
        </div>
    </div>
    <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#2d4059" fill-opacity="1" d="M0,128L80,149.3C160,171,320,213,480,197.3C640,181,800,107,960,96C1120,85,1280,139,1360,165.3L1440,192L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z"></path></svg> -->
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#2d4059" fill-opacity="1" d="M0,288L80,272C160,256,320,224,480,224C640,224,800,256,960,261.3C1120,267,1280,245,1360,234.7L1440,224L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z"></path>
    </svg>
    <!-- End of Jumbotron -->
</header>
<main>
    <!-- Menu -->
    <section id="menu" class="menu">
        <div class="container">
            <div class="row pt-4 mb-4 text-center">
                <div class="col">
                    <h3>Menu</h3>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col text-white">
                    <table id="menuTable" class="table table-striped table-bordered table-dark" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Nama Menu</th>
                                <th>Harga</th>
                                <th>Deskripsi</th>
                                <th>Gambar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($menu as $idx => $m) : ?>
                                <tr>
                                    <td><?= $idx + 1; ?></td>
                                    <td><?= $m['nama']; ?></td>
                                    <td><?= $m['harga']; ?></td>
                                    <td><?= $m['deskripsi']; ?></td>
                                    <td><img src="/assets/images/menu-restoran/<?= $m['gambar']; ?>" alt="Gambar Menu" width="150" height="150"></td>
                                    <td><a href="#" class="btn">Pesan</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nomor</th>
                                <th>Nama Menu</th>
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

    <!-- About -->
    <section id="about" class="about">
        <div class="container text-center">
            <div class="row mb-4 pt-4">
                <div class="col">
                    <h3>About</h3>
                    <hr>
                </div>
            </div>
            <div class="row pb-4">
                <div class="col-md mx-2">
                    <img class="rounded-circle mb-4" src="/assets/images/placeholder.png" alt="image1" width="100%">
                    <h5>Ade Kiswara</h5>
                    <p>00000040037</p>
                </div>
                <div class="col-md mx-2">
                    <img class="rounded-circle mb-4" src="/assets/images/placeholder.png" alt="image2" width="100%">
                    <h5>Dimas Lesmana</h5>
                    <p>00000041281</p>
                </div>
                <div class="col-md mx-2">
                    <img class="rounded-circle mb-4" src="/assets/images/placeholder.png" alt="image3" width="100%">
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
        <div class="row text-center text-white pt-3">
            <div class="col">
                <p>&copy; 2021 &bull; Created by Our Team</p>
            </div>
        </div>
    </div>
</footer>


<?= $this->endSection(); ?>