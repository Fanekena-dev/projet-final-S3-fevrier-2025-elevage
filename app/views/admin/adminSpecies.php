<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Breeding | Admin | Species</title>
  <link rel="stylesheet" href="<?= Flight::get('assets.framework') ?>/bootstrap-5.3.3/css/bootstrap.min.css">
</head>

<body>
  <div class="row">
    <div class="col-md-12">
      <nav class="navbar navbar-expand-lg shadow-sm px-5 justify-content-end sticky-top">
        <div class="container-fluid">
          <a class="navbar-brand text-primary" href="#">Breeding</a>
          <ul class="nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="<?= Flight::get('flight.base_url') ?>/admin/species"
                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Species management
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#update-species">Update species</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= Flight::get('flight.base_url') ?>/admin/animals">Animal management</a>
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
    <section class="col-md-12 p-5" id="update-species">
      <div class="h2">Update animal species</div>
      <hr>
      <form 
        action="<?= Flight::get('flight.base_url') ?>/admin/species/update"
        method="post"
        id="a-very-big-form-indeed">
        <div id="update-success"></div>
        <table 
          class="table" 
          id="table-update-species">
          <thead>
            <tr class="table-primary">
              <th>Species</th>
              <th>Minimum sales weight</th>
              <th>Selling price per kg</th>
              <th>Maximum weight</th>
              <th>Number of days without eating food</th>
              <th>% of weight loss per day</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
        <div class="float-end">
          <button 
            type="submit" 
            class="btn btn-primary disabled"
            id="update-btn-submit">Make some change first</button>
        </div>
      </form>
    </section>
  </div>
  </div>
  <script src="<?= Flight::get('assets.framework') ?>/bootstrap-5.3.3/js/bootstrap.bundle.min.js"></script>
  <script src="<?= Flight::get('assets.lib') ?>/jquery-3.7.1.min.js"></script>
  <script src="<?= Flight::get('assets.src') ?>/js/w1/adminSpecies.js"></script>
</body>

</html>