<?php

$connection = mysqli_connect("localhost", "root", "", "handicraft");

if (!$connection) {
  die('Connection error');
}

// USERS

function getUserId($id, $password)
{
  global $connection;

  $query = "SELECT id FROM users WHERE
    users.id = '$id' AND users.password = '$password'";

  $result = mysqli_query($connection, $query);

  if ($query) {
    return mysqli_fetch_row($result)[0];
  } else {
    return false;
  }
}

?>