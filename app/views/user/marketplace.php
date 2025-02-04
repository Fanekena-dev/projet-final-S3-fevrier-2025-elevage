<?php include "public/temp/modals.php" ?>
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav class="col-md-3 d-none d-md-block sidebar p-2">
            <h3>Breeding situation</h3>
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link" href="<?= $baseUrl ?>/animals/dashboard">Change date</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= $baseUrl ?>/animals/dashboard">My animals</a></li>
            </ul>
            <hr>
            <h3>Marketplace</h3>
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link" href="#section3">Buy</a></li>
                <li class="nav-item"><a class="nav-link" href="#section4" data-animal-id="1">Sell</a></li>
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="col-md-9 content">

            <section class="container">
                <h1 class="ms-3">Available animals</h1>

                <div class="animal-list">
                    <?php foreach ($availableAnimals as $animal): ?>
                        <div class="card">
                            <strong class="mt-3"><?= $animal['animal_id'] ?></strong>
                            <div class="card-body">
                                <ul>
                                    <li><strong>Name: </strong><?= $animal['animal_name'] ?></li>
                                    <li><strong>Specy: </strong><?= $animal['animal_species'] ?></li>
                                    <li><strong>Day without eating: </strong><?= $animal['day_without_eating'] ?></li>
                                    <li><strong>Weight loss percent: </strong><?= $animal['weight_loss_percent'] ?></li>
                                    <li><strong>Weight: </strong><?= $animal['weight'] ?></li>
                                </ul>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>

            <div class="vh-space"></div>

            <section id="section4">
                <div id="sell-animal-form" class="sell-animal-form">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Sell Animal</h5>
                        </div>
                        <div class="modal-body">
                            <form id="sellAnimalForm" method="POST" action="<?= $baseUrl ?>/animals/sendToMarket">
                                <div class="row g-3">
                                    <!-- Animal ID (hidden) -->
                                    <input type="hidden" id="sell-animal-id" name="animal_id">
                                    <input type="hidden" id="user-id" name="user_id" value="user1">

                                    <!-- Price -->
                                    <div class="col-md-6 col-12">
                                        <div class="mb-3">
                                            <label for="sell-price" class="form-label">Price</label>
                                            <input type="number" class="form-control" id="sell-price" name="price"
                                                required>
                                        </div>
                                    </div>

                                    <!-- Sell Date -->
                                    <div class="col-md-6 col-12">
                                        <div class="mb-3">
                                            <label for="sell-date" class="form-label">Sell Date</label>
                                            <input type="date" class="form-control" id="sell-date" name="insert_date">
                                            <small class="form-text text-muted">Optional</small>
                                        </div>
                                    </div>

                                    <!-- Animal Selection (Horizontal Scroll) -->
                                    <div class="col-md-12 col-12">
                                        <div class="mb-3">
                                            <label for="animal-select" class="form-label">Select Animal</label>
                                            <div id="animal-select" class="animal-select-container">
                                                <!-- Animal cards will be populated here -->
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="col-md-12 col-12">
                                        <div class="d-grid gap-2">
                                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

            <div class="vh-space"></div>

        </div>
    </div>
</div>