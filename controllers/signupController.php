<?php

require_once "./models/models.php";

class SignUpController
{

  public static function signupPage()
  {
    if (isLoggedIn()) {
      redirect('/?action=admin');
    }
    require_once('views/pages/signup.php');
  }
}
