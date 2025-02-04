<?php include "public/temp/modals.php" ?>
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav class="col-md-3 d-none d-md-block sidebar p-2">
            <h3>Breeding situation</h3>
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link" href="#section1">Change date</a></li>
                <li class="nav-item"><a class="nav-link" href="#section2">My animals</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= $baseUrl ?>/animals/availableAnimals">Market</a></li>
                <li class="nav-item"><a class="nav-link" href="javascript:void(0)" class="sell-link"
                        data-animal-id="1">Sell Animal</a></li>
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
                            <h4 class="mb-0">$ <?= number_format(50000) ?> ar</h4>
                        </div>
                    </div>
                </div>
            </section>

            <h3 class="text-center">Animal list</h3>
            <section class="animal-list" id="section2">

            </section>

            <div class="vh-space"></div>

            <section id="section3">
                <div id="sell-animal-form" class="sell-animal-form">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Sell Animal</h5>
                        </div>
                        <div class="modal-body">
                            <form id="sellAnimalForm" method="POST" action="<?= $baseUrl ?>/sell/animal">
                                <div class="row g-3">
                                    <!-- Animal ID (hidden) -->
                                    <input type="hidden" id="sell-animal-id" name="animal_id">

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
                                            <input type="date" class="form-control" id="sell-date" name="sell_date">
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

                                    <!-- Description -->
                                    <div class="col-md-12 col-12">
                                        <div class="mb-3">
                                            <label for="sell-description" class="form-label">Description</label>
                                            <textarea class="form-control" id="sell-description" name="description"
                                                rows="3"></textarea>
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