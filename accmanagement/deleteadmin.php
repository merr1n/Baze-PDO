<?php
include "../connection.php";
$sql="DELETE FROM account WHERE id='{$_GET['id']}'";
$query=mysqli_query($con,$sql) or die(my_sqli_error($con));
header('Location:../manageaccs.php');
?>