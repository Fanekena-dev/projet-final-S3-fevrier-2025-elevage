<?php
$baseUrl = Flight::get('flight.base_url');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? "Dashboard" ?></title>
    <!-- Framework/lib css -->
    <link rel="stylesheet" href="<?= $baseUrl ?>/public/assets/framework/bootstrap-5.3.3/css/bootstrap.min.css">
    <link href="<?= $baseUrl ?>/public/assets/lib/fontawesome-free-6.7.2-web/css/all.min.css" rel="stylesheet">
    <!-- Custom css -->
    <link rel="stylesheet" href="<?= $baseUrl ?>/public/assets/src/css/w2/theme.css">
    <link rel="stylesheet" href="<?= $baseUrl ?>/public/assets/src/css/w2/dashboard.css">
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
                            <a class="btn btn-outline-primary w-100 me-3" href="<?= $baseUrl ?>/admin/sign-in">Admin Login</a>
                        </li>
                        <li class="nav-item mb-2 mb-sm-0">
                            <a class="btn btn-outline-primary w-100 me-3" href="<?= $baseUrl ?>/auth/sign-in" >Login</a>
                        </li>
                        <!-- Register Button -->
                        <li class="nav-item">
                            <a class="btn btn-primary w-100" href="<?= $baseUrl ?>/auth/sign-up" >Register</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- + margin via theme.js  -->
    <main class="">
        <?php include $page . '.php' ?>
    </main>

    <footer></footer>

    <!-- Framework/lib Scripts -->
    <script src="<?= $baseUrl ?>/public/assets/framework/bootstrap-5.3.3/js/bootstrap.bundle.min.js"></script>
    <script src="<?= $baseUrl ?>/public/assets/lib/jquery-3.7.1.min.js"></script>
    <script src="<?= $baseUrl ?>/public/assets/lib/chart.umd.js"></script>
    <!-- Custom Scripts -->
    <script src="<?= $baseUrl ?>/public/assets/src/js/w2/main.js"></script>
    <script src="<?= $baseUrl ?>/public/assets/src/js/w2/dashboard.js"></script>
    <script src="<?= $baseUrl ?>/public/assets/src/js/w2/detail.js"></script>
    <script src="<?= $baseUrl ?>/public/assets/src/js/w2/sell.js"></script>
    
</body>

</html>