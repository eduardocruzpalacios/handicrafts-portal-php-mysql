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
  }  else {
    $userEmailExists = userEmailExists($email);
    if($userEmailExists) {
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
  <section>
    <h2>Signup</h2>
    <form action="" method="post">
      <fieldset>
        <legend>New user data</legend>
        <label for="name">Name:</label>
        <input type="text" placeholder="Sancho Panza" id="name" name="name" required autofocus maxlength="20">
        <label for="email">Email:</label>
        <input type="email" placeholder="sancho.panza@lamancha.es" id="email" name="email" required maxlength="50">
        <label for="password">Password:</label>
        <input type="password" placeholder="********" id="password" name="password" required maxlength="20" minlength="8">
        <input type="submit" name="" id="" value="Signup">
        <?php if (isset($error)) : ?>
          <span>
            <?php
            echo $error;
            ?>
          </span>
        <?php endif; ?>
      </fieldset>
    </form>
  </section>
</body>

</html>