<?php

require_once "./models/models.php";

class LoginController
{

  public static function loginPage()
  {
    require_once('views/pages/login.php');
  }

  public static function tryLogin($id, $password)
  {
    if (User::login($id, $password)) {
      
    } else {
      $error = 'Wrong user or password';
      require_once('views/pages/login.php');
    }
  }
}
