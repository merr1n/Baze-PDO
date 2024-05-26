<?php
include 'connection.php';
session_start();
/*if(isset($_COOKIE['email']))
    $_SESSION['email']=$_COOKIE['email'];
  */  
if(isset($_SESSION["email"]))
{
    $sql="SELECT * FROM account WHERE mail='{$_SESSION["email"]}'";
    $query=mysqli_query($con,$sql) or die(mysqli_query($con));
    $record=mysqli_fetch_array($query);
    $pos=$record['position'];
}
$sql1='SELECT * FROM games ORDER BY id ASC';
$query1=mysqli_query($con,$sql1) or die(mysqli_error($con));
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Merrin's Shop</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/oldrepicon.png" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet"/>
        <link href="css/shopstyle.css" rel="stylesheet" />
        <link href="css/addedcss.css" rel="stylesheet"/> 
    </head>
    <body style="background-color:#D0BDB0">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-crimson bg-crimson">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="index.php">Home</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="about.php">About</a></li>
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
                        <!-- echo '<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>'; -->
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
        <!-- Header-->
        <header class="bg-dark py-5" style="background-image: url('./assets/rdr2g.png');">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <div class="logoanim">
                <img class="img-fluid rounded-circle mb-4" src="./assets/Logo.png" alt="..." />
                <!--<h1 class="text-white fs-3 fw-bolder">Merrin's Temple</h1>
                <p class="text-white-50 mb-0"><b>Games & Comics</b></p>      -->      
                </div>
                    <p class="lead fw-normal text-white-50 mb-0 textanim"><b>Fancy a game? Get it from us!<b/></p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <?php while($row=mysqli_fetch_array($query1)){?>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="./games/<?php echo $row["image"];?>" width="170" height="350" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?php echo $row["name"];?></h5>
                                    <!-- Product price-->
                                    <?php echo $row["price"];?> RON
                                    <div style="color:gray;"><i>For <?php echo $row["type"];?></i></div>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><?php echo "<a class='btn btn-outline-dark mt-auto' href=\"./shopitem.php?id=".$row['id']."\">View</a>"?></div>
                            </div>  
                        </div>
                    </div>
                    <?php } ?>
                    <!--<div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                            <!-- Product image--
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name
                                    <h5 class="fw-bolder">Special Item</h5>
                                    <!-- Product reviews--
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <!-- Product price--
                                    <span class="text-muted text-decoration-line-through">$20.00</span>
                                    $18.00
                                </div>
                            </div>
                            <!-- Product actions--
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge--
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                            <!-- Product image--
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details--
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name--
                                    <h5 class="fw-bolder">Sale Item</h5>
                                    <!-- Product price--
                                    <span class="text-muted text-decoration-line-through">$50.00</span>
                                    $25.00
                                </div>
                            </div>
                            <!-- Product actions--
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image--
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details--
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name--
                                    <h5 class="fw-bolder">Popular Item</h5>
                                    <!-- Product reviews--
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <!-- Product price--
                                    $40.00
                                </div>
                            </div>
                            <!-- Product actions--
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge--
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                            <!-- Product image--
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details--
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name--
                                    <h5 class="fw-bolder">Sale Item</h5>
                                    <!-- Product price--
                                    <span class="text-muted text-decoration-line-through">$50.00</span>
                                    $25.00
                                </div>
                            </div>
                            <!-- Product actions--
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image--
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details--
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name--
                                    <h5 class="fw-bolder">Fancy Product</h5>
                                    <!-- Product price--
                                    $120.00 - $280.00
                                </div>
                            </div>
                            <!-- Product actions--
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge--
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                            <!-- Product image--
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details--
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name--
                                    <h5 class="fw-bolder">Special Item</h5>
                                    <!-- Product reviews--
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <!-- Product price--
                                    <span class="text-muted text-decoration-line-through">$20.00</span>
                                    $18.00
                                </div>
                            </div>
                            <!-- Product actions--
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image--
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details--
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name--
                                    <h5 class="fw-bolder">Popular Item</h5>
                                    <!-- Product reviews-
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <!-- Product price--
                                    $40.00
                                </div>
                            </div>
                            <!-- Product actions-
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                            </div>
                        </div>
                    </div>-->
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
