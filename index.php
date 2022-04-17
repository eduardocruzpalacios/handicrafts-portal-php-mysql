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
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        LoginController::tryLogin($_POST['user'], $_POST['password']);
      } else {
        HandicraftController::home();
      }
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
    case 'create':
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $fragile = false;
        if (!empty($_POST['fragile'])) {
          $fragile = true;
        }
        HandicraftController::createHandicraft($_FILES["img"], $_SESSION['user_id'], $_POST['title'], $_POST['description'], $_POST['weight'], $fragile);
      } else {
        HandicraftController::home();
      }
      break;
    case 'logout':
      LogoutController::logout();
      break;
    case 'update':
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        HandicraftController::updatePage($_POST['id']);
      } else {
        HandicraftController::home();
      }
      break;
    case 'tryUpdate':
      $fragile = false;
      if (!empty($_POST['fragile'])) {
        $fragile = true;
      }
      if (empty($_FILES["img"]["name"])) {
        HandicraftController::updateHandicraftWithoutImage($_POST["id"], $_POST['title'], $_POST['description'], $_POST['weight'], $fragile);
      } else {
        HandicraftController::updateHandicraft($_POST["id"], $_POST['title'], $_POST['description'], $_POST['weight'], $fragile, $_FILES["img"]);
      }
      break;
    case 'home':
    default:
      HandicraftController::home();
      break;
  }
}
