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

  <?php include 'views/partials/header.php' ?>
  <?php include 'views/partials/nav.php' ?>

  <section class="container mt-3">
    <h2>Admin</h2>
  </section>

  <section class="container mt-5">
    <h3>Create a new handicraft</h3>
    <form action="./?action=create" method="post" enctype="multipart/form-data">
      <fieldset>
        <legend>Handicraft data</legend>
        <div class="form-group mb-3">
          <label for="title" class="form-label">Title:</label>
          <input type="text" placeholder="Write something catching" id="title" name="title" required autofocus class="form-control">
        </div>
        <div class="form-group">
          <label for="description" class="form-label">Description:</label>
          <textarea name="description" id="description" cols="30" rows="10" required class="form-control">This thing is made with...</textarea>
        </div>
        <div class="form-group">
          <label for="fragile" class="form-check-label">Is fragile?</label>
          <input type="checkbox" name="fragile" id="fragile" value="fragile" class="form-check-input">
        </div>
        <div class="form-group">
          <label for="weight" class="form-label">Weight (g):</label>
          <input type="number" name="weight" id="weight" value="0" class="form-control">
        </div>
        <div class="form-group">
          <label for="img" class="form-label">Upload a photo:</label>
          <input type="file" name="img" id="img" value="" required class="form-control">
        </div>
        <input type="submit" name="create" value="Create" class="btn btn-primary mt-3">
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

  <section class="container mt-5 mb-5">
    <h3>All your handicrafts</h3>
    <?php if (isset($_SESSION['user_handicrafts'])) : ?>
      <div class="row row-cols-2">
        <?php for ($x = 0; $x < count($_SESSION['user_handicrafts']); $x++) : ?>
          <article class="col">
            <h3><?php echo $_SESSION['user_handicrafts'][$x][3]; ?></h3>
            <p><?php echo $_SESSION['user_handicrafts'][$x][4]; ?></p>
            <?php if ($_SESSION['user_handicrafts'][$x][5] == 1) : ?>
              <p>Fragile</p>
            <?php else : ?>
              <p>Resistent</p>
            <?php endif; ?>
            <p>
              <?php echo $_SESSION['user_handicrafts'][$x][6]; ?> (g)</p>
            <img src="./img/<?php echo $_SESSION['user_handicrafts'][$x][7]; ?>" alt="<?php echo $_SESSION['user_handicrafts'][$x][3]; ?>" class="img-fluid">
            <div class="container d-flex">
              <form action="update.php" method="post" class="w-25">
                <input type="hidden" name="id" value="<?php echo $_SESSION['user_handicrafts'][$x][0]; ?>">
                <input type="submit" value="edit" class="btn btn-success">
                <input type="hidden" name="fromadmin" value="fromadmin">
              </form>
              <form action="./?action=delete" method="post">
                <input type="hidden" name="id" value="<?php echo $_SESSION['user_handicrafts'][$x][0]; ?>">
                <input type="submit" value="delete" class="btn btn-danger">
              </form>
            </div>
          </article>
        <?php endfor; ?>
      </div>
    <?php endif; ?>
  </section>
</body>

</html>