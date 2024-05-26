<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tour</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/oldrepicon.png" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/addedcss.css" rel="stylesheet"/>
        <link href="css/contact.css" rel="stylesheet"/>
    </head>
    <body style="background-color:#D0BDB0">
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/ro_RO/sdk.js#xfbml=1&version=v17.0" nonce="oVzxnyvI"></script>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-crimson bg-crimson">
            <div class="container">
                <a class="navbar-brand" href="index.php">Home</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                
            </div>
        </nav>
       <header class="py-5 bg-image-full" style="background-image: url('./assets/western.png');">
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
                        <h2><i>Hello there!</i></h2>
                        <p class="lead"><i>Thank you for checking out my site. It's been a pleasure working on it and making it the way it turned out to be, and I really do hope that you also liked it! It's my first ever semi-completed site and I've got to say that it has been quite the ride. This is the last page that I've created for this site. </i></p>
                        <p class="mb-0">for now ;)</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Image element - set the background image for the header in the line below-->
        <section class="py-5"style="background-color: #bbaa9e">
            <div class="container my-5">
                <div class="row justify-content-center">
                    <div class="col-lg-6 textanim">
                        <h2>The video bellow is a tour of this website</h2>
                        <p class="lead">Well, not for now. Haven't recorded one yet. But in the close future there's gonna be one.</p>
                        <p class="mb-0">Until then, here's another video. (for the project's request)</p><br>
                    </div>
                    <iframe width="800" height="650" src="https://www.youtube.com/embed/gmA6MrX81z4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
            </div>
        </section>
        <!-- Content section-->
        <section class="py-5">
            <div class="container my-5">
                <div class="row justify-content-center">
                    <div class="col-lg-6 textanim">
                        <canvas id="myCanvas" width="800" height="100" style=" padding-left: 0; padding-right: 0; margin-left: auto; margin-right: auto; display: block; width: 800px;">
                                Your browser does not support the HTML canvas tag.</canvas>
                                <script>
                                var c = document.getElementById("myCanvas");
                                var ctx = c.getContext("2d");
                                ctx.font = "30px Arial";
                                ctx.fillText("Thank you again! (this is a canvas btw)",10,50);
                                </script>
                                <p class="lead">If you liked the site, you can like/share it here!<div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-width="" data-layout="" data-action="" data-size="" data-share="true"></div></p>
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
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
</html>
