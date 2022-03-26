<?php
require 'service-ddbb.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
  header('Location: admin.php');
  exit();
} else if (isset($_POST['fromadmin'])) {

  $id = $_POST['id'];

  $result = readHandicraftById($id);
  if ($result) {
    while ($row = mysqli_fetch_row($result)) {
      $date = $row[1];
      $title = $row[3];
      $description = $row[4];
      $fragile = $row[5];
      $weight = $row[6];
      $img = $row[7];
    }
  }
} else {

  if (isset($_POST['update'])) {

    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $weight = $_POST['weight'];

    $fragile = false;
    if (!empty($_POST['fragile'])) {
      $fragile = true;
    }

    if (!empty($_FILES["img"]["name"])) {

      $img = $_FILES["img"]["name"];

      $imgname = $_FILES["img"]["name"];
      $tempname = $_FILES["img"]["tmp_name"];
      $folder = "img/" . $imgname;

      if (updateHandicraft($id, $title, $description, $fragile, $weight, $imgname)) {
        move_uploaded_file($tempname, $folder);
        $msg = 'Handicraft updated successfully';
      } else {
        $msg = 'An error ocurred. Handicraft not updated';
      }

    } else {

      $img = $_POST['imgname'];

      if (updateHandicraftNoImg($id, $title, $description, $fragile, $weight)) {
        $msg = 'Handicraft updated successfully';
      } else {
        $msg = 'An error ocurred. Handicraft not updated';
      }

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
  <title>Handicraft | Admin - update</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

  <?php include './views/header.php' ?>
  <?php include './views/nav.php' ?>

  <h2>Update this handicraft</h2>

  <section>
    <form action="" method="post" enctype="multipart/form-data">
      <fieldset>
        <legend>Handicraft data</legend>
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?php echo $title ?>" required autofocus>
        <label for="description">Description:</label>
        <textarea name="description" id="description" cols="30" rows="10" required><?php echo $description ?></textarea>
        <label for="fragile">Is fragile?</label>
        <input type="checkbox" name="fragile" id="fragile" value="fragile" <?php if ($fragile == 1) {
                                                                              echo 'checked';
                                                                            } ?>>
        <label for="weight">Weight (g):</label>
        <input type="number" name="weight" id="weight" value="<?php echo $weight ?>">
        <img src="./img/<?php echo $img ?>">
        <label for="img">Change the photo:</label>
        <input type="file" name="img" id="img" value="">
        <input type="hidden" name="imgname" value="<?php echo $img; ?>">
        <input type="submit" name="update" value="Update">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
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

</body>

</html>