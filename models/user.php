<?php

require_once 'db.php';

class User
{

  public static function login($id, $password)
  {
    global $connection;

    $query = "SELECT id FROM users WHERE
    users.id = '$id' AND users.password = '$password'";

    $result = mysqli_query($connection, $query);

    if (mysqli_fetch_row($result)) {
      return true;
    } else {
      return false;
    }
  }

  public static function readName($id)
  {
    global $connection;

    $query = "SELECT name FROM users WHERE id = '$id'";

    $result = mysqli_query($connection, $query);

    if ($result) {
      return mysqli_fetch_row($result)[0];
    } else {
      echo ' false';
      return false;
    }
  }
}
