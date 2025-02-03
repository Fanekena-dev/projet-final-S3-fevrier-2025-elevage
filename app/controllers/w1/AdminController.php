<?php
namespace app\controllers\w1;

use Flight;

class AdminController
{
  public function __construct()
  {
  }
  public function homePage()
  {
    Flight::render('admin/adminHome');
    exit();
  }
}