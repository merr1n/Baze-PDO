<?php 
session_start();
$cookie_name1='email';
$cookie_name2='password';
unset($_COOKIE['email']);
unset($_COOKIE['password']);
setcookie($cookie_name1, '', time() - 3600);
setcookie($cookie_name2, '', time() - 3600);
session_destroy();
header('Location:index.php');
?>