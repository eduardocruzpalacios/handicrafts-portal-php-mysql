<?php

require_once "./models/models.php";
require_once "./auth.php";
require_once "./url.php";

class LoginController
{

  public static function loginPage()
  {
    session_start();
    if (isLoggedIn()) {
      redirect('?action=admin');
    }
    require_once('views/pages/login.php');
  }

  public static function tryLogin($id, $password)
  {
    if (User::login($id, $password)) {
      session_start();
      session_regenerate_id(true);
      $_SESSION['is_logged_in'] = true;
      $_SESSION['user_handicraft'] =  Handicraft::findByUserid($id);
      redirect('?action=admin');
    } else {
      $error = 'Wrong user or password';
      require_once('views/pages/login.php');
    }
  }
}
