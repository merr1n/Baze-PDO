<?php
include "../connection.php";
if(!isset($_POST["submit"])){
$sql="SELECT * FROM account WHERE id='{$_GET['id']}'";
$result=mysqli_query($con,$sql);
$record=mysqli_fetch_array($result);
}else{
    $sql1 = "UPDATE account SET username = '{$_POST['nume']}', password='{$_POST['pass']}', mail='{$_POST['email']}', position='{$_POST['pos']}' WHERE id = '{$_POST['id']}'";
    mysqli_query($con, $sql1) or die(mysqli_error($con));
header('Location:../manageaccs.php');
}
?>

<h1>Edit registries</h1>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
Username: <br/> <input type="text" name="nume" value="<?php echo $record['username']; ?>" /><br/>
Password: <br/> <input type="text" name="pass" value="<?php echo $record['password']; ?>"/><br/>
E-mail: <br/> <input type="text" name="email" value="<?php echo $record['mail']; ?>" /><br/>
Position: <br/> <input type="text" name="pos" value="<?php echo $record['position']; ?>" /><br/>
<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"/>
<input type="submit" name="submit" value="Edit"/>
</form>

