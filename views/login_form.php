<section class="container">
  <form action="" method="post">
    <fieldset>
      <legend>User data</legend>
      <div class="form-group">
        <label for="user" class="form-label">User id:</label>
        <input type="text" placeholder="Sancho Panza" id="user" name="user" required autofocus class="form-control">
      </div>
      <div class="form-group">
        <label for="password" class="form-label">Password:</label>
        <input type="password" placeholder="********" id="password" name="password" required maxlength="20" minlength="8" class="form-control">
      </div>
      <input type="submit" name="" id="" value="Log in" class="btn btn-primary mt-3">
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