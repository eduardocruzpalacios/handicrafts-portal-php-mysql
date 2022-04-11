<?php

require 'service-ddbb.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $id = $_POST['user'];
  $password = $_POST['password'];

  $result = login($id, $password);

  if ($result) {
    setcookie('user', $id, time() + 3600);
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
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
  <?php include 'views/partials/header.php' ?>
  <?php include 'views/partials/nav.php' ?>
  <section class="container mt-3 mb-3">
    <h2>Login</h2>
  </section>
  <?php include 'views/partials/login_form.php' ?>
</body>

</html>