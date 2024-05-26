<?php
require_once ("../connection.php");

$id = $_GET['id'];

$result = mysqli_query($con, "CALL DeleteGame($id)");

header('Location:../managestock.php');
?>