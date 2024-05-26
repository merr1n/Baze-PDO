<?php 
include 'connection.php';
session_start();
$sql="SELECT * FROM account WHERE mail='{$_SESSION["email"]}'";
$acc=mysqli_query($con,$sql) or die(mysqli_query($con));
$record=mysqli_fetch_array($acc);
$m=$record['mail'];
$n=$record['username'];
$pos=$record['position'];
?>

<html>
    <head>
     <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Merrin</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/oldrepicon.png" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/account.css" rel="stylesheet" />
    </head>
    <body>
<div class="card">
  <img src="./assets/arthur.png" alt="John" style="width:100%">
  <h1>User: <?php echo $n?></h1>
  <?php
  if($pos=="admin")
      echo '<p class="titlespec">'.$pos.'</p>';
  if($pos=="user")
      echo '<p class="title">'.$pos.'</p>';
  ?>
  <p class="mailtext">E-mail: <?php echo $m?></p>
  <!--<div style="margin: 24px 0;">
    <a href="#"><i class="fa fa-dribbble"></i></a> 
    <a href="#"><i class="fa fa-twitter"></i></a>  
    <a href="#"><i class="fa fa-linkedin"></i></a>  
    <a href="#"><i class="fa fa-facebook"></i></a> 
  </div>-->
  <a href="accsettings.php">
      <button class="button1">Account settings</button></a>
      <?php echo "<a href=\"deleteaccount.php?id=".$record['id']."\" onclick=
            \"return confirm('Are you sure?')\"><button class='delete'>Delete account</button><br><br></a>";
      ?>
  <a href="shop.php">
      <button class="buttonback">Exit</button></a><br><br>
</div>

</body>
</html>