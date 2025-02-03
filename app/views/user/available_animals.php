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