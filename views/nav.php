<nav class="navbar navbar-expand-sm navbar-dark bg-dark sticky-top p-4">
    <ul class="navbar-nav">
      <li class=" nav-item">
        <a href="./" class="nav-link">Home</a>
      </li>
      <?php if (!isset($_COOKIE['user'])) : ?>
        <li class="nav-item">
          <a href="login.php" class="nav-link">Log in</a>
        </li>
        <li class="nav-item">
          <a href="signup.php" class="nav-link">Sign up</a>
        </li>
      <?php endif; ?>
      <?php if (isset($_COOKIE['user'])) : ?>
        <li class="nav-item">
          <a href="admin.php" class="nav-link">Admin</a>
        </li>
        <li class="nav-item">
          <a href="service-logout.php" class="nav-link">Logout</a>
        </li>
      <?php endif; ?>
    </ul>
</nav>