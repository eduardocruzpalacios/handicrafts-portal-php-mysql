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
}
