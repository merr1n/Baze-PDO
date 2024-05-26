<?php
session_start();
include 'connection.php';
$sql='SELECT * FROM account ORDER BY id ASC';
$query=mysqli_query($con,$sql) or die(mysqli_error($con));
?>
<html>
    <head>
        <link href="css/accmanagement.css" rel="stylesheet">
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Merrin</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/oldrepicon.png" />
        <!-- Core theme CSS (includes Bootstrap)-->
    </head>
    <body>
        <table>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>E-mail</th>
                <th>Password</th>
                <th>Position</th>
                <th colspan="2" align="center">Actions</th>
            </tr>
            
            <?php while($row=mysqli_fetch_array($query)){ ?>
            <tr>
                <td><?php echo $row["id"]?></td>
                <td><?php echo $row["username"]?> </td>
                <td><?php echo $row["mail"]?> </td>
                <td><?php echo $row["password"]?> </td>
                <td><?php if($row["position"]=="admin")
                            echo "<a style='color:red'>".$row["position"]."</a>";
                        else
                          echo $row["position"]?></td>
                <td><?php echo "<a href=\"accmanagement/editadmin.php?id=".$row['id']."\">Edit</a> 
        <a href=\"accmanagement/deleteadmin.php?id=".$row['id']."\" onclick=
            \"return confirm('Are you sure?')\">Delete</a>"?>
</td>
</tr>    
<?php } ?>
        </table>
        <div> 
            <a href="index.php">
                <button class="btnn">Home</button>
            </a><br>
            <a href="shop.php">
                <button class="btnn">Shop</button>
            </a>
        </div>
    </body>
</html>