<?php
// importaciones e iniciar session
require 'service-ddbb.php';
require 'model/handicraft.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id = $_POST['id'];
} else {
  header('Location: admin.php');
  exit();
}

deleteHandicraft($id);

$indexToRemove;

for ($x = 0; $x < count($_SESSION['handicraft']); $x++) {
  if ($_SESSION['handicraft'][$x]->get_id() == $id) {
    $indexToRemove = $x;
  }
}

array_splice($_SESSION['handicraft'], $indexToRemove, 1);

for ($x = 0; $x < count($_SESSION['userhandicraft']); $x++) {
  if ($_SESSION['userhandicraft'][$x]->get_id() == $id) {
    $indexToRemove = $x;
  }
}

array_splice($_SESSION['userhandicraft'], $indexToRemove, 1);

header('Location: admin.php');
?>