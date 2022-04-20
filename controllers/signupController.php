<?php

require_once "./models/models.php";

class SignupController
{

  public static function signupPage()
  {
    if (isLoggedIn()) {
      redirect('?action=admin');
    }
    require_once('views/pages/signup.php');
  }

  public static function trySignup($id, $name, $email, $password)
  {
    if (User::userIdExists($id)) {
      $message = 'Sorry, that user name is not available';
      require_once('views/pages/signup.php');
    } else {
      if (User::userEmailExists($email)) {
        $message = 'Sorry, that email is not available';
        require_once('views/pages/signup.php');
      } else {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        User::createUser($id, $name, $email, $hash);
        session_regenerate_id(true);
        $_SESSION['is_logged_in'] = true;
        redirect('?action=admin');
      }
    }
  }
}
