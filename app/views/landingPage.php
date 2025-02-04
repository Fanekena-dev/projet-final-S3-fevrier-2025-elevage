<?php
$baseUrl = Flight::get('flight.base_url');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Breeding | <?= $title ?? "Authentication" ?> </title>
    <link rel="stylesheet" href="<?= Flight::get('assets.framework') ?>/bootstrap-5.3.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= Flight::get('assets.lib') ?>/fontawesome-free-6.7.2-web/css/all.min.css">
    <link rel="stylesheet" href="<?= Flight::get('assets.src') ?>/css/w2/theme.css">
    <link rel="stylesheet" href="<?= Flight::get('assets.src') ?>/css/w2/auth.css">
    <link rel="stylesheet" href="<?= Flight::get('assets.src') ?>/css/w2/landing.css">
</head>

<body>
    <header class="shadow fixed-top">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container">
                <!-- Logo -->
                <a class="navbar-brand" href="<?= $baseUrl ?>">
                    <?php include 'public/temp/logo.php'; ?>
                </a>
                <!-- Toggle Button for Mobile View -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Navbar Links -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto d-flex gap-2 align-items-center">
                        <!-- Theme Switch Button -->
                        <li class="nav-item me-3">
                            <?php include 'public/temp/btn-theme.php'; ?>
                        </li>
                        <!-- Login Button -->
                        <li class="nav-item mb-2 mb-sm-0">
                            <a class="btn btn-outline-primary w-100 me-3" href="<?= $baseUrl ?>/auth/sign-in">Login</a>
                        </li>
                        <!-- Register Button -->
                        <li class="nav-item">
                            <a class="btn btn-primary w-100" href="<?= $baseUrl ?>/auth/sign-up">Register</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="">
        <section class="hero container">
            <div class="row justify-content-center align-items-center gap-5">
                <!-- Text Section -->
                <div class="col-md-5 text-center">
                    <h1 class="display-4 fw-bold">Welcome to <?php include 'public/temp/logo.php' ?>!</h1>
                    <p class="lead">Manage your livestock efficiently and track
                        their growth and health. Register now to start your farming journey!</p>
                    <a href="<?= Flight::get('flight.base_url'); ?>/admin/sign-in"
                        class="btn btn-primary btn-lg mt-3">Get Started</a>
                </div>

                <!-- Carousel Section -->
                <div class="col-md-6 text-bg-secondary rounded p-2" id="landingCarousel">
                    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <!-- Slide 1: Livestock Management -->
                            <div class="carousel-item active">
                                <img src="<?= $baseUrl; ?>/public/assets/img/unexpected friends.svg"
                                    class="d-block w-100 img-fluid" alt="Livestock Management">
                                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 p-3 rounded">
                                    <h5 class="text-white">Efficient Livestock
                                        Management</h5>
                                    <p class="text-light">Track the health, weight,
                                        and feeding schedules of your animals with ease.</p>
                                </div>
                            </div>

                            <!-- Slide 2: Animal Nutrition -->
                            <div class="carousel-item">
                                <img src="<?= $baseUrl; ?>/public/assets/img/refreshing beverage.svg"
                                    class="d-block w-100 img-fluid" alt="Animal Nutrition">
                                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 p-3 rounded">
                                    <h5 class="text-white">Optimal Animal Nutrition
                                    </h5>
                                    <p class="text-light">Ensure your animals
                                        receive the right nutrition for healthy growth and productivity.</p>
                                </div>
                            </div>

                            <!-- Slide 3: Financial Tracking -->
                            <div class="carousel-item">
                                <img src="<?= $baseUrl; ?>/public/assets/img/ride.svg" class="d-block w-100 img-fluid"
                                    alt="Financial Tracking">
                                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 p-3 rounded">
                                    <h5 class="text-white">Smart Financial Tracking
                                    </h5>
                                    <p class="text-light">Manage your capital and
                                        expenses effectively to ensure a profitable farming operation.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Carousel Controls -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </section>
    </main>
    
    <footer class="container-fluid">
        <div class="card">
            <div class="card-body d-flex justify-content-around align-items-center">
                <p class="mb-0">3251 - 3286 - 3291</p>
                <a class="btn btn-outline-primary"
                    href="<?= Flight::get('flight.base_url'); ?>/admin/sign-in">AdminLogin</a>
            </div>
        </div>
    </footer>


    <script src="<?= Flight::get('assets.framework') ?>/bootstrap-5.3.3/js/bootstrap.bundle.min.js"></script>
    <script src="<?= Flight::get('assets.lib') ?>/jquery-3.7.1.min.js"></script>
    <script src="<?= Flight::get('assets.src') ?>/js/w2/main.js"></script>
    <script src="<?= Flight::get('assets.src') ?>/js/w2/auth.js"></script>
</body>

</html>