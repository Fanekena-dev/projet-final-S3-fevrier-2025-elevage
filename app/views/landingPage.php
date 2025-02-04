<?php
$baseUrl = Flight::get('flight.base_url');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Breeding</title>
</head>

<body>
  Landing Page for our website
  <p>
    Tokony formulaire
    <a href="<?= $baseUrl ?>/auth/sign-in">Sign In</a>
  </p>
  <p>
    Tokony formulaire
    <a href="<?= $baseUrl ?>/auth/sign-up">Sign Up</a>
  </p>
  <footer>
    <p>3251 - 3286 - 3291</p>
    <a href="<?= Flight::get('flight.base_url'); ?>/admin/sign-in">Admin</a>
  </footer>
</body>

</html>