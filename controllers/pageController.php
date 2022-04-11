<?php

require_once "./models/models.php";

class PageController
{

  public static function home()
  {
    session_start();
    $handicrafts = Handicraft::findAll();
    require_once('views/pages/home.php');
  }

  public static function admin()
  {
    session_start();
    $user_handicrafts = $_SESSION['user_handicraft'];
    require_once('views/pages/admin.php');
  }
}
