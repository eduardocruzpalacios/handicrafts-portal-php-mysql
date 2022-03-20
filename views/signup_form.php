<section>
  <h2>Signup</h2>
  <form action="" method="post">
    <fieldset>
      <legend>New user data</legend>
      <label for="name">Name:</label>
      <input type="text" placeholder="Sancho Panza" id="name" name="name" required autofocus maxlength="20">
      <label for="email">Email:</label>
      <input type="email" placeholder="sancho.panza@lamancha.es" id="email" name="email" required maxlength="50">
      <label for="password">Password:</label>
      <input type="password" placeholder="********" id="password" name="password" required maxlength="20" minlength="8">
      <input type="submit" name="" id="" value="Signup">
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