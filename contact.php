<?php 
session_start();
include 'connection.php';
if(isset($_SESSION['email']))
{
    require_once './OOP/current.php';
    $var=$_SESSION['email'];
    $uuser=new User();
    $uuser->set_mail($var);
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Contact</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/oldrepicon.png" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/addedcss.css" rel="stylesheet"/>
        <link href="css/contact.css" rel="stylesheet"/>
    </head>
    <body style="background-color:#D0BDB0">
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-crimson bg-crimson">
            <div class="container">
                <a class="navbar-brand" href="index.php">Home</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                
            </div>
        </nav>
        <div class="contactUs">
            <div class="title">
                <h2 style="color:black;">Contact Us!</h2>
            </div>
            <?php if(isset($_SESSION['email'])) $uuser->show_user();?>
            <div class="box">
                <!--Form-->
                <div class="contact form">
                    <h3>Send a Message</h3>
                    <form>
                        <div class="formBox">
                            <div class="row50">
                                <div class="inputBox">
                                    <span>First Name</span>
                                    <input type="text" placeholder="Name">
                                </div>
                                <div class="inputBox">
                                    <span>Last Name</span>
                                    <input type="text" placeholder="Name">
                                </div>
                            </div>
                            <div class="row50">
                                <div class="inputBox">
                                    <span>E-mail</span>
                                    <input type="text" placeholder="E-mail">
                                </div>
                                <div class="inputBox">
                                    <span>Phone</span>
                                    <input type="text" placeholder="Number">
                                </div>
                            </div>
                            <div class="row100">
                                <div class="inputBox">
                                    <span>Message</span>
                                    <textarea placeholder="Write your message here"></textarea>
                                </div>
                            </div>
                            
                            <div class="row100">
                                <div class="inputBox">
                                    <input type="submit" value="Send">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                
                <!--InfoBox-->
                <div class="contact info">
                    <h3>Contact Info</h3>
                    <div class="infoBox">
                        <div>
                            <span><ion-icon name="location"></ion-icon></span>
                            <p>UAIC, Iasi<br>ROMANIA</p>
                        </div>
                        <div>
                            <span><ion-icon name="mail"></ion-icon></span>
                            <a href="mailto:merrins@yahoo.com">merrins@yahoo.com</a>
                        </div>
                        <div>
                            <span><ion-icon name="call"></ion-icon></span>
                            <a href="tel:+40 723 647 181">+40 723 647 181</a><p></p>
                        </div>
                    </div>
                    <!--Social Media-->
                    <ul class="sci">
                        <li><a target="_blank" href="https://www.facebook.com/darius.chirila.7"><ion-icon name="logo-facebook"></ion-icon></a></li>
                        <li><a target="_blank" href="https://www.instagram.com/dariuss_24/"><ion-icon name="logo-instagram"></ion-icon></a></li>
                        <li><a target="_blank" href="https://www.youtube.com/channel/UC2734SfZGJgk_Ft7fOu5Xvw"><ion-icon name="logo-youtube"></ion-icon></a></li>
                        <li><a href="#"><ion-icon name="logo-github"></ion-icon></a></li>
                    </ul>
                </div>
                
                <!--Map-->
                <div class="contact map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10848.565893838739!2d27.5718655!3d47.1746666!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40cafb61a6de8567%3A0x770562ffa2192d42!2sFacultatea%20de%20Matematic%C4%83!5e0!3m2!1sen!2sro!4v1685317449257!5m2!1sen!2sro" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
        <!-- Page content-->
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Merrin 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
</html>
