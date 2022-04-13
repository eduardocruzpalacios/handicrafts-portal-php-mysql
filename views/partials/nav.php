<nav class="navbar navbar-expand-sm navbar-dark bg-dark sticky-top p-4">
  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
    <li class=" nav-item">
      <a href="./?action=home" class="nav-link">Home</a>
    </li>
    <?php if (!isLoggedIn()) : ?>
      <li class="nav-item">
        <a href="./?action=login" class="nav-link">Log in</a>
      </li>
      <li class="nav-item">
        <a href="./?action=signup" class="nav-link">Sign up</a>
      </li>
      <<?php else : ?> <li class="nav-item">
        <a href="./?action=admin" class="nav-link">Admin</a>
        </li>
        <li class="nav-item">
          <a href="./?action=logout" class="nav-link">Logout</a>
        </li>
      <?php endif; ?>
  </ul>
  <?php if (isset($_COOKIE['user'])) : ?>
    <span class="navbar-text text-info">Welcome <?php echo $_COOKIE['user'] ?></span>
  <?php endif; ?>
</nav>