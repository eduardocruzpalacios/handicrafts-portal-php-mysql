<section class="container">
  <h2>Login</h2>
  <form action="" method="post">
    <fieldset>
      <legend>User data</legend>
      <div class="form-group mb-3">
        <label for="user">User id:</label>
        <input type="text" placeholder="Sancho Panza" id="user" name="user" required autofocus class="form-control">
      </div>
      <div class="form-group mb-3">
        <label for="password">Password:</label>
        <input type="password" placeholder="********" id="password" name="password" required maxlength="20" minlength="8" class="form-control">
      </div>
      <input type="submit" name="" id="" value="Log in" class="btn btn-primary">
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