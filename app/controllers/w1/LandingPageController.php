<?php
namespace app\controllers\w1;

use FLight;

class LandingPageController
{
  public function __construct()
  {
  }

  public function landingPage() {
    FLight::render('landingPage');
    exit();
  }
}