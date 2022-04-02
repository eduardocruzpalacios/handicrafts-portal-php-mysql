<section>
  <h2>Login</h2>
  <form action="" method="post">
    <fieldset>
      <legend>User data</legend>
      <label for="user">User id:</label>
      <input type="text" placeholder="Sancho Panza" id="user" name="user" required autofocus>
      <label for="password">Password:</label>
      <input type="password" placeholder="********" id="password" name="password" required maxlength="20" minlength="8">
      <input type="submit" name="" id="" value="Log in">
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