<?php
include 'connection.php';
session_start();
    $status1=0;
    $status2=0;
    $sql1="SELECT * FROM account WHERE mail='{$_SESSION["email"]}'";
    $cfg1=mysqli_query($con,$sql1) or die(mysqli_query($con));
    $record= mysqli_fetch_array($cfg1);
        $id=$record['id'];
        $name=$record['username'];
        $pass=$record['password'];
        $mail=$record['mail'];
if(isset($_POST["submit"])){
    $nn=$_POST['newname'];
    $np=$_POST['newpass'];
    $nm=$_POST['newmail'];
    if($_POST['newname']==NULL || $_POST['newpass']==NULL || $_POST['newmail']==NULL )
    {
        if($_POST['newname']==NULL)
            $nn=$name;
        if($_POST['newpass']==NULL)
            $np=$pass;
        if($_POST['newmail']==NULL)
            $nm=$mail;
    }
    $query="SELECT * FROM account WHERE mail='{$nm}'";
    $result=mysqli_query($con,$query);
    if($result->num_rows>0 && $mail!=$nm)
        $status1=1;
    $query="SELECT * FROM account WHERE username='{$nn}'";
    $result=mysqli_query($con,$query);
    if($result->num_rows>0 && $name!=$nn)
        $status2=1;
    if($status1==0 && $status2==0)
    {
        $sql2 = "UPDATE account SET username = '{$nn}', password='{$np}', mail='{$nm}' WHERE id = '{$id}'";
        mysqli_query($con, $sql2) or die(mysqli_error($con));
        $_SESSION['email']=$nm;
        unset($_COOKIE['email']);
        unset($_COOKIE['password']);
        setcookie('email',$nm,time()+30000);
            setcookie('password',$np,time()+30000);
        header('location:account.php');
    }
}
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
        <div class="container">
            <div style="text-align: left;">
                <a href="account.php"><button class="fullbtn">Back</button></a></div>
            <div style="text-align: center; margin:10px;">
                <svg width="50" height="50" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16"> <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/> </svg><br><br>
            </div>
            <form method="post">
            <div class="right">
                <div class="txt">
                    Change username: <input class="inpp" type="text" name="newname" value="<?php echo $record['username'];?>"><br>
                    Change password: <input class="inpp" type="text" name="newpass" value="<?php echo $record['password'];?>"><br>
                    Change the email: <input class="inpp" type="text" name="newmail" value="<?php echo $record['mail'];?>">
                </div>
            </div>
                <input type="submit" name="submit" class="fullbtn1" value="Save"/>  
            </form>
            <?php
                    if($status2==1)
                    {
                        echo '<a style="font-size: 24px; color: red;">Username already exists.</a><br>';
                    }
            ?>
            <?php
                    if($status1==1)
                    {
                        echo '<a style="font-size: 24px; color: red;">Email already exists.</a>';
                    }
            ?>
        </div>
    </body>
</html>