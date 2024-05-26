<?php
session_start();
include 'connection.php';
$sql='SELECT * FROM games ORDER BY id ASC';
$query=mysqli_query($con,$sql) or die(mysqli_error($con));
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
        <link rel="icon" type="image/x-icon" href="assets/oldrepicon.png" />
        <!-- Core theme CSS (includes Bootstrap)-->
    </head>
    <body>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Type</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Abreviation</th>
                <th>Description</th>
                <th>Specifications</th>
                <th colspan="3" align="center">Actions</th>
            </tr>
            
            <?php while($row=mysqli_fetch_array($query)){ ?>
            <tr>
                <td><?php echo $row["id"]?></td>
                <td><?php echo $row["name"]?> </td>
                <td><img src="./games/<?php echo $row["image"];?>" width="37" height="50"> </td>
                <td><?php echo $row["type"]?> </td>
                <td><?php echo $row["price"]?> </td>
                <td><?php echo $row["stock"]?> </td>
                <td><?php echo $row["abreviation"]?> </td>
                <td><?php echo $row["description"]?> </td>
                <td><?php echo $row["specifications"]?> </td>
                <td><?php echo ""
                . "<a href=\"gamesmanagement/viewgame.php?id=".$row['id']."\">View</a> "
                        . "<a href=\"gamesmanagement/editgame.php?id=".$row['id']."\">Edit</a> 
        <a href=\"gamesmanagement/deletegame.php?id=".$row['id']."\" onclick=
            \"return confirm('Are you sure?')\">Delete</a>"?>
</td>
</tr>    
<?php } ?>
        </table>
        <div> 
            <a href="addstock.php">
                <button class="btnn">Add Stock</button>
            </a><br>
            <a href="index.php">
                <button class="btnn">Home</button>
            </a><br>
            <a href="shop.php">
                <button class="btnn">Shop</button>
            </a>
        </div>
    </body>
</html>