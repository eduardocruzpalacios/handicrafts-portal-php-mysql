<?php
require 'service-ddbb.php';
require 'service-handicraft-read-from-id.php';
require 'model/handicraft.php';

if (!isset($_COOKIE['user'])) {
  header('Location: ./');
}

loadUserHandicraftOnSession($_COOKIE['user']);

if (isset($_POST['create'])) {

  $imgname = $_FILES["img"]["name"];

  $tempname = $_FILES["img"]["tmp_name"];

  $folder = "img/" . $imgname;

  $fulldate = getdate();

  $dateupload = "$fulldate[year]-$fulldate[mon]-$fulldate[mday]";

  $userid = $_COOKIE['user'];

  $title = $_POST['title'];
  $description = $_POST['description'];
  $weight = $_POST['weight'];

  $fragile = false;
  if (!empty($_POST['fragile'])) {
    $fragile = true;
  }

  if (createHandicraft($dateupload, $userid, $title, $description, $fragile, $weight, $imgname)) {
    move_uploaded_file($tempname, $folder);
    $msg = 'Handicraft created successfully';
  } else {
    $msg = 'An error ocurred. Handicraft not created';
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
  <title>Handicraft | Admin</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

  <?php include './views/header.php' ?>
  <?php include './views/nav.php' ?>

  <section>
    <!-- CREATE HANDICRAFT -->
    <form action="" method="post" enctype="multipart/form-data">
      <fieldset>
        <legend>Handicraft data</legend>
        <label for="title">Title:</label>
        <input type="text" placeholder="Write something catching" id="title" name="title" required autofocus>
        <label for="description">Description:</label>
        <textarea name="description" id="description" cols="30" rows="10" required>This thing is made with...</textarea>
        <label for="fragile">Is fragile?</label>
        <input type="checkbox" name="fragile" id="fragile" value="fragile">
        <label for="weight">Weight (Kg):</label>
        <input type="number" name="weight" id="weight" value="0">
        <label for="img">Upload a photo:</label>
        <input type="file" name="img" id="img" value="" required>
        <input type="submit" name="create" value="Create">
        <?php if (isset($msg)) : ?>
          <span>
            <?php
            echo $msg;
            ?>
          </span>
        <?php endif; ?>
      </fieldset>
    </form>
  </section>

  <section>
    <!-- PRINT HANDICRAFT -->
    <?php for ($x = 0; $x < count($_SESSION['userhandicraft']); $x++) : ?>
      <article>
        <p><?php echo $_SESSION['userhandicraft'][$x]->get_id(); ?></p>
        <p><?php echo $_SESSION['userhandicraft'][$x]->get_date(); ?></p>
        <p><?php echo $_SESSION['userhandicraft'][$x]->get_user(); ?></p>
        <p><?php echo $_SESSION['userhandicraft'][$x]->get_title(); ?></p>
        <p><?php echo $_SESSION['userhandicraft'][$x]->get_description(); ?></p>
        <?php if ($_SESSION['userhandicraft'][$x]->get_fragile() == 1) : ?>
          <p><?php echo $_SESSION['userhandicraft'][$x]->get_weight(); ?></p>
        <?php else : ?>
          <p>not for sale</p>
        <?php endif; ?>
        <img src="./img/<?php echo $_SESSION['userhandicraft'][$x]->get_img(); ?>" alt="<?php echo $_SESSION['userhandicraft'][$x]->get_title(); ?>">
      </article>
    <?php endfor; ?>
  </section>
</body>

</html>