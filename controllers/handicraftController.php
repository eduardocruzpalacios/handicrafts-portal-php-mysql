<?php

require_once "./models/models.php";

class HandicraftController
{

  public static function home()
  {
    $handicrafts = Handicraft::findAll();
    require_once('views/pages/home.php');
  }

  public static function admin()
  {
    if (!isLoggedIn()) {
      redirect('/?action=home');
    }
    require_once('views/pages/admin.php');
  }
}
