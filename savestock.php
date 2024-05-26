<?php
if(isset($_POST['add'])){
    $file=$_FILES['image'];
    
    $fileName=$_FILES['image']['name'];
    $fileTmpName=$_FILES['image']['tmp_name'];
    $fileSize=$_FILES['image']['size'];
    $fileError=$_FILES['image']['error'];
    $fileType=$_FILES['image']['type'];
    
    $fileExt=explode('.',$fileName);
    $fileActualExt=strtolower(end($fileExt));
    
    $allowed=array('jpg','png','jpeg');
    
    if(in_array($fileActualExt,$allowed))
    {
        if($fileError===0)
        {
            if($fileSize < 500000000)
            {
                $fileNameNew=uniqid('',true).".".$fileActualExt;
                $fileDestination = 'games/'.$fileName;
                mmove_uploaded_file($fileTmpName,$fileDestination);
                header("location: index.php");
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