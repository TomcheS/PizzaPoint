<!-- Ova e delot na Cart kade sto odkako ke vnese korisnikot produkti vo kosnickata tie mu se prikazuvaat tuka so vkupnata cena i  isto taka ima moznost da izbrise nekoj pri sto
potoa moze da odi CheckOut i da ja finalizira narackata -->

<?php 
    include("db_connect.php");
	session_start();
	if(!isset($_SERVER['HTTP_REFERER']) && !isset($_SESSION['cart']) && ($_SESSION['role']=='3' || $_SESSION['role']=='2')){
		header('refresh:0;index.php');
		exit;
	}
?>

<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    
 
     
    <title>Pizza Point Delivery</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">    
	<!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    

</head>

<body>
	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="#">
					<img src="images/logo1.jpg" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
						<li class="nav-item"><a class="nav-link" href="menu.php">Menu</a></li>
						<li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
						<li class="nav-item"><a class="nav-link" href="gallery.php">Galery</a></li>
						<li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
						<?php
                            if(!isset($_SESSION['user'])){
                                echo '<li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>';
                            }
							else{
								echo '<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>';
							}
							//Ako korisnikot nema proizvod vo cart, nema pristap do ovaa strana
							if(isset($_SESSION['cart'])){
								echo '<li class="nav-item"><a class="nav-link" href="cart.php">Cart</a></li>';
							}
                        ?>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->
	
	<!-- Start  -->
    <?php
	    if(isset($_GET['productID']))
     	{
        	$ID=$_GET['productID'];
        	$query='select * from product where productID='.$ID;
        	$result=mysqli_query($conn,$query);
            $row=mysqli_fetch_object($result);
        }	
    ?>
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
				</div>
			</div>
		</div>
	</div>
	<!-- End -->
	
	<!-- Start Gallery -->
	<div class="gallery-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
                        <h2>Cart</h2>
					</div>
				</div>
			</div>
			<div class="tz-gallery">
				<div class="row">
                    <div class="col-2"></div>
                        <div class="col-10">
                            <table class="table table-hover">
                                <tr>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Options</th>
                                </tr>
                                <?php
                                    $total=0;
                                    $session=session_id();
                                    $query="select * from orders, product where orders.sessionID='$session' and product.productID=orders.productID";
                                    $result=mysqli_query($conn, $query);
                                    while($row=mysqli_fetch_object($result)){
                                        echo '
                                        <tr>
                                            <td>'.$row->productName.'</td>
                                            <td>'.$row->quantity.'</td>
                                            <td>'.$row->totalPrice.'</td>
                                            <td><a href="removeitem.php?productID='.$row->productID.'"><b>Remove</b></a></td>
                                        </tr>
                                        ';
                                        $total=$total+$row->totalPrice;
                                    }
                                ?>
                            </table>
                            <br><br>
							<div class="d-flex align-items-start">
								<?php
									$username=$_SESSION['user'];
								
									$query='select * from user where userName="'.$username.'"';
                                    $result=mysqli_query($conn, $query);
									while($row=mysqli_fetch_object($result)){
										switch($row->userSubLevel){
											case 0:
												echo '<div class="col-4"><h3>Total Price: <strong>
													'.$total.'
													</strong></h3></div>
													<div class="col-4"></div>
													<div class="col-4">
													<a class="btn btn-dark" href="checkout.php">Checkout</a>
													</div>';
												break;
											case 1:
												echo '<div class="col-4"><h3>Total Price: <s>
													'.$total.'
													</s><strong>'.($total*0.9).'</strong></h3></div>
													<div class="col-4"></div>
													<div class="col-4">
													<a class="btn" href="checkout.php">Checkout</a>
													</div>';
													$total=$total*0.9;
												break;
											case 2:
												echo '<div class="col-4"><h3>Total Price: <s>
													'.$total.'
													</s><strong>'.($total*0.85).'</strong></h3></div>
													<div class="col-4"></div>
													<div class="col-4">;
													<a class="btn" href="checkout.php">Checkout</a>
													</div>';
													$total=$total*0.85;
												break;
											case 3:
												echo '<div class="col-4"><h3>Total Price: <s>
													'.$total.'
													</s><strong>'.($total*0.8).'</strong></h3></div>
													<div class="col-4"></div>
													<div class="col-4">
													<a class="btn" href="checkout.php">Checkout</a>
													</div>';
													$total=$total*0.8;
												break;
										}
									}
									$_SESSION['orderPrice']=$total;
								?>
							</div>
                        </div>
                    </form>
				</div>
			</div>
		</div>
	</div>
	<!-- End Gallery -->
	
	<!--  Footer -->
	<footer class="footer-area bg-f">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<h3>Contact information</h3>
					<p class="lead">Major Cede Filiposki, Gostivar, Macedonia, 1230</p>
					<p class="lead"><a href="#">070 700 582</a></p>
					<p><a href="#"> pizzapointgostivar@gmail.com</a></p>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Opening hours</h3>
					<p><span class="text-color">Mon-Wed : </span>10:00 - 00:00</p>
					<p><span class="text-color">Fri-Sat :</span> 10:00 - 00:00</p>
					<p><span class="text-color">Sunday :</span> 10:00 - 00:00</p>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Follow Us </h3>
					<ul class="list-inline f-social">	
						<li class="list-inline-item"><a href="https://www.facebook.com/pizzapointgostivari/about"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="https://www.instagram.com/pizzapoint_delivery/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
					</ul>
				</div>
				
			</div>
		</div>
		
		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<p class="company-name">All Rights Reserved. &copy; 2021 <a href="#">Pizza Point Delivery</a> 
					
					</div>
				</div>
			</div>
		</div>
		
	</footer>
	<!-- End Footer -->
	
	<a href="#" id="back-to-top" title="Back to top" style="display: none;"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></a>

	<!-- ALL JS FILES -->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
	<script src="js/jquery.superslides.min.js"></script>
	<script src="js/images-loded.min.js"></script>
	<script src="js/isotope.min.js"></script>
	<script src="js/baguetteBox.min.js"></script>
	<script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>