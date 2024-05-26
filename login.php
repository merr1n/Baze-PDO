<?php
session_start();
$status=0;
include 'connection.php';
if(isset($_COOKIE['email']) && isset($_COOKIE['password']))
{
    $_SESSION['email']=$_COOKIE['email'];
    $_SESSION['password']=$_COOKIE['password'];
}
if(isset($_POST['login'])){
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $query="SELECT * FROM account WHERE mail='".$_POST['email']."' and password='".$_POST['pass']."'";
    mysqli_query($con,$query) or die((mysqli_error($con)));
    $result=mysqli_query($con,$query) or die((mysqli_error($con)));
    $record=mysqli_fetch_array($result);
    if($result->num_rows>0)
    {
        $_SESSION["email"]=$email;
        $_SESSION["password"]=$pass;
        $status=1;
        if(!empty($_POST["rememberme"]))
        {
            $rememberme=$_POST["rememberme"];
            setcookie('email',$email,time()+30000);
            setcookie('password',$pass,time()+30000);
            setcookie('userlogin',$rememberme,time()+30000);
        }
        else
        {
            setcookie('email',$email,1);
            setcookie('password',$pass,1);
        }   
    }
    else
    {
        $status=2;
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
        <script src="js/captcha.js"></script>
    </head>
    <body>
        <?php
        if(isset($_SESSION["email"]))
            header('location:shop.php');
        ?>
        <div class="container">
            <a href="shop.php">
                <button class="gob">Home</button>
            </a>
            <div class="login form">
                <header>Login</header>
                <form method='POST' name="form1" onsubmit="return checkCaptcha();">
                    <input class="forminput" type="text" class="form-control" placeholder="Enter your email" name="email" value="<?php if(isset($_COOKIE['email'])){echo $_COOKIE['email'];} ?>">
                    <input class="forminput" type="password" placeholder="Enter your password" name="pass" value="<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password'];} ?>">
                    <?php
                    if($status==2)
                    {
                        echo "<span class='signup'>This account doesn't exist</span><br>";
                    }
                    ?>
                    <input class="notlong" type="text" id="cta" name="ct" value="#####" readonly>
                    <input class="notlong" type="text" id="ci" placeholder="Captcha" style="width:30%;">
                    <input class="rfr" type="button" value="Refresh" id="refreshbtn" onclick="genNewCaptcha()"><br>
                    <a href="#">Forgot Password?</a><br><br>
                    Remember me<input class="signup" type="checkbox" class="rememberme" name="rememberme" value="1">
                    <input  type="submit" class="forminput button" value="Login" name="login">
                </form>
                <div class="signup">
                    <span class="signup">Don't have an account?
                        <a href="register.php">Register</a>
                    </span>
                </div>
            </div>
        </div>
    </body>
</html