<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
</head>
<body>
    <h1><?=$title?></h1>
    <table>
        <thead>
            <tr>
                <th>Animal ID</th>
                <th>Animal Name</th>
                <th>Animal Type</th>
                <th>Animal DWE</th>
                <th>Animal WL</th>
                <th>Animal Actual Weight</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($availableAnimals as $animal): ?>
                <tr>
                    <td><?=$animal['animal_id']?></td>
                    <td><?=$animal['animal_name']?></td>
                    <td><?=$animal['animal_species']?></td>
                    <td><?=$animal['day_without_eating']?></td>
                    <td><?=$animal['weight_loss_percent']?></td>
                    <td><?=$animal['weight']?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>