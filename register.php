<?php
session_start();
$status1=0;
$status2=0;
include 'connection.php';
if(isset($_POST['register']))
{
    $email=$_POST['email'];
    $name=$_POST['name'];
    $pass=$_POST['pass'];
    $query="SELECT * FROM account WHERE mail='{$email}'";
    $result=mysqli_query($con,$query);
    if($result->num_rows>0)
        $status1=1;
    $query="SELECT * FROM account WHERE username='{$name}'";
    $result=mysqli_query($con,$query);
    if($result->num_rows>0)
        $status2=1;
    if($status1==0 && $status2==0)
    {
        if($email!=NULL && $name!=NULL && $pass!=NULL)
        {
            $query=mysqli_query($con, "CALL InsertUser('$name','$email','$pass')");
            //mysqli_query($con,$query) or die(mysqli_error($con));
                echo '<script>alert("New Account created. Please log in!")</script>';
        }
        else
            echo '<script>alert("Introdu frt valorile.")</script>';
    }
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
        <link href="css/loginregister.css" rel="stylesheet" />
    </head>
    <body>
        <div class="container">
            <a href="shop.php">
                <button class="gob">Home</button>
            </a>
            <div class="registration form">
                <header>Register</header>
                <form method='POST'>
                    <?php
                    if($status2==1)
                    {
                        echo '<a>Username already exists.</a>';
                    }
                    ?>
                    <input class="forminput" type="text" placeholder="Enter your name" name="name">
                    <?php
                    if($status1==1)
                    {
                        echo '<a>Email already exists.</a>';
                    }
                    ?>
                    <input class="forminput" type="text" placeholder="Enter your email" name="email">
                    <input class="forminput" type="password" placeholder="Create a password" name="pass">
                    <input type="submit" class="forminput button" value="Register" name="register">
                </form>
                <div class="signup">
                    <span class="signup">Already have an account?
                        <a href="login.php">Login</a>
                    </span>
                </div>
            </div>
        </div>
    </body>
</html