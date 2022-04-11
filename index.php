<?php

require_once 'controllers/controllers.php';

if (!(isset($_GET['action']))) {
  HomeController::home();
} else {
  $action = $_GET['action'];
  switch ($action) {
    case 'login':
      LoginController::loginPage();
      break;
    case 'tryLogin':
      LoginController::tryLogin($_POST['user'], $_POST['password']);
      break;
    case 'home':
    default:
      HomeController::home();
    break;
  }
}
