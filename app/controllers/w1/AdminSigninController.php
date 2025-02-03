<?php
namespace app\controllers\w1;

use app\models\w1\AdminModel;
use Flight;

class AdminSigninController
{
  public function __construct()
  {
  }
  public function signinPage()
  {
    Flight::render('admin/adminSignin');
    exit();
  }
  public function get_required_fields(): array
  {
    return ['admin-id', 'admin-pwd'];
  }
  public function signin($admin_id, $pwd)
  {
    $admin_model = new AdminModel();
    echo json_encode($admin_model->signin($admin_id, $pwd));
    exit();
  }
}