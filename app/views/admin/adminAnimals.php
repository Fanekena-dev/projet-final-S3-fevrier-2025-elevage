<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Breeding | Admin | Animals</title>
  <link rel="stylesheet" href="<?= Flight::get('assets.framework') ?>/bootstrap-5.3.3/css/bootstrap.min.css">
</head>

<body>
  <div class="row">
    <div class="col-md-12">
      <nav class="navbar navbar-expand-lg shadow-sm px-5 justify-content-end sticky-top">
        <div class="container-fluid">
          <a class="navbar-brand text-primary" href="#">Breeding</a>
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="<?= Flight::get('flight.base_url') ?>/admin/species">Species management</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="<?= Flight::get('flight.base_url') ?>/admin/animals"
                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Animal management
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#update-species">Update species</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">Market management</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">Food restocking</a>
            </li>
          </ul>
      </nav>
    </div>
  </div>
  <script src="<?= Flight::get('assets.framework') ?>/bootstrap-5.3.3/js/bootstrap.bundle.min.js"></script>
  <script src="<?= Flight::get('assets.lib') ?>/jquery-3.7.1.min.js"></script>
  <script src="<?= Flight::get('assets.src') ?>/js/w1/adminAnimals.js"></script>
</body>

</html>