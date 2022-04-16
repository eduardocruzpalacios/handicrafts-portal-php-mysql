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
      redirect('?action=home');
    }
    $_SESSION['user_handicrafts'] = Handicraft::findByUserid($_SESSION['user_id']);
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

  public static function createHandicraft($img, $userid, $title, $description, $weight, $fragile)
  {
    $imgname = $img["name"];
    $tempname = $img["tmp_name"];
    $folder = "img/" . $imgname;
    $fulldateupload = getdate();
    $dateupload = "$fulldateupload[year]-$fulldateupload[mon]-$fulldateupload[mday]";
    if (Handicraft::createHandicraft($dateupload, $userid, $title, $description, $fragile, $weight, $imgname)) {
      move_uploaded_file($tempname, $folder);
      $msg = 'Handicraft created successfully';
    } else {
      $msg = 'An error ocurred. Handicraft not created';
    }
    $_SESSION['user_handicrafts'] = Handicraft::findByUserid($_SESSION['user_id']);
    require_once('views/pages/admin.php');
  }

  public static function updatePage($id)
  {
    $handicraft = Handicraft::findById($id);
    $title = $handicraft[3];
    $description = $handicraft[4];
    $fragile = $handicraft[5];
    $weight = $handicraft[6];
    $img = $handicraft[7];
    require_once('views/pages/update.php');
  }

  public static function updateHandicraftWithoutImage($id, $title, $description, $fragile, $weight)
  {
    if (Handicraft::updateWithoutImage($id, $title, $description, $fragile, $weight)) {
      $msg = 'Handicraft updated successfully';
    } else {
      $msg = 'An error ocurred. Handicraft not updated';
    }
    $handicraft = Handicraft::findById($id);
    $title = $handicraft[3];
    $description = $handicraft[4];
    $fragile = $handicraft[5];
    $weight = $handicraft[6];
    $img = $handicraft[7];
    require_once('views/pages/update.php');
  }
}
