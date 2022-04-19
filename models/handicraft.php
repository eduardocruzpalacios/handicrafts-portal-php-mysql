<?php

require_once 'db.php';

class Handicraft
{

  public static function findAll()
  {
    global $connection;

    $query = "SELECT * FROM handicrafts";

    $result = mysqli_query($connection, $query);

    if ($result) {
      return $result;
    } else {
      return false;
    }
  }

  public static function findByUserId($user_id)
  {
    global $connection;

    $query = "SELECT * FROM handicrafts WHERE user_id LIKE '$user_id'";

    $result = mysqli_query($connection, $query);

    if ($result) {
      return mysqli_fetch_all($result);
    } else {
      return false;
    }
  }

  public static function delete($id)
  {
    global $connection;

    $query = "DELETE FROM handicrafts WHERE id = ?";

    $stmt = $connection->prepare($query);

    $stmt->bind_param('s', $id);

    $result = $stmt->execute();

    if ($result) {
      return true;
    } else {
      return false;
    }
  }

  public static function createHandicraft($date_created, $user_id, $title, $description, $is_fragile, $weight_grams, $image_filename)
  {
    global $connection;

    $query = "INSERT INTO handicrafts (date_created, user_id, title, description, is_fragile, weight_grams, image_filename) VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $connection->prepare($query);

    $stmt->bind_param('ssssids', $date_created, $user_id, $title, $description, $is_fragile, $weight_grams, $image_filename);

    $result = $stmt->execute();

    if ($result) {
      return true;
    } else {
      return false;
    }
  }

  public static function findById($id)
  {
    global $connection;

    $query = "SELECT * FROM handicrafts WHERE id LIKE '$id'";

    $result = mysqli_query($connection, $query);

    if ($result) {
      return mysqli_fetch_row($result);
    } else {
      return false;
    }
  }

  public static function updateWithoutImage($id, $title, $description, $is_fragile, $weight_grams)
  {
    global $connection;

    $query = "UPDATE handicrafts SET title = ?, description = ?, is_fragile = ?, weight_grams = ? WHERE id = ?";

    $stmt = $connection->prepare($query);

    $stmt->bind_param('ssidi', $title, $description, $is_fragile, $weight_grams, $id);

    $result = $stmt->execute();

    if ($result) {
      return true;
    } else {
      return false;
    }
  }

  public static function update($id, $title, $description, $is_fragile, $weight_grams, $image_filename)
  {
    global $connection;

    $query = "UPDATE handicrafts SET title = ?, description = ?, is_fragile = ?, weight_grams = ?, image_filename = ? WHERE id = ?";

    $stmt = $connection->prepare($query);

    $stmt->bind_param('ssidsi', $title, $description, $is_fragile, $weight_grams, $image_filename, $id);

    $result = $stmt->execute();

    if ($result) {
      return true;
    } else {
      return false;
    }
  }
}
