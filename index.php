<?php
require 'service-ddbb.php';

session_start();

if (isset($_COOKIE['user'])) {
  header('Location: admin.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $id = $_POST['user'];
  $password = $_POST['password'];

  $result = login($id, $password);

  if ($result) {
    setcookie('user', $result, time() + 3600);
    header('Location: admin.php');
    exit();
  } else {
    $error = 'Wrong user or password';
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Eduardo de la Cruz Palacios">
  <meta name="copyright" content="Eduardo de la Cruz Palacios" />
  <title>Handicraft | Login</title>
</head>

<body>
  <?php include './views/header.html'?>
  <?php include './views/login.php'?>
</body>

</html>