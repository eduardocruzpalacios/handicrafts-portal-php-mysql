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
    $_SESSION['user_handicrafts'] = Handicraft::findByUserId($_SESSION['user_id']);
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

  public static function createHandicraft($image, $user_id, $title, $description, $is_fragile, $weight_grams)
  {
    $image_filename = $image["name"];
    $tmp_name = $image["tmp_name"];
    $folder = "img/" . $image_filename;
    $fulldateupload = getdate();
    $dateupload = "$fulldateupload[year]-$fulldateupload[mon]-$fulldateupload[mday]";
    if (Handicraft::createHandicraft($dateupload, $user_id, $title, $description, $is_fragile, $weight_grams, $image_filename)) {
      move_uploaded_file($tmp_name, $folder);
      $message = 'Handicraft created successfully';
    } else {
      $message = 'An error ocurred. Handicraft not created';
    }
    $_SESSION['user_handicrafts'] = Handicraft::findByUserId($_SESSION['user_id']);
    require_once('views/pages/admin.php');
  }

  public static function updatePage($id)
  {
    $handicraft = Handicraft::findById($id);
    $title = $handicraft[3];
    $description = $handicraft[4];
    $is_fragile = $handicraft[5];
    $weight_grams = $handicraft[6];
    $image_filename = $handicraft[7];
    require_once('views/pages/update.php');
  }

  public static function updateHandicraftWithoutImage($id, $title, $description, $is_fragile, $weight_grams)
  {
    if (Handicraft::updateWithoutImage($id, $title, $description, $is_fragile, $weight_grams)) {
      $message = 'Handicraft updated successfully';
    } else {
      $message = 'An error ocurred. Handicraft not updated';
    }
    $handicraft = Handicraft::findById($id);
    $title = $handicraft[3];
    $description = $handicraft[4];
    $is_fragile = $handicraft[5];
    $weight_grams = $handicraft[6];
    $image_filename = $handicraft[7];
    require_once('views/pages/update.php');
  }

  public static function updateHandicraft($id, $title, $description, $is_fragile, $weight_grams, $image_file)
  {
    $image_filename = $image_file["name"];
    $tmp_name = $image_file["tmp_name"];
    $folder = "img/" . $image_filename;
    if (Handicraft::update($id, $title, $description, $is_fragile, $weight_grams, $image_filename)) {
      move_uploaded_file($tmp_name, $folder);
      $message = 'Handicraft updated successfully';
    } else {
      $message = 'An error ocurred. Handicraft not updated';
    }
    $handicraft = Handicraft::findById($id);
    $title = $handicraft[3];
    $description = $handicraft[4];
    $is_fragile = $handicraft[5];
    $weight_grams = $handicraft[6];
    $image_filename = $handicraft[7];
    require_once('views/pages/update.php');
  }
}
