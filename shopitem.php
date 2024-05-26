<?php 
include 'connection.php';
session_start();
if(isset($_SESSION["email"]))
{
    $sql1="SELECT * FROM account WHERE mail='{$_SESSION["email"]}'";
    $query1=mysqli_query($con,$sql1) or die(mysqli_query($con));
    $record=mysqli_fetch_array($query1);
    $pos=$record['position'];
}


$sql="SELECT * FROM games WHERE ID='{$_GET['id']}'";
$query=mysqli_query($con,$sql) or die(mysqli_error($con));
$row=mysqli_fetch_array($query);
?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?php echo $row['name'];?></title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/siteicon.png" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/shopstyle.css" rel="stylesheet" />
        <link href="css/addedcss.css" rel="stylesheet"/>
    </head>
    <body style="background-color:#D0BDB0;">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-crimson bg-crimson">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="shop.php">Back</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    </ul>
                    <form class="d-flex">
                        <button class="btn btn-outline-crimson" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-tan text-black ms-1 rounded-pill">0</span>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
        <!-- Product section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="games/<?php echo $row["image"];?>" alt="..." /></div>
                    <div class="col-md-6">
                        <div class="small mb-1 textanimshorter"><?php echo $row['type']?></div>
                        <h1 class="display-5 fw-bolder textanim"><?php echo $row['name'];?></h1>
                        <div class="fs-5 mb-5">
                            <span class="textanimprice"><?php echo $row['price']?> RON</span>
                        </div>
                        <p class="lead textanimlonger"><b><?php echo $row['description']?></b></p>
                        <div class="d-flex">
                            <button class="btn btn-outline-dark flex-shrink-0" type="button">
                                <i class="bi-cart-fill me-1"></i>
                                Add to cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Related items section-->
        <section class="py-5 blur" style="background: url('./assets/rdr2g.png')">
            <div class="container my-5">
                <div class="row justify-content-center">
                    <div class="col-lg-6" style="color:white">
                        <h2><b>Specifications</b></h2>
                        <?php echo $row['specifications']?>
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
