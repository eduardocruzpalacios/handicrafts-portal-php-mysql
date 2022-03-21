<?php
require 'service-ddbb.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $userIdExists = userIdExists($name);

  if ($userIdExists) {
    echo $userIdExists;
    $error = 'Sorry, that user name is not available';
  } else {
    $userEmailExists = userEmailExists($email);
    if ($userEmailExists) {
      $error = 'Sorry, that email is not available';
    } else {
      createUser($name, $email, $password);
      setcookie('user', $name, time() + 3600);
      header('Location: admin.php');
      exit();
    }
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
  <title>Handicraft | Signup</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
  <?php include './views/header.html' ?>
  <?php include './views/nav.html' ?>
  <?php include './views/signup_form.php' ?>
</body>

</html>