<?php

require_once "./models/models.php";

class HomeController
{

  public static function home()
  {
    $handicrafts = Handicraft::findAll();
    require_once('views/pages/home.php');
  }
}
