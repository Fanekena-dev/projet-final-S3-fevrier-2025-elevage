<?php
namespace app\controllers\w1;

use Flight;

class AdminSigninControllers
{
  public function __construct()
  {
  }
  public function signinPage()
  {
    Flight::render('adminSignin');
    exit();
  }
  public function get_required_fields():array 
  {
    return ['admin-id', 'admin-pwd'];
  }
  public function signin()
  {

  }
}