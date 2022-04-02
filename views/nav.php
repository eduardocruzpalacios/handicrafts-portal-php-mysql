<nav>
  <ul>
    <li><a href="./">Home</a></li>
    <?php if (!isset($_COOKIE['user'])) : ?>
      <li><a href="login.php">Log in</a></li>
      <li><a href="signup.php">Sign up</a></li>
    <?php endif; ?>
    <?php if (isset($_COOKIE['user'])) : ?>
      <li><a href="admin.php">Admin</a></li>
      <li><a href="service-logout.php">Logout</a></li>
    <?php endif; ?>
  </ul>
  <?php if (isset($_COOKIE['user'])) : ?>
    <span>Welcome <?php echo $_COOKIE['user'] ?></span>
  <?php endif; ?>
</nav>