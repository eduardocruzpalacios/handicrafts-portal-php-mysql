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

  public static function deleteHandicraft($id)
  {
    Handicraft::delete($id);
    for ($x = 0; $x < count($_SESSION['user_handicrafts']); $x++) {
      if ($_SESSION['user_handicrafts'][$x][0] == $id) {
        $indexToRemove = $x;
      }
    }
    array_splice($_SESSION['user_handicrafts'], $indexToRemove, 1);
    require_once('views/pages/admin.php');
  }
}
