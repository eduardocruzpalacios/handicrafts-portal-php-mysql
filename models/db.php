<?php

class Db
{
  public function connect()
  {
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'handicraft';
    $connection = mysqli_connect($host, $user, $pass, $db);

    return $connection;
  }
}

$db = new Db();

$connection = $db->connect();

if (!$connection) {
  die('Connection error');
}
