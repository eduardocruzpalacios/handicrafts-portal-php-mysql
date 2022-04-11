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
}
