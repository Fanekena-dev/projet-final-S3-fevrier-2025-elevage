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
                <li><a class="dropdown-item" href="#add-animals">Add animals</a></li>
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
    <section class="col-md-12 p-5" id="add-animals">
      <div class="row">
        <div class="col-md-6">
          <div class="h2">Add animals</div>
          <hr>
          <form 
            action="<?= Flight::get('flight.base_url');?>/admin/animals/add"
            class="px-5 py-5 border border-primary"
            id="form-add-animal"
            method="post">
            <div class="mb-3">
              <label 
                for="animal-name" 
                class="form-label">What is the name of your animal?</label>
              <input
                type="text" 
                name="animal-name"
                class="form-control" 
                id="animal-name"
                placeholder="Thunder"
                required>
            </div>
            <div class="mb-3">
              <label 
                for="animal-species"
                class="form-label">The species of the animal</label>
                <select 
                  name="animal-species" 
                  id="animal-species"
                  class="form-select"></select>
            </div>
            <div class="mb-3">
              <label 
                for="animal-description"
                class="form-label">A little description of our friend</label>
              <textarea 
                name="animal-description" 
                id="animal-description"
                class="form-control"
                placeholder="Majestic and powerful, our horses embody grace, strength, and spirit."></textarea>
            </div>
            <div id="add-animal-success"></div>
            <button 
              type="submit"
              class="btn btn-primary w-100">Add our animal</button>
          </form>
        </div>
        <div class="col-md-6"></div>
      </div>
    </section>
  </div>
  <script src="<?= Flight::get('assets.framework') ?>/bootstrap-5.3.3/js/bootstrap.bundle.min.js"></script>
  <script src="<?= Flight::get('assets.lib') ?>/jquery-3.7.1.min.js"></script>
  <script src="<?= Flight::get('assets.src') ?>/js/w1/adminAnimals.js"></script>
</body>

</html>