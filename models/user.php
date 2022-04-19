<?php

require_once 'db.php';

class User
{

  public static function login($id, $password)
  {
    global $connection;

    $query = "SELECT password FROM users WHERE id = '$id'";

    $result = mysqli_query($connection, $query);

    if ($result) {
      $hash = mysqli_fetch_row($result)[0];
      return password_verify($password, $hash);
    }
    return false;
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

  public static function userIdExists($id)
  {
    global $connection;

    $query = "SELECT id FROM users WHERE users.id = '$id'";

    $result = mysqli_query($connection, $query);

    if (mysqli_fetch_row($result)) {
      return true;
    } else {
      return false;
    }
  }

  public static function userEmailExists($email)
  {
    global $connection;

    $query = "SELECT email FROM users WHERE users.email = '$email'";

    $result = mysqli_query($connection, $query);

    if (mysqli_fetch_row($result)) {
      return true;
    } else {
      return false;
    }
  }

  public static function createUser($id, $name, $email, $password)
  {
    global $connection;

    $query = "INSERT INTO users (id, name, email, password) VALUES (?, ?, ?, ?)";

    $stmt = $connection->prepare($query);

    $stmt->bind_param('ssss', $id, $name, $email, $password);

    $result = $stmt->execute();

    if ($result) {
      return true;
    } else {
      return false;
    }
  }
}
