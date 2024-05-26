<?php
include '../connection.php';
$sql="SELECT * FROM games WHERE ID='{$_GET['id']}'";
$query=mysqli_query($con,$sql) or die(mysqli_error($con));
$row=mysqli_fetch_array($query);
?>

<html>
    <head>
        <link href="../css/accmanagement.css" rel="stylesheet">
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
        <table style="width:80%; font-size:22px;">
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
            </tr>
            <tr>
                <td><?php echo $row["id"]?></td>
                <td><?php echo $row["name"]?> </td>
                <td><img src="../games/<?php echo $row["image"];?>" width="165" height="232"> </td>
                <td><?php echo $row["type"]?> </td>
                <td><?php echo $row["price"]?> </td>
                <td><?php echo $row["stock"]?> </td>
                <td><?php echo $row["abreviation"]?> </td>
                <td style="text-align:left "><?php echo $row["description"]?> </td>
                <td style="text-align:left "><?php echo $row["specifications"]?> </td>
            </tr>
        </table>
        <a href="../managestock.php">
            <button class="btnn">Back</button>
        </a>
    </body>
</html>

