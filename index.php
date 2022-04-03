<?php

require 'service-ddbb.php';
require 'model/handicraft.php';
require 'service-handicraft-read-all.php';

session_start();

loadHandicraftOnSession();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Eduardo de la Cruz Palacios">
  <meta name="copyright" content="Eduardo de la Cruz Palacios" />
  <title>Handicraft</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
  <?php include './views/header.php' ?>
  <?php include './views/nav.php' ?>
  <section class="container mt-3">
    <h2>Home</h2>
  </section>
  <section class="container mt-3 mb-5">
    <div class="row row-cols-2">
      <?php for ($x = 0; $x < count($_SESSION['handicraft']); $x++) : ?>
        <article class="col">
          <h3><?php echo $_SESSION['handicraft'][$x]->get_title(); ?></h3>
          <p><?php echo $_SESSION['handicraft'][$x]->get_description(); ?></p>
          <?php if ($_SESSION['handicraft'][$x]->get_fragile() == 1) : ?>
            <p>Fragile</p>
          <?php else : ?>
            <p>Resistent</p>
          <?php endif; ?>
          <p><?php echo $_SESSION['handicraft'][$x]->get_weight(); ?> (g)</p>
          <img src="./img/<?php echo $_SESSION['handicraft'][$x]->get_img(); ?>" alt="<?php echo $_SESSION['handicraft'][$x]->get_title(); ?>" class="img-fluid">
          <p>Upload by <span class="text-info"><?php echo $_SESSION['handicraft'][$x]->get_user(); ?></span> on <span class="text-info"><?php echo $_SESSION['handicraft'][$x]->get_dateupload(); ?></span></p>
        </article>
      <?php endfor; ?>
    </div>
  </section>
</body>

</html>