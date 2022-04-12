<?php

require_once "./models/models.php";

class LoginController
{

  public static function loginPage()
  {
    if (isLoggedIn()) {
      redirect('/?action=admin');
    }
    require_once('views/pages/login.php');
  }

  public static function tryLogin($id, $password)
  {
    if (isLoggedIn()) {
      redirect('/?action=admin');
    }
    if (User::login($id, $password)) {
      session_regenerate_id(true);
      $_SESSION['is_logged_in'] = true;
      $_SESSION['user_handicraft'] =  Handicraft::findByUserid($id);
      redirect('/?action=admin');
    } else {
      $error = 'Wrong user or password';
      require_once('views/pages/login.php');
    }
  }
}
