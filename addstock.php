<?php
require_once ('connection.php');
session_start();
if(isset($_POST['add'])){
    $status1=0;
    $name=$_POST["gname"];   
    $type=$_POST['gtype'];
    $price=$_POST['price'];
    $stock=$_POST['stock'];
    $abv=$_POST['abreviation'];
    $desc=$_POST['description'];
    $specs=$_POST['specifications'];
    // $query='SELECT * FROM games WHERE name="{$name}"';
    // $result=mysqli_query($con,$query);
    // if($result->num_rows>0)
    //     $status1=1;
    // else
        $status1=0;
    
    $file=$_FILES['file'];
    
    $fileName=$_FILES['file']['name'];
    $fileTmpName=$_FILES['file']['tmp_name'];
    $fileSize=$_FILES['file']['size'];
    $fileError=$_FILES['file']['error'];
    $fileType=$_FILES['file']['type'];
    
    $fileExt=explode('.',$fileName);
    $fileActualExt=strtolower(end($fileExt));
    
    $allowed=array('jpg','png','jpeg');

    if($status1==0)
    {
        if($name!=null && $price!=null)
        {
            if(in_array($fileActualExt,$allowed))
            {
                if($fileError===0)
                {
                    if($fileSize < 500000000)
                    {
                        $fileNameNew=uniqid('',true).".".$fileActualExt;
                        $fileDestination = 'games/'.$fileName;
                        move_uploaded_file($fileTmpName,$fileDestination);
                        $result=mysqli_query($con, "CALL InsertGame('$name','$type','$fileName','$price','$stock', '$abv','$desc','$specs')");
                            echo '<script>alert("New Entry added")</script>';
                    }
                    else
                        echo '<script>alert("File too big")</script>';
                }
                else
                    echo '<script>alert("Error uploading file.")</script>';
            }
            else
                echo '<script>alert("Wrong type of file")</script>';
        }
        else
            echo '<script>alert("Name, image and price are required.")</script>';
    }
    else
        echo '<script>alert("Game already exists.")</script>';
}
?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Merrin</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/oldrepicon.png" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/addstock.css" rel="stylesheet" />
    </head>
    <body>
        <div class="container">
            <p style="text-align: left">
                <a href="managestock.php" style="text-align:left;">
                <button class="gob">Back</button>
            </a>
            </p>
            
            <div class="registration form">
                <header>Add Stock</header>
                <form method='POST' action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                    <input class="inputnormal" type="text" placeholder="Name" name="gname">
                    <input type="file" name="file" id="upload-photo" />
                    <label for="upload-photo">Upload picture of the game...</label>
                    <input class="inputnormal" type="text" class="specinput" placeholder="Type (PC,PS4,..) " name="gtype">
                    <input class="inputnormal" type="double" placeholder="Price " name="price"><br>
                    <input class="inputnormal" type="int" placeholder="Stock " name="stock">
                    <input class="inputnormal" type="text" placeholder="Abreviation " name="abreviation"><br>
                    <textarea class="inputbig" type="text" placeholder="Description " name="description"></textarea><br>
                    <textarea class="inputbig" type="text" placeholder="Specifications " name="specifications"></textarea><br>
                    <input type="submit" class="inputnormal btnacc"  value="Add Game" name="add">
                </form>
            </div>
        </div>
    </body>
</html