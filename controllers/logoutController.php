<?php

class LogoutController
{

  public static function logout()
  {
    session_destroy();
    redirect('?action=home');
  }
}
