<?php

require_once("connection.php");
require_once("setupProcedures.php");


session_start();
if(isset($_COOKIE['email']) && !isset($_SESSION['email']))
    $_SESSION['email']=$_COOKIE['email'];
if(isset($_SESSION["email"]))
{
    $sql="SELECT * FROM account WHERE mail='{$_SESSION["email"]}'";
    $query=mysqli_query($con,$sql) or die(mysqli_query($con));
    $record=mysqli_fetch_array($query);
    $pos=$record['position'];
}
?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->

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
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/addedcss.css" rel="stylesheet"/>
        <script src="js/scripts.js"></script>
        <audio src="./assets/mp34/americanvenom.mp3" id="unshaken" loop>
            <!--<source src="./assets/mp34/Unshaken1.mp3" type="audio/mpeg">-->
        </audio>
    </head>
    <body style="background-color:#D0BDB0">
       <!-- <embed src="assets/mp34/Unshaked.mp3" autostart> -->
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-crimson bg-crimson">
            <div class="container">
                <a class="navbar-brand" href="index.php">Home</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="shop.php">Shop</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                        <?php
                            if(isset($_SESSION["email"]))
                            {
                                $m=$_SESSION["email"];
                                echo '<li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">'.$m.'</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="account.php">Account</a></li>';
                                if($pos=="admin")
                                    echo '<li><a class="dropdown-item" href="manageaccs.php">Manage accounts</a></li>
                                    <li><a class="dropdown-item" href="managestock.php">Manage stock</a></li>';
                                echo '<li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                        </li>';
                            } 
                            else
                                echo '<li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>';
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header - set the background image for the header in the line below-->
        <header class="py-5 bg-image-full" style="background-image: url('./assets/rdr2g.png');">
                <p class='text-white-50 mb-0'><i>Song: <b>American Venom</b></i></p>
            <button class="butonmuzica" onclick="pplay()" type="button">Play</button> 
            <button class="butonmuzica" onclick="ppause()" type="button">Pause</button>
            <div class="text-center my-5">
                <div class="logoanim">
                <img class="img-fluid rounded-circle mb-4" src="./assets/Logo.png" alt="..." />
                <!--<h1 class="text-white fs-3 fw-bolder">Merrin's Temple</h1>
                <p class="text-white-50 mb-0"><b>Games & Comics</b></p>      -->      
                </div>
            </div>
        </header>
        <!-- Content section-->
        <section class="py-5 blur">
            <div class="container my-5">
                <div class="row justify-content-center">
                    <div class="col-lg-6 textanim">
                        <h2><i>"The Best Site that I've ever ordered from..."</i></h2>
                        <p class="lead"><i>"At first I didn't know what to think about this new site or if I should trust it but I'm glad that I gave it a shot. I could even say that it is <b>The Best Site that I've ordered from</b> and it has a very reliable service and trustworthy staff."</i></p>
                        <p class="mb-0">This was one of our most recent reviews. We are very glad that we can get a response like this from our community and we can only hope to improve and enlarge our community even more through more honest, and fair transactions.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Image element - set the background image for the header in the line below-->
        <div class="py-5 bg-image-full" style="background-image: url('https://images5.alphacoders.com/980/980647.jpg')">
            <!-- Put anything you want here! The spacer below with inline CSS is just for demo purposes!-->
            <div style="height: 20rem"></div>
        </div>
        <!-- Content section-->
        <section class="py-5">
            <div class="container my-5">
                <div class="row justify-content-center">
                    <div class="col-lg-6 textanim">
                        <h2>Engaging games at the <i>best</i> possible price</h2>
                        <p class="lead">Buy your favorite games at the most affordable and accurate price!</p>
                        <p class="mb-0">Full client support!</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Merrin 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
