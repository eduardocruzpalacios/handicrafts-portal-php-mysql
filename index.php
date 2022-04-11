<?php

require_once 'controllers/controllers.php';

if (!(isset($_GET['action']))) {
  PageController::home();
} else {
  $action = $_GET['action'];
  switch ($action) {
    case 'login':
      LoginController::loginPage();
      break;
    case 'tryLogin':
      LoginController::tryLogin($_POST['user'], $_POST['password']);
      break;
    case 'admin':
      PageController::admin();
      break;
    case 'home':
    default:
      PageController::home();
    break;
  }
}
