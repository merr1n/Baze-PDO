<?php 
//$con=mysqli_connect('localhost','root','','gameshop') or die("Failed to connect: ".
//mysqli_error($con));

$databaseHost = 'localhost';
$databaseName = 'gameshop';
$databaseUsername = 'root';
$databasePassword = '';

$con = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

?>