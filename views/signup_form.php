<section class="container">
  <h2>Signup</h2>
  <form action="" method="post">
    <fieldset>
      <legend>New user data</legend>
      <div class="form-group mb-3">
        <label for="id">User ID:</label>
        <input type="text" placeholder="sancho0panza" id="id" name="id" required autofocus maxlength="20" class="form-control">
      </div>
      <div class="form-group mb-3">
        <label for="name">Name:</label>
        <input type="text" placeholder="Sancho Panza" id="name" name="name" required maxlength="30" class="form-control">
      </div>
      <div class="form-group mb-3">
        <label for="email">Email:</label>
        <input type="email" placeholder="sancho.panza@lamancha.es" id="email" name="email" required maxlength="50" class="form-control">
      </div>
      <div class="form-group mb-3">
        <label for="password">Password:</label>
        <input type="password" placeholder="********" id="password" name="password" required maxlength="20" minlength="8" class="form-control">
      </div>
        <input type="submit" name="" id="" value="Signup" class="btn btn-primary">
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