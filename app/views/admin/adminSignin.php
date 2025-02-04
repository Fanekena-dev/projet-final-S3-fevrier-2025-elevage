<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Breeding | Admin | Sign In</title>
  <link rel="stylesheet" href="<?= Flight::get('assets.framework') ?>/bootstrap-5.3.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= Flight::get('assets.lib') ?>/fontawesome-free-6.7.2-web/css/all.min.css">
</head>

<body>
  <div class="container">
    <div 
      class="row d-flex justify-content-center align-items-center"
      style="height: 100vh">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-4 border border-primary-subtle px-3 py-5 rounded">
            <div class="h2 text-primary mb-3">Sign in as admin</div>
            <form 
              action="<?= Flight::get('flight.base_url') ?>/admin/sign-in/check"
              class="mb-3"
              id="admin-signin-form"
              method="post">
              <div class="input-group mb-3">
                <span 
                  class="input-group-text" >ID</span>
                <input 
                  type="text" 
                  class="form-control" 
                  placeholder="admin"
                  name="admin-id"
                  value="admin01"
                  required>
              </div>
              <div class="input-group mb-3">
                <span 
                  class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                <input 
                  type="password"
                  class="form-control"
                  placeholder="admin password"
                  name="admin-pwd"
                  value="adminpassword1"
                  required>
              </div>
              <div id="signin-errors"></div>
              <button 
                type="submit"
                class="btn btn-primary w-100"
                id="signin-btn">Sign in</button>
            </form>
            <div class="alert alert-warning" role="alert">
              <strong>Warning!</strong><br>
              This is the sign in page to access the market administration<br>
              <Strong>(reserved for market administrators)</Strong>
            </div>
          </div>
          <div class="col-md-4"></div>
        </div>
      </div>
    </div>
  </div>

  <script src="<?= Flight::get('assets.framework') ?>/bootstrap-5.3.3/js/bootstrap.bundle.min.js"></script>
  <script src="<?= Flight::get('assets.lib') ?>/jquery-3.7.1.min.js"></script>
  <script src="<?= Flight::get('assets.src') ?>/js/w1/adminSignin.js"></script>
</body>

</html>