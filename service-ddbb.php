<?php

$connection = mysqli_connect("localhost", "root", "", "handicraft");

if (!$connection) {
  die('Connection error');
}

// USERS

function login($id, $password)
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

function userIdExists($id)
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

function userEmailExists($email)
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

function createUser($id, $name, $email, $password)
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

function readUserName($id) {
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

// HANDICRAFT
function readAllHandicraft()
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

function readHandicraftByUserid($userid)
{
  global $connection;

  $query = "SELECT * FROM handicrafts WHERE userid LIKE '$userid'";

  $result = mysqli_query($connection, $query);

  if ($result) {
    return $result;
  } else {
    return false;
  }
}

function readHandicraftById($id)
{
  global $connection;

  $query = "SELECT * FROM handicrafts WHERE id LIKE '$id'";

  $result = mysqli_query($connection, $query);

  if ($result) {
    return $result;
  } else {
    return false;
  }
}

function createHandicraft($dateupload, $userid, $title, $description, $fragile, $weight, $imgname)
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

function deleteHandicraft($id)
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

function updateHandicraftNoImg($id, $title, $description, $fragile, $weight)
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

function updateHandicraft($id, $title, $description, $fragile, $weight, $imgname)
{
  global $connection;

  $query = "UPDATE handicrafts SET title = ?, description = ?, fragile = ?, weight = ?, imgname = ? WHERE id = ?";

  $stmt = $connection->prepare($query);

  $stmt->bind_param('ssiisi', $title, $description, $fragile, $weight, $imgname, $id);

  $result = $stmt->execute();

  if ($result) {
    return true;
  } else {
    return false;
  }
}

?>