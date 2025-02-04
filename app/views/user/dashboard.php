<?php include "public/temp/modals.php" ?>
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav class="col-md-3 d-none d-md-block sidebar p-2">
            <h3>Breeding situation</h3>
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link" href="#section1">Change date</a></li>
                <li class="nav-item"><a class="nav-link" href="#section2">My animals</a></li>
            </ul>
            <hr>
            <h3>Marketplace</h3>
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link" href="<?= $baseUrl ?>/animals/marketplace">Buy</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= $baseUrl ?>/animals/marketplace">Sell</a></li>
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="col-md-9 content">
            <!-- Top -->
            <section id="section1">
                <div class="row align-items-center">
                    <!-- Date Selector -->
                    <div class="col-md-9">
                        <div class="card p-3 mb-3 d-flex flex-row justify-content-between align-items-center">
                            <input type="date" id="date-input" class="form-control form-control-lg w-auto">
                            <div class="d-flex align-items-center gap-3">
                                <button id="decrease-day" class="btn btn-outline-primary btn-lg">-1 Day</button>
                                <button id="increase-day" class="btn btn-outline-primary btn-lg">+1 Day</button>
                            </div>

                            <div class="d-flex align-items-center gap-3">
                                <button id="reset" class="btn btn-danger btn-lg">Reset</button>
                            </div>
                        </div>
                    </div>

                    <!-- Current Capital -->
                    <div class="col-md-3">
                        <div class="p-3 mb-3 text-center">
                            <h4 class="mb-0">$ <?= number_format($balance) ?></h4>
                        </div>
                    </div>
                </div>
            </section>

            <h3 class="text-center">Animal list</h3>
            <section class="animal-list d-flex " id="section2">

            </section>

            <div class="vh-space"></div>

        </div>
    </div>
</div>