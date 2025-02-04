<div class="container">
    <div class="d-flex justify-content-between gap-5">
        <div class="animal-form">
            <form method="POST" action="<?= $baseUrl ?>/animals/update/min-weight" enctype="multipart/form-data">
                <h1>Max weight:</h1>
                <div class="row g-3">
                    <!-- Columns -->
                    <div class="col-md-6 col-12">
                        <div class="mb-3">
                            <label for="modal-type_id" class="form-label">Animal</label>
                            <select class="form-select" name="type_id" id="modal-type_id" required>
                                <?php foreach ($animals as $animal) { ?>
                                    <option value="<?= $animal['animal_id'] ?>"><?= $animal['animal_name'] ?>
                                        (<?= $animal['species_name'] ?>)</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="mb-3">
                            <label for="" class="form-label">Value</label>
                            <input type="number" class="form-control" name="max-weight">
                        </div>
                    </div>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-lg">Update</button>
                </div>
            </form>
        </div>


        <div class="animal-form">
            <form method="POST" action="<?= $baseUrl ?>/animals/update/min-weight" enctype="multipart/form-data">
                <h1>Day without eating before dying</h1>
                <div class="row g-3">
                    <!-- Columns -->
                    <div class="col-md-6 col-12">
                        <div class="mb-3">
                            <label for="modal-type_id" class="form-label">Animal</label>
                            <select class="form-select" name="type_id" id="modal-type_id" required>
                                <?php foreach ($animals as $animal) { ?>
                                    <option value="<?= $animal['animal_id'] ?>"><?= $animal['animal_name'] ?>
                                        (<?= $animal['species_name'] ?>)</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="mb-3">
                            <label for="" class="form-label">Value</label>
                            <input type="number" class="form-control" name="day-before-eating">
                        </div>
                    </div>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-lg">Update</button>
                </div>
            </form>
        </div>


        <div class="animal-form">
            <form method="POST" action="<?= $baseUrl ?>/animals/update/min-weight" enctype="multipart/form-data">
                <h1>Weight loss</h1>
                <div class="row g-3">
                    <!-- Columns -->
                    <div class="col-md-6 col-12">
                        <div class="mb-3">
                            <label for="modal-type_id" class="form-label">Animal</label>
                            <select class="form-select" name="type_id" id="modal-type_id" required>
                                <?php foreach ($animals as $animal) { ?>
                                    <option value="<?= $animal['animal_id'] ?>"><?= $animal['animal_name'] ?>
                                        (<?= $animal['species_name'] ?>)</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="mb-3">
                            <label for="" class="form-label">Value</label>
                            <input type="number" class="form-control" name="day-before-eating">
                        </div>
                    </div>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-lg">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>