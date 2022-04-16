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

  public static function findByUserid($userid)
  {
    global $connection;

    $query = "SELECT * FROM handicrafts WHERE userid LIKE '$userid'";

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

  public static function createHandicraft($dateupload, $userid, $title, $description, $fragile, $weight, $imgname)
  {
    global $connection;

    $query = "INSERT INTO handicrafts (dateupload, userid, title, description, fragile, weight, imgname) VALUES (?, ?, ?,?, ?, ?, ?)";

    $stmt = $connection->prepare($query);

    $stmt->bind_param('ssssiis', $dateupload, $userid, $title, $description, $fragile, $weight, $imgname);

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

  public static function updateWithoutImage($id, $title, $description, $fragile, $weight)
  {
    global $connection;

    $query = "UPDATE handicrafts SET title = ?, description = ?, fragile = ?, weight = ? WHERE id = ?";

    $stmt = $connection->prepare($query);

    $stmt->bind_param('ssiii', $title, $description, $fragile, $weight, $id);

    $result = $stmt->execute();

    if ($result) {
      return true;
    } else {
      return false;
    }
  }
}
