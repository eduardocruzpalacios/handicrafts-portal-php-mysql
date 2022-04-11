<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Eduardo de la Cruz Palacios">
  <meta name="copyright" content="Eduardo de la Cruz Palacios" />
  <title>Handicraft Portal</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
  <?php include 'views/partials/header.php' ?>
  <?php include 'views/partials/nav.php' ?>
  <section class="container mt-3">
    <h2>Home</h2>
  </section>
  <section class="container mt-3 mb-5">
    <div class="row row-cols-2">
      <?php while ($row = mysqli_fetch_row($handicrafts)) : ?>
        <article class="col">
          <h3><?php echo $row[3]; ?></h3>
          <p><?php echo $row[4]; ?></p>
          <?php if ($row[5] == 1) : ?>
            <p>Fragile</p>
          <?php else : ?>
            <p>Resistent</p>
          <?php endif; ?>
          <p><?php echo $row[6] ?> (g)</p>
          <img src="./img/<?php echo $row[7]; ?>" alt="<?php echo $row[3]; ?>" class="img-fluid">
          <p>Upload by <span class="text-info"><?php echo $row[0]; ?></span> on <span class="text-info"><?php echo $row[1]; ?></span></p>
        </article>
      <?php endwhile; ?>
    </div>
  </section>
</body>

</html>