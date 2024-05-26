<?php
include '../connection.php';
$status1=0;
if (isset ($_GET['id']))
{
    $sql="SELECT * FROM games WHERE ID='{$_GET['id']}'";
    $result=mysqli_query($con, $sql);
    $record=mysqli_fetch_array($result);
}
if (isset ($_POST['name']))
{
    $id=$_POST['id'];
    $sql2="SELECT * FROM games WHERE ID='{$_POST['id']}'";
    $result2=mysqli_query($con, $sql2);
    $rec=mysqli_fetch_array($result2);
    $gamename=$rec['name'];
    $gametype=$rec['type'];
    $gameimage=$rec['image'];
    $gameprice=$rec['price'];
    $gamestock=$rec['stock'];
    $gameabrev=$rec['abreviation'];
    $gamedesc=$rec['description'];
    $gamespec=$rec['specifications'];
    $ngn=$_POST['name'];
    $ngt=$_POST['type'];
    $ngp=$_POST['price'];
    $ngs=$_POST['stock'];
    $nga=$_POST['abreviation'];
    $ngd=$_POST['description'];
    $ngspc=$_POST['specifications'];
    $cond1="SELECT * FROM games WHERE name='{$ngn}'";
    $rescond1= mysqli_query($con, $cond1);
    if($rescond1->num_rows>0 && $gamename!=$ngn)
        $status1=1;
    if(isset($_POST['image']))
    {
        $target="../games/".basename($_FILES['image']['name']);
    }
    else
    {
        $target="../games/".$gameimage;
    }
        $sql2=mysqli_query($con, "CALL UpdateGame('{$_POST['id']}','$ngn','$ngt','$target','$ngp','$ngs','$nga','$ngd','$ngspc')");

        move_uploaded_file($_FILES['image']['tmp_name'],$target);
        header('location:../managestock.php');
}
?>
<html>
    <head>
        <link href="css/gamesmanagement.css" rel="stylesheet">
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Merrin</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="../assets/oldrepicon.png" />
        <!-- Core theme CSS (includes Bootstrap)-->
    </head>
    <body style="background-color:#D0BDB0">  
        <h1>Editati inregistrarea:</h1>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
            Name:<input type="text" name="name" value="<?php $record['name'];?>"><br/>
            Image:<input type="file" name="image" value="<?php echo $record['image'];?>"><br/>
            <img src="../games/<?php echo $record['image'];?>"><br/>
            Type:<input type="text" name="type" value="<?php $record['type'];?>"><br/>
            Price:<input type="int" name="price" value="<?php $record['price'];?>"><br/>
            Stock:<input type="int" name="stock" value="<?php $record['stock'];?>"><br/>
            Abreviation:<input type="text" name="abreviation" value="<?php $record['abreviation'];?>"><br/>
            Description:<textarea class="inputbig" type="text" name="description"><?php $record['description'];?>"</textarea><br/>
            Specifications:<textarea class="inputbig" type="text" name="specifications"><?php $record['specifications'];?>"</textarea><br/>
            <input type="hidden" name="id" value="<?php echo $_GET['id'];?>"/>
            <input type="submit" name="submit" value="Edit"/>
        </form>
    </body>
</html>