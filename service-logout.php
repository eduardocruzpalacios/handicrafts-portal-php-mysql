<?php
session_start();
session_destroy();
setcookie('user', $user, time() - 3600);
unset($_COOKIE['user']);
setcookie('islogged', 'islogged', time() - 3600);
unset($_COOKIE['islogged']);
header('Location: ./');
exit();
?>