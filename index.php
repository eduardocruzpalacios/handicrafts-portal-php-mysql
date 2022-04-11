<?php

require_once 'controllers/controllers.php';

if (!(isset($_GET['action']))) {
  HomeController::home();
} else {
  $action = $_GET['action'];
  switch ($action) {
    case 'home':
    default:
      HomeController::home();
    break;
  }
}
