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

  <?php include 'views/partials/header.php' ?>
  <?php include 'views/partials/nav.php' ?>

  <section class="container mt-3">
    <h2>Update</h2>
  </section>

  <section class="container mt-5 mb-5">
    <form action="" method="post" enctype="multipart/form-data">
      <fieldset>
        <legend>Handicraft data</legend>
        <div class="form-group mb-3">
          <label for="title" class="form-label">Title:</label>
          <input type="text" id="title" name="title" value="<?php echo $title ?>" required autofocus class="form-control">
        </div>
        <div class="form-group mb-3">
          <label for="description" class="form-label">Description:</label>
          <textarea name="description" id="description" cols="30" rows="10" required class="form-control"><?php echo $description ?></textarea>
        </div>
        <div class="form-group mb-3">
          <label for="fragile" class="form-check-label">Is fragile?</label>
          <input type="checkbox" name="fragile" id="fragile" value="fragile" class="form-check-input" <?php if ($fragile == 1) {
                                                                                                        echo 'checked';
                                                                                                      } ?>>
        </div>
        <div class="form-group mb-3">
          <label for="weight" class="form-label">Weight (g):</label>
          <input type="number" name="weight" id="weight" value="<?php echo $weight ?>" class="form-control">
        </div>
        <div class="form-group mb-3">
          <img src="./img/<?php echo $img ?>" class="img-fluid" alt="<?php echo $title ?>">
          <label for="img" class="form-label">Change the photo:</label>
          <input type="file" name="img" id="img" value="" class="form-control">
        </div>
        <input type="hidden" name="imgname" value="<?php echo $img; ?>">
        <input type="submit" name="update" value="Update" class="btn btn-success">
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