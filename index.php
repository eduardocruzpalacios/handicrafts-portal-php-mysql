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
        $is_fragile = false;
        if (!empty($_POST['is_fragile'])) {
          $is_fragile = true;
        }
        HandicraftController::createHandicraft($_FILES["image"], $_SESSION['user_id'], $_POST['title'], $_POST['description'], $is_fragile, $_POST['weight_grams']);
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
      $is_fragile = false;
      if (!empty($_POST['fragile'])) {
        $is_fragile = true;
      }
      if (empty($_FILES["image"]["name"])) {
        HandicraftController::updateHandicraftWithoutImage($_POST["id"], $_POST['title'], $_POST['description'], $is_fragile, $_POST['weight_grams']);
      } else {
        HandicraftController::updateHandicraft($_POST["id"], $_POST['title'], $_POST['description'], $is_fragile, $_POST['weight_grams'], $_FILES["image"]);
      }
      break;
    case 'home':
    default:
      HandicraftController::home();
      break;
  }
}
