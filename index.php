<?php

require_once 'controllers/controllers.php';
require_once "./auth.php";
require_once "./url.php";

session_start();

if (!(isset($_GET['action']))) {
  HandicraftController::home();
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
      HandicraftController::admin();
      break;
    case 'signup':
      SignupController::signupPage();
      break;
    case 'trySignup':
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        SignupController::trySignup($_POST['id'], $_POST['name'], $_POST['email'], $_POST['password']);
      } else {
        HandicraftController::home();
      }
      break;
    case 'delete':
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        HandicraftController::deleteHandicraft($_POST['id']);
      } else {
        HandicraftController::home();
      }
      break;
    case 'home':
    default:
      HandicraftController::home();
      break;
  }
}
